<?php
/**
 * Created by PhpStorm.
 * User: mopkob
 * Date: 08.01.16
 * Time: 19:27
 */
namespace Entities\oneToOne\bidir;

/** @Entity
 * @Table(name="otoCart")
 */
class Cart {

    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id = null;

    /**
     * @OneToOne(targetEntity="Customer", inversedBy="cart")
     * @JoinColumn(name="customer_id", referencedColumnName="id")
     */
    private $customer;

    /**
     * @Column(type="string")
     */
    private $cartName;

    function __construct($cartName='')
    {
        $this->cartName = $cartName;
    }

    /**
     * @param mixed $cartName
     */
    public function setCartName($cartName)
    {
        $this->cartName = $cartName;
    }

    /**
     * @return mixed
     */
    public function getCartName()
    {
        return $this->cartName;
    }

    /**
     * @param mixed $customer
     */
    public function setCustomer(Customer $customer)
    {
        $this->customer = $customer;
/*        if($customer->getCart()===$this)return;
        $customer->setCart($this);*/
    }

    /**
     * @return mixed
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }


} 