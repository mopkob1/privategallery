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
class OTOuniRead extends Command{

    protected function configure()
    {
        $this
            ->setName('oto-uni-read')
            ->setDescription('Command for show results creation test entities to demonstrate One-To-One unidirectional association')
            ->setDefinition(array())
            ->setHelp(<<<EOT
Cпециальное место для вывода HELP
EOT
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        print_r("\nPrimary direction:\n\tRead from DB 'Product' obj, then load by one-To-one association 'Shiping' object\n");
        $this->ShowProduct();

        print_r("\nBack direction:\n\tRead from DB 'Shiping' obj, then load by one-To-one association 'Product' object\n");
        print_r("We will get ERROR!\n");
        $this->ShowShiping();
    }
    private function ShowShiping(){
        $em = $this->getHelper('em')->getEntityManager();
        $ship1=$em->find('Entities\oneToOne\unidir\Shiping',1);

        printf("\tShiping ID:". $ship1->getid() ."\n");
        print_r("\tShiping Name:". $ship1->getShipingName() ."\n");
        $prod1=$ship1->getProduct();
        print_r("\tProduct ID:". $prod1->getid() ."\n");
    }
    private function ShowProduct(){
        $em = $this->getHelper('em')->getEntityManager();
        $prod1=$em->find('Entities\oneToOne\unidir\Product',1);

        printf("\tProduct ID:". $prod1->getid() ."\n");
        print_r("\tProduct Name:". $prod1->getProductName() ."\n");
        $ship1=$prod1->getShiping();
        print_r("\tShiping ID:". $ship1->getid() ."\n");
    }
} 