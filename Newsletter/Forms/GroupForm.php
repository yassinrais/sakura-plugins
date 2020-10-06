<?php
namespace SakuraPanel\Plugins\Newsletter\Forms;

use SakuraPanel\Forms\BaseForm;

use Phalcon\Forms\Element\{Email , Text , Select};


class GroupForm extends BaseForm {

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
        $name->addFilter('string');
        $this->add($name);

        /**
         * Text Input
         */
        $description = new Text(
            'description',
            [
              'required'=>true,
              'class'=>"form-control"
            ]
          );
        $description->addFilter('string');
        $this->add($description);

        
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
        $status->addFilter('int');
        $this->add($status);

    }


    public function getInputs()
    {
        return ['name'=>'Name','description'=>'Description','status'=>'Status'];
    }
}