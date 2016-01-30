<?php
/**
 * Created by PhpStorm.
 * User: mopkob
 * Date: 08.01.16
 * Time: 18:00
 */

namespace Entities\oneToOne\bidir;
/** @Entity
 * @Table(name="otoCustomer")
 */
class Customer {
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id = null;

    /**Это обратная сторона двусторонней связи.
     * Определено сл. образом:
     *      - обратная сторона (ведомая) будет использовать
     *      - прямая сторона (ведущая) будет использовать
     * Атрибут указывает на поле в объекте, которое отвечает за связь
     */

     /**
     * @OneToOne(targetEntity="Cart", mappedBy="customer")
     */
    private $cart;

    /**
     * @Column(type="string")
     */
    private $customerName;

    function __construct($customerName='')
    {
        $this->customerName = $customerName;
    }

    /**
     * @param mixed $customerName
     */
    public function setCustomerName($customerName)
    {
        $this->customerName = $customerName;
    }

    /**
     * @return mixed
     */
    public function getCustomerName()
    {
        return $this->customerName;
    }


    /**
     * @param mixed $cart
     */
    public function setCart(Cart $cart)
    {
        $this->cart = $cart;
/*        if($cart->getCustomer()===$this)return;
        $cart->setCustomer($this);*/
    }

    /**
     * @return mixed
     */
    public function getCart()
    {
        return $this->cart;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

}