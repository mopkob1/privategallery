<?php
/**
 * Created by PhpStorm.
 * User: mopkob
 * Date: 11.01.16
 * Time: 0:06
 */

namespace Entities\asovr;


/** @Entity
 * @Table(name="asovrTag")
 */
class Tag extends BaseObj {
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id = null;

} 