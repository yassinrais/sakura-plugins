<?php
namespace SakuraPanel\Plugins\City\Forms;


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

class CityForm extends BaseForm
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
            'placeholder'=>'City Name',
          ]
        );

         /**
         *
         * Text Input
         *
         */
        $name_ascii = new Text(
          'name_ascii',
          [
            'required'=>true,
            'class'=>"form-control",
            'placeholder'=>'City Name Ascii',
          ]
        );
         /**
         *
         * Text Input
         *
         */
        $population = new Numeric(
          'population',
          [
            'class'=>"form-control",
            'placeholder'=>'Total Population',
          ]
        );
         /**
         *
         * Numeric Input
         *
         */
        $lat = new Numeric(
          'lat',
          [
            'class'=>"form-control",
            'placeholder'=>'Latitude',
          ]
        );
         /**
         *
         * Numeric Input
         *
         */
        $lng = new Numeric(
          'lng',
          [
            'class'=>"form-control",
            'placeholder'=>'Longitude',
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
            'placeholder'=>'Country ISO2',
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
            'placeholder'=>'Capitale',
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



      // filters
      $name->addFilter('string');
      $name_ascii->addFilter('string');
      
      $lat->addFilter('double');
      $lng->addFilter('double');

      $iso2->addFilter('string');

      $capital->addFilter('string');
      $population->addFilter('int');

      $status->addFilter('int');

      // add Validators
     	$this->add($name);
      $this->add($name_ascii);

      $this->add($lat);
      $this->add($lng);

     	$this->add($iso2);

      $this->add($capital);
     	$this->add($population);

     	$this->add($status);

    }


}