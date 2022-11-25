<?php

namespace Drupal\farm_quantity_test\Plugin\Quantity\QuantityType;

use Drupal\farm_entity\Plugin\Quantity\QuantityType\FarmQuantityType;

/**
 * Provides the test quantity type.
 *
 * @QuantityType(
 *   id = "test",
 *   label = @Translation("Test measurement"),
 * )
 */
class Test extends FarmQuantityType {

  /**
   * {@inheritdoc}
   */
  public function buildFieldDefinitions() {

    // Inherit default quantity fields.
    $fields = parent::buildFieldDefinitions();

    // Test method.
    $options = [
      'type' => 'string',
      'label' => $this->t('Test method'),
      'description' => $this->t('What testing method was used to obtain this measurement?'),
      'weight' => [
        'form' => 25,
        'view' => 25,
      ],
    ];
    $fields['test_method'] = $this->farmFieldFactory->bundleFieldDefinition($options);

    return $fields;
  }

}
