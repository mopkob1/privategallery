<?php
/**
 * Created by PhpStorm.
 * User: mopkob
 * Date: 08.01.16
 * Time: 19:45
 */

namespace Entities\oneToOne\unidir;

/** @Entity
 * @Table(name="otoProduct")
 */
class Product {
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id = null;

    /**
     * @OneToOne(targetEntity="Entities\oneToOne\unidir\Shiping")
     * @JoinColumn(name="shiping_id", referencedColumnName="id")
     */
    private $shiping;

    /**
     * @Column(type="string")
     */
    private $productName;

    function __construct($productName)
    {
        $this->productName = $productName;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $productName
     */
    public function setProductName($productName)
    {
        $this->productName = $productName;
    }

    /**
     * @return mixed
     */
    public function getProductName()
    {
        return $this->productName;
    }

    /**
     * @param mixed $shiping
     */
    public function setShiping($shiping)
    {
        $this->shiping = $shiping;
    }

    /**
     * @return mixed
     */
    public function getShiping()
    {
        return $this->shiping;
    }


} 