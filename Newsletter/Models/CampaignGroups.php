<?php
namespace SakuraPanel\Plugins\Newsletter\Models;

use SakuraPanel\Models\ModelBase;

class CampaignGroups extends ModelBase
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
    public $campaign_id;

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
        $this->setSource($this->getSourceByName("campaign_groups"));


        $this->hasOne(
            "group_id",
            Groups::class,
            "id",
            [
                "alais"=>"group",
                "reusable"=> true,
            ]
        );

        $this->hasOne(
            "campaign_id",
            Campaigns::class,
            "id",
            [
                "alais"=>"campaign",
                "reusable"=> true,
            ]
        );
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return CampaignGroups[]|CampaignGroups|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null): \Phalcon\Mvc\Model\ResultsetInterface
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CampaignGroups|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
