<?php
namespace SakuraPanel\Plugins\Newsletter\Models;

use SakuraPanel\Models\ModelBase;

class SubscriberGroups extends ModelBase
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
    public $subscriber_id;

    /**
     *
     * @var integer
     */
    public $group_id;

    /**
     *
     * @var integer
     */
    public $status;

    /**
     *
     * @var integer
     */
    public $created_at;

    /**
     *
     * @var string
     */
    public $created_ip;

    /**
     *
     * @var integer
     */
    public $updated_at;

    /**
     *
     * @var string
     */
    public $updated_ip;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSource($this->getSourceByName("subsriber_groups"));

        $this->hasOne(
            "subscriber_id",
            Subscribers::class,
            "id",
            [
                'reusable' => true, // cache related data
                'alias'    => 'subscriber',
            ]
        );
        $this->belongsTo(
            "group_id",
            Groups::class,
            "id",
            [
                'reusable' => true, // cache related data
                'alias'    => 'group',
            ]
        );
        
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return SubsriberGroups[]|SubsriberGroups|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null): \Phalcon\Mvc\Model\ResultsetInterface
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return SubsriberGroups|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
