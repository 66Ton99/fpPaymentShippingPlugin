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
   * Items
   *
   * @var pPaymentPriceManagerItem[]
   */
  protected $items = array();

  /**
   * Constructor
   *
   * @param fpPaymentPriceManagerItem[] $items
   */
  public function __construct($items)
  {
    foreach ($items as $item) {
      if (!($item instanceof fpPaymentPriceManagerItem)) {
        throw new sfException('The "' . get_class($item) . '" must be instance of fpPaymentPriceManagerItem');
      }
      if (!($item->getItem() instanceof sfDoctrineRecord)) {
        throw new sfException('The "' . get_class($item) . '" item of fpPaymentPriceManagerItem must be model');
      }
      if (!$item->getItem()->getTable()->hasTemplate('fpPaymentShippable')) {
        throw new sfException('The "' . get_class($item->getItem()) .
        	'" item of fpPaymentPriceManagerItem must implement fpPaymentShippable behavior');
      }
      $this->items[] = $item;
    }
    
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
   * Get items
   *
   * @return fpPaymentPriceManagerItem[]
   */
  public function getItems()
  {
    return $this->items;
  }
  
  /**
   * Get shipping price
   *
   * @return double
   */
  public function getPrice()
  {
    $shippingPrice = 0.00;
    /* @var $item fpPaymentPriceManagerItem */
    foreach ($this->getItems() as $item) {
      // TODO finish
      //$item->getItem()->getShipping()->getPrice();
    }
    return $shippingPrice;
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