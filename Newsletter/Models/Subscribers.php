<?php
namespace SakuraPanel\Plugins\Newsletter\Models;


use SakuraPanel\Models\ModelBase;

use Phalcon\Validation;
use Phalcon\Validation\Validator\{Email as EmailValidator, Uniqueness as UniqRow};

class Subscribers extends ModelBase
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var integer
     */
    public $customer_id;

    /**
     *
     * @var string
     */
    public $referrer;

    /**
     *
     * @var string
     */
    public $email;

    /**
     *
     * @var integer
     */
    public $status;

    /**
     *
     * @var string
     */
    public $token;

    /**
     *
     * @var integer
     */
    public $created_at = 0;

    /**
     *
     * @var string
     */
    public $created_ip;

    /**
     *
     * @var integer
     */
    public $updated_at = 0;

    /**
     *
     * @var string
     */
    public $updated_ip;

    /**
     * Validations and business logic
     *
     * @return boolean
     */
    public function validation()
    {
        $validator = new Validation();

        $validator->add(
            'email',
            new EmailValidator(
                [
                    'model'   => $this,
                    'message' => 'Please enter a correct email address',
                ]
            )
        );

        $validator->add(
            'email',
            new UniqRow(
                [
                    "message" => "That :field is already subscribed to our Subscribers",
                ]
            )
        );

        return $this->validate($validator);
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSource($this->getSourceByName("subscribers"));

        
        $this->hasManyToMany(
            "id",
            SubscriberGroups::class,
            "subscriber_id",
            "group_id",
            Groups::class,
            "id",
            [
                'reusable' => true, // cache related data
                'alias'    => 'groups',
            ]
        );
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Subscribers[]|Subscribers|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null): \Phalcon\Mvc\Model\ResultsetInterface
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Subscribers|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }


    public function beforeCreate()
    {
        parent::beforeCreate();

        $this->token = $this::generateToken();
    }
    public function beforeUpdate()
    {
        parent::beforeUpdate();

        $this->token = $this::generateToken();
    }

}
