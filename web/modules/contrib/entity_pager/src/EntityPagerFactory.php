<?php

namespace Drupal\entity_pager;

use Drupal\Core\Language\LanguageManagerInterface;
use Drupal\Core\Routing\RouteMatchInterface;
use Drupal\Core\Utility\Token;
use Drupal\views\ViewExecutable;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Factory for entity pager objects.
 */
class EntityPagerFactory {

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
   * The request stack.
   *
   * @var \Symfony\Component\HttpFoundation\RequestStack
   */
  protected $requestStack;

  /**
   * EntityPagerFactory constructor.
   *
   * @param \Drupal\Core\Utility\Token $token
   *   The token service.
   * @param \Drupal\Core\Language\LanguageManagerInterface $language_manager
   *   The language manager.
   * @param \Drupal\Core\Routing\RouteMatchInterface $route_match
   *   The current route match.
   * @param \Symfony\Component\HttpFoundation\RequestStack $request_stack
   *   The request stack.
   */
  public function __construct(Token $token, LanguageManagerInterface $language_manager, RouteMatchInterface $route_match, RequestStack $request_stack) {
    $this->token = $token;
    $this->languageManager = $language_manager;
    $this->routeMatch = $route_match;
    $this->requestStack = $request_stack;
  }

  /**
   * Returns a newly constructed entity pager.
   *
   * @param \Drupal\views\ViewExecutable $view
   *   The executable to construct an entity pager for.
   *
   * @return \Drupal\entity_pager\EntityPagerInterface
   *   The entity pager object.
   */
  public function get(ViewExecutable $view) {
    return new EntityPager(
      $view,
      $this->token,
      $this->languageManager,
      $this->routeMatch,
      $this->requestStack->getCurrentRequest()
    );
  }

}
