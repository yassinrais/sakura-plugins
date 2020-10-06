<?php
namespace SakuraPanel\Plugins\Newsletter\Models;

use SakuraPanel\Models\ModelBase;

class Groups extends ModelBase
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var string
     */
    public $name;

    /**
     *
     * @var string
     */
    public $description;

    /**
     *
     * @var integer
     */
    public $status;

    /**
     *
     * @var string
     */
    public $created_at;

    /**
     *
     * @var integer
     */
    public $created_ip;

    /**
     *
     * @var string
     */
    public $updated_ip;

    /**
     *
     * @var integer
     */
    public $updated_at;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSource($this->getSourceByName("newsletter_groups"));
                
        $this->hasManyToMany(
            "id",
            SubscriberGroups::class,
            "group_id",
            "subscriber_id",
            Subscribers::class,
            "id",
            [
                'reusable' => true, // cache related data
                'alias'    => 'subscribers',
            ]
        );
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Groups[]|Groups|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null): \Phalcon\Mvc\Model\ResultsetInterface
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Groups|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }


}
