<?php
declare(strict_types=1);

namespace SakuraPanel\Plugins\Country\Models;

class Country extends \ModelBase
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
    public $num;

    /**
     *
     * @var string
     */
    public $iso2;

    /**
     *
     * @var string
     */
    public $iso3;

    /**
     *
     * @var string
     */
    public $name;

    /**
     *
     * @var string
     */
    public $title;

    /**
     *
     * @var string
     */
    public $capital;

    /**
     *
     * @var string
     */
    public $currency;

    /**
     *
     * @var integer
     */
    public $phonecode;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSource($this->getSourceByName("sakura_country"));
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Country[]|Country|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null): \Phalcon\Mvc\Model\ResultsetInterface
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Country|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
