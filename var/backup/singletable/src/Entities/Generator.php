<?php
/**
 * Created by PhpStorm.
 * User: mopkob
 * Date: 06.01.16
 * Time: 0:57
 */

namespace Entities;


class Generator {
    /**
     * @var
     * @Column(type="")
     */
    protected $id;
    /**
     * @var
     */
    protected $voltage;
    /**
     * @var
     */
    protected $maxSpeed;
    /**
     * @var
     */
    protected $mass;

    /**
     * @param mixed $mass
     */
    public function setMass($mass)
    {
        $this->mass = $mass;
    }

    /**
     * @return mixed
     */
    public function getMass()
    {
        return $this->mass;
    }

    /**
     * @param mixed $maxSpeed
     */
    public function setMaxSpeed($maxSpeed)
    {
        $this->maxSpeed = $maxSpeed;
    }

    /**
     * @return mixed
     */
    public function getMaxSpeed()
    {
        return $this->maxSpeed;
    }

    /**
     * @param mixed $voltage
     */
    public function setVoltage($voltage)
    {
        $this->voltage = $voltage;
    }

    /**
     * @return mixed
     */
    public function getVoltage()
    {
        return $this->voltage;
    }

} 