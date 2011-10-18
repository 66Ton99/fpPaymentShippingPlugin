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
   * Customer
   *
   * @var sfGuardUser
   */
  protected $customer;

  /**
   * Constructor
   *
   * @param Product $item
   */
  public function __construct()
  {
    if ($this->customer = $this->getContext()->getCustomer()) {
      if (!($this->customer instanceof sfDoctrineRecord)) {
        throw new sfException('The "' . get_class($this->customer) . '" is not model');
      }
      if (!$this->customer->getTable()->hasTemplate('fpPaymentProfileble')) {
        throw new sfException('The "' . get_class($this->customer) . '" model must implement fpPaymentProfileble behavior');
      }
    }
  }
  
  /**
   * Get payment context
   *
   * @return fpPaymentContext
   */
  protected function getContext()
  {
    return fpPaymentContext::getInstance();
  }
}