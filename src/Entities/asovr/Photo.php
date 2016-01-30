<?php
/**
 * Created by PhpStorm.
 * User: mopkob
 * Date: 11.01.16
 * Time: 0:05
 */

namespace Entities\asovr;


/** @Entity
 * @Table(name="asovrPhoto")
 */
class Photo extends BaseObj {
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id = null;

} 