<?php
/**
 * Created by PhpStorm.
 * User: mopkob
 * Date: 06.01.16
 * Time: 22:25
 */

namespace Entities;


/**
 * @Entity
 * @AssociationOverrides({
 *      @AssociationOverride(name="groups",
 *          joinTable=@JoinTable(
 *              name="users_helpdeskgroups",
 *              joinColumns=@JoinColumn(name="helpdeskuser_id"),
 *              inverseJoinColumns=@JoinColumn(name="helpdeskgroup_id")
 *          )
 *      ),
 *      @AssociationOverride(name="address",
 *          joinColumns=@JoinColumn(
 *              name="helpdeskaddress_id", referencedColumnName="id"
 *          )
 *      )
 * })
 */
class Helpdesk extends User
{
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
    protected $helpdeskfield;

    /**
     * @param mixed $helpdeskfield
     */
    public function setHelpdeskfield($helpdeskfield)
    {
        $this->helpdeskfield = $helpdeskfield;
    }

    /**
     * @return mixed
     */
    public function getHelpdeskfield()
    {
        return $this->helpdeskfield;
    }
}