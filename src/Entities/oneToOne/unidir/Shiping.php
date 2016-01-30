<?php
/**
 * Created by PhpStorm.
 * User: mopkob
 * Date: 08.01.16
 * Time: 19:46
 */

namespace Entities\oneToOne\unidir;

/** @Entity
 * @Table(name="otoShiping")
 */
class Shiping {
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id = null;

    /**
     * @Column(type="string")
     */
    private $shipingName;

    function __construct($shipingName='')
    {
        $this->shipingName = $shipingName;
    }

    /**
     * @param mixed $shipingName
     */
    public function setShipingName($shipingName)
    {
        $this->shipingName = $shipingName;
    }

    /**
     * @return mixed
     */
    public function getShipingName()
    {
        return $this->shipingName;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }


}