<?php
/**
 * Created by PhpStorm.
 * User: mopkob
 * Date: 06.01.16
 * Time: 22:39
 */

namespace Entities;


/**
 * Class Address
 * @package Entities
 * @Entity
 */
class Address {
    /**
     * @Column(name="id", type="integer")
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    protected $id;
    /**
     * @var
     * @Column(type="string")
     */
    protected $address;
    /**
     * @OneToMany(targetEntity="User", mappedBy="address")
     */
    protected $users;

    function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }
    public function addUser(User $user){
        $this->users[]=$user;
    }

} 