<?php
/**
 * Created by PhpStorm.
 * User: mopkob
 * Date: 11.01.16
 * Time: 0:04
 */

namespace Entities\asovr;

/** @Entity
 * @Table(name="asovrLog")
 */
class Log {
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id = null;

    protected $baseObj;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $baseObj
     */
    public function setBaseObj(BaseObj $baseObj)
    {
        $this->baseObj = $baseObj;
    }

    /**
     * @return mixed
     */
    public function getBaseObj()
    {
        return $this->baseObj;
    }



} 