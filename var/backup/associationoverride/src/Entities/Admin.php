<?php
/**
 * Created by PhpStorm.
 * User: mopkob
 * Date: 06.01.16
 * Time: 22:24
 */

namespace Entities;

/**
 * @Entity
 * @AssociationOverrides({
 *      @AssociationOverride(name="groups",
 *          joinTable=@JoinTable(
 *              name="users_admingroups",
 *              joinColumns=@JoinColumn(name="adminuser_id"),
 *              inverseJoinColumns=@JoinColumn(name="admingroup_id")
 *          )
 *      ),
 *      @AssociationOverride(name="address",
 *          joinColumns=@JoinColumn(
 *              name="adminaddress_id", referencedColumnName="id"
 *          )
 *      )
 * })
 */
class Admin extends User
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
    protected $adminfield;

    /**
     * @param mixed $adminfield
     */
    public function setAdminfield($adminfield)
    {
        $this->adminfield = $adminfield;
    }

    /**
     * @return mixed
     */
    public function getAdminfield()
    {
        return $this->adminfield;
    }

}