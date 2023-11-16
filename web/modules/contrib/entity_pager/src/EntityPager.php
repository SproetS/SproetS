<?php

namespace Drupal\entity_pager;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\TranslatableInterface;
use Drupal\Core\Language\LanguageManagerInterface;
use Drupal\Core\Routing\RouteMatchInterface;
use Drupal\Core\StringTranslation\StringTranslationTrait;
use Drupal\Core\Template\Attribute;
use Drupal\Core\Url;
use Drupal\Core\Utility\Token;
use Drupal\views\ResultRow;
use Drupal\views\ViewExecutable;
use Symfony\Component\HttpFoundation\Request;

/**
 * Entity pager object.
 */
class EntityPager implements EntityPagerInterface {

  use StringTranslationTrait;

  /**
   * Entity pager options.
   *
   * @var array
   */
  protected $options;

  /**
   * The executable for the view that the pager is attached to.
   *
   * @var \Drupal\views\ViewExecutable
   */
  protected $view;

  /**
   * The token service.
   *
   * @var \Drupal\Core\Utility\Token
   */
  protected $token;

  /**
   * The language manager.
   *
   * @var \Drupal\Core\Language\LanguageManagerInterface
   */
  protected $languageManager;

  /**
   * The current route match.
   *
   * @var \Drupal\Core\Routing\RouteMatchInterface
   */
  protected $routeMatch;

  /**
   * The current Request object.
   *
   * @var \Symfony\Component\HttpFoundation\Request
   */
  protected $request;

  /**
   * EntityPager constructor.
   *
   * @param \Drupal\views\ViewExecutable $view
   *   The view object.
   * @param \Drupal\Core\Utility\Token $token
   *   The token service.
   * @param \Drupal\Core\Language\LanguageManagerInterface $language_manager
   *   The language manager.
   * @param \Drupal\Core\Routing\RouteMatchInterface $route_match
   *   The current route match.
   * @param \Symfony\Component\HttpFoundation\Request $request
   *   The current request.
   */
  public function __construct(ViewExecutable $view, Token $token, LanguageManagerInterface $language_manager, RouteMatchInterface $route_match, Request $request) {
    $this->view = $view;
    $this->options = $view->style_plugin->options;
    $this->token = $token;
    $this->languageManager = $language_manager;
    $this->routeMatch = $route_match;
    $this->request = $request;
  }

  /**
   * {@inheritdoc}
   */
  public function getView() {
    return $this->view;
  }

  /**
   * {@inheritdoc}
   */
  public function getLinks() {
    return array_filter([
      'prev' => $this->getLink('link_prev', -1),
      'all' => $this->getAllLink(),
      'next' => $this->getLink('link_next', 1),
    ]);
  }

  /**
   * {@inheritdoc}
   */
  public function getEntity() {
    $entity = NULL;

    $route = $this->routeMatch->getRouteObject();
    if ($route) {
      $parameters = $route->getOption('parameters');
      if ($parameters) {
        foreach ($parameters as $name => $options) {
          if (isset($options['type']) && strpos($options['type'], 'entity:') === 0) {
            $candidate = $this->routeMatch->getParameter($name);
            if ($candidate instanceof ContentEntityInterface && $candidate->hasLinkTemplate('canonical')) {
              $entity = $candidate;
              break;
            }
          }
        }
      }
    }

    if (!$entity && $this->request->attributes->has('entity')) {
      $entity = $this->request->attributes->get('entity');
    }

    return $entity;
  }

  /**
   * {@inheritdoc}
   */
  public function getOptions() {
    return $this->options;
  }

  /**
   * Returns the currently active row from the view results.
   *
   * @return bool|int
   *   The index of the active row, or FALSE.
   */
  public function getCurrentRow() {
    $entity = $this->getEntity();

    /** @var \Drupal\views\ResultRow $result */
    foreach ($this->getView()->result as $index => $result) {
      $result_entity = $this->getResultEntity($result);

      if (!is_null($entity) && $result_entity->id() === $entity->id()) {
        return $index;
      }
    }

    return FALSE;
  }

  /**
   * Returns the result row at the index specified.
   *
   * @param int $index
   *   The index of the result row to return from the view.
   *
   * @return \Drupal\views\ResultRow|null
   *   The result row, or NULL.
   */
  protected function getResultRow($index) {
    $result_row = NULL;

    if (isset($this->view->result[$index])) {
      $result_row = $this->view->result[$index];
    }
    elseif ($this->options['circular_paging']) {
      $result_row = $index < 0
        ? $this->view->result[count($this->view->result) - 1]
        : $this->view->result[0];
    }

    return $result_row;
  }

  /**
   * Returns a Display All link render array.
   *
   * @return array
   *   The element to render.
   */
  protected function getAllLink() {
    $link = [];

    if ($this->options['display_all']) {
      $entity = $this->getEntity();
      $url = $this->detokenize($this->options['link_all_url'], $entity);

      $url_scheme = parse_url($url, PHP_URL_SCHEME);
      if (!$url_scheme) {
        if (!in_array(substr($url, 0, 1), ['/', '#', '?'])) {
          $url = '/' . $url;
        }

        $url = urldecode($url);
      }

      $link = [
        'title' => ['#markup' => $this->detokenize($this->options['link_all_text'], $entity)],
        'url' => $url_scheme ? Url::fromUri($url) : Url::fromUserInput($url),
        'attributes' => new Attribute([
          'class' => [
            'entity-pager-item',
            'entity-pager-item-all',
          ],
        ]),
      ];
    }

    return $link;
  }

  /**
   * Returns an Entity pager link.
   *
   * @param string $name
   *   The name of the link to return.
   * @param int $offset
   *   The offset from the current row that this link should link to.
   *
   * @return array
   *   The render array for the specified link.
   */
  protected function getLink($name, $offset = 0) {
    $row = $this->getResultRow($this->getCurrentRow() + $offset);
    $entity = is_object($row) ? $this->getResultEntity($row) : NULL;
    $title = $this->detokenize($this->options[$name], $entity);

    $link = [];

    if ($entity || $this->options['show_disabled_links']) {
      $link['title'] = ['#markup' => $title];
      $link['attributes'] = new Attribute([
        'class' => [
          'entity-pager-item',
          'entity-pager-item-' . ($offset === -1 ? 'prev' : 'next'),
        ],
      ]);

      if ($entity) {
        $langcode = $this->languageManager->getCurrentLanguage()->getId();
        if ($entity instanceof TranslatableInterface && $entity->hasTranslation($langcode)) {
          $entity = $entity->getTranslation($langcode);
        }

        $link['url'] = $entity->toUrl('canonical');
      }
      else {
        $link['url'] = Url::fromRoute('<nolink>', [], [
          'attributes' => [
            'class' => [
              'inactive',
            ],
          ],
        ]);
      }
    }

    return $link;
  }

  /**
   * Replaces all tokens in provided string.
   *
   * Supports the current entity from the request object.
   *
   * @param string $string
   *   The string to de-tokenize.
   * @param \Drupal\Core\Entity\EntityInterface|null $entity
   *   The entity to use for de-tokenization.
   *
   * @return string
   *   The de-tokenized string.
   */
  protected function detokenize($string, $entity) {
    if (is_null($entity)) {
      $entity = $this->getEntity();
    }

    $data = [];
    if ($entity instanceof EntityInterface) {
      $data[$entity->getEntityTypeId()] = $entity;
    }

    return $this->token->replace($string, $data, ['clear' => TRUE]);
  }

  /**
   * Get the entity from the current views row.
   *
   * @param \Drupal\views\ResultRow $row
   *   The views result row object.
   *
   * @return \Drupal\Core\Entity\EntityInterface
   *   The content entity from the result.
   */
  protected function getResultEntity(ResultRow $row) {
    return $this->options['relationship']
      ? $row->_relationship_entities[$this->options['relationship']]
      : $row->_entity;
  }

}
