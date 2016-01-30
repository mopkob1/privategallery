<?php
/**
 * Created by PhpStorm.
 * User: mopkob
 * Date: 06.01.16
 * Time: 17:21
 */

namespace Entities;

use Entities\Person;

/**
 * @Entity
 */
class Employee extends Person {
    /**
     * @var
     * @Column(type="string")
     */
    protected $title;
    /**
     * @ManyToMany(targetEntity="Person")
     * @JoinTable(name="employee_person",
     *      joinColumns={@JoinColumn(name="employee_id", referencedColumnName="id")},
     *      inverseJoinColumns={@JoinColumn(name="person_id", referencedColumnName="id", unique=true)}
     *      )
     */
    protected $operations;


    public function __construct()
    {
        $this->operations = new \Doctrine\Common\Collections\ArrayCollection();
    }
    public function addOperation(Person $person){
        $this->operations[]=$person;
    }
    public function getOperations()
    {
        return $this->operations;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

} 