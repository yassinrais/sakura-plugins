<?php 

namespace SakuraPanel\Plugins\Newsletter\Forms;

use \SakuraPanel\Forms\BaseForm;

use \Phalcon\Forms\Element\{TextArea, Text , Select, Date, Numeric};
use \Phalcon\Validation\Validator\{Between};

class CampaignForm extends BaseForm {

    public function initialize()
    {
        parent::initialize();

        /**
         * Text Input
         */
        $name = new Text(
            'name',
            [
              'required'=>true,
              'class'=>"form-control"
            ]
          );
        $name->addFilter('string')->setDefault("Campaign #". rand(1,999));
        $this->add($name);

        /**
         * Text Input
         */
        $description = new TextArea(
          'description',
          [
            'required'=>true,
            'class'=>"form-control"
          ]
        );
      $description->addFilter('string')->setDefault("New Campaign");
      $this->add($description);

      /**
       * Date Input
       */
      $start_date = new Date(
          'start_date',
          [
            'required'=>true,
            'class'=>"form-control"
          ]
        );
      $start_date->addFilter('string')->setDefault(date("Y-m-d"));
      $this->add($start_date);

      /**
       * Date Input
       */
      $end_date = new Date(
          'end_date',
          [
            'required'=>true,
            'class'=>"form-control"
          ]
        );
      $end_date->addFilter('string')->setDefault(date("Y-m-d" , time() + 60**2 * 24 * 15 ));
      $this->add($end_date);

      /**
       * Date Input
       */
      $dailylimit = new Numeric(
          'dailylimit',
          [
            'required'=>true,
            'class'=>"form-control",
          ]
        );
 
      $dailylimit->addFilter('int')->setDefault(1000)->addValidator(new Between([
          'minimum' => 0,
          'maximum' => 10000000,
          'message' => 'The :field must be positive !',
        ])
      );
      $this->add($dailylimit);

        
      /**
       * Stats Select
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
      $dailylimit->addFilter('string');
      $this->add($status);

    }


    public function getInputs()
    {
        return [
          'name'=>'Name',
          'description'=>'Description',
          'start_date'=>'Start Date',
          'end_date'=>'End Date',
          'dailylimit'=>'Daily Mail Limits',
          'status'=>'Status'
        ];
    }
}