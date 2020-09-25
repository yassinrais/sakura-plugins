<?php
declare(strict_types=1);

namespace SakuraPanel\Plugins\City\Models;

use \SakuraPanel\Models\ModelBase;

class City extends ModelBase
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
    public $name_ascii;

    /**
     *
     * @var double
     */
    public $lat;

    /**
     *
     * @var double
     */
    public $lng;

    /**
     *
     * @var string
     */
    public $country;

    /**
     *
     * @var string
     */
    public $iso2;

    /**
     *
     * @var string
     */
    public $admin_name;

    /**
     *
     * @var string
     */
    public $capital;

    /**
     *
     * @var integer
     */
    public $population;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSource($this->getSourceByName("sakura_cities"));
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return City[]|City|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null): \Phalcon\Mvc\Model\ResultsetInterface
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return City|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
