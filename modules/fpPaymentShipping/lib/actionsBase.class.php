<?php

/**
 * Shipping actions.
 *
 * @package    fpPayment
 * @subpackage Shipping
 * @author     Ton Sharp <Forma-PRO@66ton99.org.ua>
 */
class fpPaymentShippingActionsBase extends sfActions
{
  
  /**
   * Methdo select
   *
   * @param sfWebRequest $request
   *
   * @return void
   */
  public function executeIndex(sfWebRequest $request)
  {
    $formClass = sfConfig::get('fp_payment_shipping_form_class', 'fpPaymentShippingMethodForm');
    $form = new $formClass();
    if (sfRequest::POST == $this->getRequest()->getMethod()) {
      $form->bind($this->getRequest()->getParameter($form->getName()));
      if ($form->isValid()) {
        $this->redirect('@fpPaymentPlugin_method');
      }
    }
  }
}