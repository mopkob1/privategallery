<?php
/**
 * Created by PhpStorm.
 * User: mopkob
 * Date: 10.01.16
 * Time: 15:38
 */

namespace Entities\manyToMany\bidir;


/** @Entity
 * @Table(name="mtmGroup")
 */
class Group {
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id = null;

    /**
     * @Column(type="string")
     */
    private $groupName;

    /**
     * @ManyToMany(targetEntity="Entities\manyToMany\bidir\User", mappedBy="groups")
     */
    private $users;

    public function addUser(User $user){
        $this->getUsers()->add($user);
    }
    function __construct($groupName='')
    {
        $this->groupName = $groupName;
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getGroupName()
    {
        return $this->groupName;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getUsers()
    {
        return $this->users;
    }

    public function __toString()
    {
        return (string)$this->getGroupName();
    }


}