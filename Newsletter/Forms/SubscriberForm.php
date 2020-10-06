<?php
namespace SakuraPanel\Plugins\Newsletter\Forms;

use SakuraPanel\Forms\BaseForm;

use Phalcon\Forms\Element\{Email , Text , Select};


class SubscriberForm extends BaseForm {

    public function initialize()
    {
        parent::initialize();
        
        /**
         * Email Input
         */
        $email = new Email(
            'email',
            [
              'required'=>true,
              'class'=>"form-control"
            ]
          );
        $email->addFilter('email');
        $this->add($email);
        
        /**
         * Text Input
         */
        $referrer = new Text(
            'referrer',
            [
              'required'=>true,
              'class'=>"form-control"
            ]
          );
        $referrer->addFilter('string');
        $this->add($referrer);

        
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
        return ['email'=>'Email','referrer'=>'Source','status'=>'Status'];
    }
}