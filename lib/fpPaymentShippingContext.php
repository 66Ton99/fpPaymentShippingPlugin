<?php

/**
 * Shipping context
 *
 * @package    fpPayment
 * @subpackage Shipping
 * @author     Ton Sharp <Forma-PRO@66ton99.org.ua>
 */
class fpPaymentShippingContext
{

  /**
   * Constructor
   *
   * @param Product $item
   */
  public function __construct()
  {    
  }
  
  /**
   * Get shipping context
   *
   * @return fpPaymentShippingContext
   */
  protected function getContext()
  {
    return fpPaymentContext::getInstance();
  }
}