<?php
/**
 * Created by PhpStorm.
 * User: mopkob
 * Date: 06.01.16
 * Time: 22:37
 */

namespace Entities;


/**
 *
 * Class Group
 * @package Entities
 * @Entity
 */
class Group {
    /**
     * @Column(name="id", type="integer")
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @param mixed $groupfield
     */
    public function setGroupfield($groupfield)
    {
        $this->groupfield = $groupfield;
    }

    /**
     * @return mixed
     */
    public function getGroupfield()
    {
        return $this->groupfield;
    }
    /**
     * @var
     * @Column(type="string")
     */
    protected $groupfield;
} 