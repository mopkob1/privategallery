<?php
/**
 * Created by PhpStorm.
 * User: mopkob
 * Date: 08.01.16
 * Time: 21:47
 */

namespace ownCommands;

use Entities\oneToOne\bidir\Cart;
use Entities\oneToOne\bidir\Customer;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
class OTObiRead extends Command{

    protected function configure()
    {
        $this
            ->setName('oto-bi-read')
            ->setDescription('Command for show results creation test entities to demonstrate One-To-One bidirectional association')
            ->setDefinition(array())
            ->setHelp(<<<EOT
Cпециальное место для вывода HELP
EOT
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        print_r("\nPrimary direction:\n\tRead from DB 'Customer' obj, then load by one-To-one association 'Cart' object\n");
        $this->ShowCustomer();

        print_r("\nBack direction:\n\tRead from DB 'Cart' obj, then load by one-To-one association 'Customer' object\n");
        $this->ShowCart();




    }
    private function ShowCart(){
        $em = $this->getHelper('em')->getEntityManager();
        $cart1=$em->find('\Entities\oneToOne\bidir\Cart',1);

        printf("\tCart ID:". $cart1->getid() ."\n");
        print_r("\tCart Name:". $cart1->getCartName() ."\n");
        $customer1=$cart1->getCustomer();
        print_r("\tCustomer Name:". $customer1->getid() ."\n");
    }
    private function ShowCustomer(){
        $em = $this->getHelper('em')->getEntityManager();
        $customer1=$em->find('\Entities\oneToOne\bidir\Customer',1);

        printf("\tCustomer ID:". $customer1->getid() ."\n");
        print_r("\tCustomer Name:". $customer1->getCustomerName() ."\n");
        $cart1=$customer1->getCart();
        print_r("\tCart Name:". $cart1->getid() ."\n");
    }
} 