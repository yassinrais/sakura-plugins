<?php
namespace SakuraPanel\Plugins\Newsletter\Models;

use SakuraPanel\Models\ModelBase;

class Campaigns extends ModelBase
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
    public $start_date;

    /**
     *
     * @var integer
     */
    public $end_date;

    /**
     *
     * @var integer
     */
    public $dailylimit;

    /**
     *
     * @var integer
     */
    public $template;

    /**
     *
     * @var integer
     */
    public $success;

    /**
     *
     * @var integer
     */
    public $fails;

    /**
     *
     * @var integer
     */
    public $lefts;

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
        $this->setSource($this->getSourceByName("campaigns"));

        $this->hasManyToMany(
            "id",
            CampaignGroups::class,
            "campaign_id",
            "group_id",
            Groups::class,
            "id"
        );
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Campaigns[]|Campaigns|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null): \Phalcon\Mvc\Model\ResultsetInterface
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Campaigns|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }


    /** 
     * Before Create / Update : Convert date string to timesmap
     */
    public function beforeCreate()
    {
        parent::beforeCreate();

        $this::convertDates();
    }
    public function beforeUpdate()
    {
        parent::beforeUpdate();

        $this::convertDates();
    }


    /** 
     * Convert Model Date from String to Timsmap
     * 
     * @void
     */
    private function convertDates()
    {
        $this->start_date = is_numeric($this->start_date) ? $this->start_date : strtotime($this->start_date);
        $this->end_date = is_numeric($this->end_date) ? $this->end_date : strtotime($this->end_date);
    }
}
