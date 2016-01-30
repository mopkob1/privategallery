<?php
/**
 * Created by PhpStorm.
 * User: mopkob
 * Date: 10.01.16
 * Time: 15:38
 */

namespace Entities\manyToMany\bidir;
use Doctrine\Common\Collections\ArrayCollection;


/** @Entity
 * @Table(name="mtmUser")
 */
class User {
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id = null;

    /**
     * @Column(type="string")
     */
    private $userName;

    /**
     * @ManyToMany(targetEntity="Entities\manyToMany\bidir\Group", inversedBy="users")
     * @JoinTable(name="users_groups")
     */
    private $groups;

    public function addGroup(Group $group)
    {
        $this->getGroups()->add($group);
        $group->addUser($this);
    }
    function __construct($userName='')
    {
        $this->userName = $userName;
        $this->groups = new ArrayCollection();
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->userName;
    }

    public function __toString()
    {
        return (string)$this->getUserName();
    }


} 