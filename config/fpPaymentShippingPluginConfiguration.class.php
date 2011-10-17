<?php

/**
 * fpPaymentShippingPlugin configuration
 *
 * @package    fpPayment
 * @subpackage Shipping
 * @author 	   Ton Sharp <Forma-PRO@66ton99.org.ua>
 */
class fpPaymentShippingPluginConfiguration extends sfPluginConfiguration
{
  
  /**
   * (non-PHPdoc)
   * @see sfPluginConfiguration::initialize()
   */
  public function initialize()
  {
    $configFiles = $this->configuration->getConfigPaths('config/fp_payment_shipping.yml');
    $config = sfDefineEnvironmentConfigHandler::getConfiguration($configFiles);
    
    foreach ($config as $name => $value) {
      sfConfig::set("fp_payment_shipping_{$name}", $value);  
    }
  }
  
}