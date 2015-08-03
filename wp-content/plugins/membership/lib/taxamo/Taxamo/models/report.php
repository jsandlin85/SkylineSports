<?php
/**
 *  Copyright 2014 Taxamo, Ltd.
 *
 *  Licensed under the Apache License, Version 2.0 (the "License");
 *  you may not use this file except in compliance with the License.
 *  You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 *  Unless required by applicable law or agreed to in writing, software
 *  distributed under the License is distributed on an "AS IS" BASIS,
 *  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *  See the License for the specific language governing permissions and
 *  limitations under the License.
 */

/**
 * $model.description$
 *
 * NOTE: This class is auto generated by the swagger code generator program. Do not edit the class manually.
 *
 */
class Report {

  static $swaggerTypes = array(
      'tax_rate' => 'number',
      'amount' => 'number',
      'country_name' => 'string',
      'country_code' => 'string',
      'tax_amount' => 'number',
      'skip_moss' => 'bool',
      'currency_code' => 'string'

    );

  /**
  * Tax rate
  */
  public $tax_rate; // number
  /**
  * Amount w/o tax
  */
  public $amount; // number
  /**
  * Country name
  */
  public $country_name; // string
  /**
  * Two letter ISO country code.
  */
  public $country_code; // string
  /**
  * Tax amount
  */
  public $tax_amount; // number
  /**
  * If true, this line should not be entered into MOSS and is provided for informative purposes only. For example because the country is the same as MOSS registration country and merchant country.
  */
  public $skip_moss; // bool
  /**
  * Three-letter ISO currency code.
  */
  public $currency_code; // string
  }
