# fpPaymentShippingPlugin

## Overview

The shipping functional for e-commerce

## Requirements

* [Symfony](http://www.symfony-project.org) 1.4
* fpPaymentPlugin


## Getting Started

"product" table must have fpPaymentShippable and fpPaymentProduct behaviours

_schema.yml_

    Product:
      actAs:
        fpPaymentProduct: ~
        fpPaymentShippable: ~
      columns:
        some_other_field: {type: integer, notnull: true}
        
You have to enable "fpPaymentShipping" module

_settings.yml_

    all:
      .settings:
        enabled_modules:
          - fpPaymentShipping
          
