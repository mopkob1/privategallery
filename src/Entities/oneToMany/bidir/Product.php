<?php
/**
 * Created by PhpStorm.
 * User: mopkob
 * Date: 09.01.16
 * Time: 1:49
 */

namespace Entities\oneToMany\bidir;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 * @Table(name="otmProduct")
 */
class Product {
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id = null;

    /**
     * @Column(type="string")
     */
    private $productName;

    /**
     * @OneToMany(targetEntity="Entities\oneToMany\bidir\Feature", mappedBy="product")
     */
    private $features;

    function __construct($productName='')
    {
        $this->setProductName($productName);
        $this->features = new ArrayCollection();
    }

    /**
     * @param mixed $features
     */
    public function addFeature(Feature $feature)
    {
        $this->features->add($feature);
    }

    /**
     * @return mixed
     */
    public function getFeatures()
    {
        return $this->features;
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
    public function __toString(){
        return (string)$this->getProductName();
    }


} 