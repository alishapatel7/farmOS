<?php

namespace Drupal\farm_animal\Plugin\Asset\AssetType;

use Drupal\farm_entity\Plugin\Asset\AssetType\FarmAssetType;

/**
 * Provides the animal asset type.
 *
 * @AssetType(
 *   id = "animal",
 *   label = @Translation("Animal"),
 * )
 */
class Animal extends FarmAssetType {

  /**
   * {@inheritdoc}
   */
  public function buildFieldDefinitions() {
    $fields = parent::buildFieldDefinitions();
    $field_info = [
      'birthdate' => [
        'type' => 'timestamp',
        'label' => $this->t('Birthdate'),
        'weight' => [
          'form' => 15,
          'view' => 15,
        ],
      ],
      'castrated' => [
        'type' => 'boolean',
        'label' => $this->t('Castrated'),
        'description' => $this->t('Has this animal been castrated?'),
        'weight' => [
          'form' => 26,
          'view' => 25,
        ],
      ],
      'nickname' => [
        'type' => 'string',
        'label' => $this->t('Nicknames'),
        'description' => $this->t('List any nicknames of this animal.'),
        'multiple' => TRUE,
        'weight' => [
          'form' => 10,
          'view' => 10,
        ],
      ],
      'sex' => [
        'type' => 'list_string',
        'label' => $this->t('Sex'),
        'allowed_values' => [
          'F' => $this->t('Female'),
          'M' => $this->t('Male'),
        ],
        'weight' => [
          'form' => 20,
          'view' => 20,
        ],
      ],
    ];
    foreach ($field_info as $name => $info) {
      $fields[$name] = \Drupal::service('farm_field.factory')->bundleFieldDefinition($info);
    }
    return $fields;
  }

}