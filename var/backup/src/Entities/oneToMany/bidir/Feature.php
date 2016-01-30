<?php
/**
 * Created by PhpStorm.
 * User: mopkob
 * Date: 09.01.16
 * Time: 1:50
 */

namespace Entities\oneToMany\bidir;

/**
 * @Entity
 * @Table(name="otmFeature")
 */
class Feature {
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id = null;

    /**
     * @Column(type="string")
     */
    private $featureName;

    /**
     * @ManyToOne(targetEntity="Entities\oneToMany\bidir\Product", inversedBy="features")
     * @JoinColumn(name="product_id", referencedColumnName="id")
     */
    private $product;

    function __construct($featureName='')
    {
        $this->setFeatureName($featureName);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $featureName
     */
    public function setFeatureName($featureName)
    {
        $this->featureName = $featureName;
    }

    /**
     * @return mixed
     */
    public function getFeatureName()
    {
        return $this->featureName;
    }

    /**
     * @param mixed $product
     */
    public function setProduct(Product $product)
    {
        $this->product = $product;
        $product->addFeature($this);
    }

    /**
     * @return mixed
     */
    public function getProduct()
    {
        return $this->product;
    }
    public function __toString(){
        return (string)$this->getFeatureName();
    }

} 