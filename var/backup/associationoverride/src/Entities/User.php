<?php
/**
 * Created by PhpStorm.
 * User: mopkob
 * Date: 06.01.16
 * Time: 22:22
 */

namespace Entities;


/**
 * @MappedSuperclass
 */
class User
{
    //other fields mapping

    /**
     * @ManyToMany(targetEntity="Group", inversedBy="users")
     * @JoinTable(name="users_groups",
     *  joinColumns={@JoinColumn(name="user_id", referencedColumnName="id")},
     *  inverseJoinColumns={@JoinColumn(name="group_id", referencedColumnName="id")}
     * )
     */
    protected $groups;

    /**
     * @ManyToOne(targetEntity="Address", inversedBy="users")
     * @JoinColumn(name="address_id", referencedColumnName="id")
     */
    protected $address;

    /**
     * @param mixed $address
     */
    public function setAddress(Address $address)
    {
        $this->address = $address;
        $address->addUser($this);
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

}