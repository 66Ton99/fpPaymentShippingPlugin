<?php

/**
 * Shipping components
 *
 * @package    fpPayment
 * @subpackage Shipping
 * @author     Ton Sharp <Forma-PRO@66ton99.org.ua>
 */
class fpPaymentShippingComponentsBase extends sfComponents
{
  
  /**
   * Form
   *
   * @return void
   */
  public function executeForm()
  {
    $formClass = sfConfig::get('fp_payment_shipping_form_class', 'fpPaymentShippingMethodForm');
    $this->form = new $formClass();
    if (sfRequest::POST == $this->getRequest()->getMethod()) {
      $this->form->bind($this->getRequest()->getParameter($this->form->getName()));
      $this->form->isValid();
    }
  }
}
