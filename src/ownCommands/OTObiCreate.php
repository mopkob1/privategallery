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
class OTObiCreate extends Command{

    protected function configure()
    {
        $this
            ->setName('oto-bi-create')
            ->setDescription('Command for creation test entities to demonstrate One-To-One bidirectional association')
            ->setDefinition(array())
            ->setHelp(<<<EOT
Cпециальное место для вывода HELP
EOT
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->getHelper('em')->getEntityManager();
        $cart1=new Cart('Cart1');
        $customer1 = new Customer('Customer1');
        //$customer1->setCart($cart1);
        $cart1->setCustomer($customer1);
        $em->persist($customer1);
        $em->persist($cart1);
        $em->flush();

    }
} 