<?php
namespace SakuraPanel\Plugins\Country\Forms;


// form elements
use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Numeric;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Select;

// controllers / models
use SakuraPanel\Forms\BaseForm;


// validation
use Phalcon\Validation\Validator\{ Between , PresenceOf , StringLength , Numericality , Number };

class CountryForm extends BaseForm
{
    public function initialize()
    {
      parent::initialize();
       
       /**
         *
         * Text Input
         *
         */
        $name = new Text(
          'name',
          [
            'required'=>true,
            'class'=>"form-control",
            'placeholder'=>'Country Name',
          ]
        );

         /**
         *
         * Text Input
         *
         */
        $title = new Text(
          'title',
          [
            'required'=>true,
            'class'=>"form-control",
            'placeholder'=>'Country Title',
          ]
        );
         /**
         *
         * Text Input
         *
         */
        $num = new Text(
          'num',
          [
            'class'=>"form-control",
            'placeholder'=>'Country Number',
          ]
        );
         /**
         *
         * Text Input
         *
         */
        $iso2 = new Text(
          'iso2',
          [
            'required'=>true,
            'class'=>"form-control",
            'placeholder'=>'ISO-2',
          ]
        );
         /**
         *
         * Text Input
         *
         */
        $iso3 = new Text(
          'iso3',
          [
            'required'=>true,
            'class'=>"form-control",
            'placeholder'=>'ISO-3',
          ]
        );
     
         /**
         *
         * Text Input
         *
         */
        $capital = new Text(
          'capital',
          [
            'class'=>"form-control",
            'placeholder'=>'Capital Name',
          ]
        );

         /**
         *
         * Text Input
         *
         */
        $currency = new Text(
          'currency',
          [
            'class'=>"form-control",
            'placeholder'=>'Currency',
          ]
        );
         /**
         *
         * Text Input
         *
         */
        $phonecode = new Numeric(
          'phonecode',
          [
            'class'=>"form-control",
            'placeholder'=>'Phone Code',
          ]
        );
     	
        /**
         * 
         * Stats Select
         *
         */
        $status = new Select(
          'status',
          [
            'Select Status'=>$this::STATUS_LIST
          ],
          [
            'required'=>true,
            'class'=>"form-control",
          ]
        );




        $name->addFilter('string');
        $title->addFilter('string');
        $currency->addFilter('string');
        $capital->addFilter('string');
        $iso2->addFilter('string');
        $iso3->addFilter('string');
        $num->addFilter('int');
        $status->addFilter('int');
        $phonecode->addFilter('int');


     	$this->add($title);
     	$this->add($name);
     	$this->add($num);
     	$this->add($iso3);
     	$this->add($iso2);
     	$this->add($capital);
     	$this->add($currency);
     	$this->add($phonecode);
     	$this->add($status);

    }


}