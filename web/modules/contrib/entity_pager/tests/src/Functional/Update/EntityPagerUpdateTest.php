<?php

namespace Drupal\Tests\entity_pager\Functional\Update;

use Drupal\FunctionalTests\Update\UpdatePathTestBase;
use Drupal\views\Entity\View;

/**
 * Tests the update path for Entity Pager.
 *
 * @group entity_pager
 */
class EntityPagerUpdateTest extends UpdatePathTestBase {

  /**
   * {@inheritdoc}
   */
  protected $defaultTheme = 'stark';

  /**
   * {@inheritdoc}
   */
  protected function setDatabaseDumpFiles() {
    $this->databaseDumpFiles = [
      DRUPAL_ROOT . '/core/modules/system/tests/fixtures/update/drupal-9.3.0.bare.standard.php.gz',
      __DIR__ . '/../../../fixtures/update/8.x-1.0-rc2/dump.php',
    ];
  }

  /**
   * Tests that the log_performance option is removed.
   *
   * @see entity_pager_update_20001()
   */
  public function testLogPerformanceRemovalUpdate() {
    $view = View::load('entity_pager_example');
    $this->assertArrayHasKey('log_performance', $view->getDisplay('default')['display_options']['style']['options']);

    $this->runUpdates();

    $view = View::load('entity_pager_example');
    $this->assertArrayNotHasKey('log_performance', $view->getDisplay('default')['display_options']['style']['options']);
  }

}
