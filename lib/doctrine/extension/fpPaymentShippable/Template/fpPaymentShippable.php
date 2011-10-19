<?php

/**
 * Doctrine extension fpPaymentShippable
 *
 * @package    fpPayment
 * @subpackage Shipping
 * @author     Ton Sharp <Forma-PRO@66ton99.org.ua>
 */
class Doctrine_Template_fpPaymentShippable extends Doctrine_Template
{

  /**
   * Array of options
   *
   * @var array
   */
  protected $_options = array(
    'shipping_id' => array(
    	'name' => 'shipping_id',
      'alias' => null,
      'type' => 'integer',
      'options' => array('notnull' => false),
      'relations' => array('fpPaymentShipping as Shipping' => array('local' => 'shipping_id',
                																										'foreign' => 'id',
                																										'onDelete' => 'SET NULL'))
    )
  );

  /**
   * Set table definition for the behavior
   *
   * @return void
   */
  public function setTableDefinition()
  {
    $this->_options = array_merge($this->_options, sfConfig::get('fp_payment_tax_extra_fields', array()));
    
    foreach ($this->_options as $option) {
      if ($option['alias']) {
        $option['name'] .= ' as ' . $option['alias'];
      }
      if (empty($option['length'])) {
        $option['length'] = null;
      }
      $this->hasColumn($option['name'], $option['type'], $option['length'], $option['options']);
      if (!empty($option['relations'])) {
        foreach ($option['relations'] as $name => $relOptions) {
          if (empty($relOptions['type'])) {
            $relOptions['type'] = 'One';
          }
          $type = 'has' . ucfirst(strtolower($relOptions['type']));
          unset($relOptions['type']);
          $this->$type($name, $relOptions);
        }
      }
    }
  }
}

