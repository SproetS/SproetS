<?php

/**
 * @file
 * Contains database additions for testing upgrade path for entity pager.
 */

use Drupal\Core\Database\Database;
use Drupal\Core\Serialization\Yaml;

$connection = Database::getConnection();

$view = Yaml::decode(file_get_contents(__DIR__ . '/views.view.entity_pager_example.yml'));
$connection->insert('config')
  ->fields([
    'collection',
    'name',
    'data',
  ])
  ->values([
    'collection' => '',
    'name' => 'views.view.entity_pager_example',
    'data' => serialize($view),
  ])
  ->execute();

$extensions = $connection->select('config')
  ->fields('config', ['data'])
  ->condition('name', 'core.extension')
  ->execute()
  ->fetchField();
$extensions = unserialize($extensions, ['allowed_classes' => FALSE]);
$extensions['module']['entity_pager'] = 0;

$connection->update('config')
  ->fields(['data' => serialize($extensions)])
  ->condition('name', 'core.extension')
  ->execute();

$connection->insert('key_value')
  ->fields([
    'collection',
    'name',
    'value',
  ])
  ->values([
    'collection' => 'system.schema',
    'name' => 'entity_pager',
    'value' => serialize(8101),
  ])
  // ->values([
  //   'collection' => 'config.entity.key_store.view',
  //   'name' => 'uuid:73a79007-0ec9-403e-824d-d1e76e13f5ed',
  //   'value' => serialize(['views_view.entity_pager_example']),
  // ])
  ->execute();
