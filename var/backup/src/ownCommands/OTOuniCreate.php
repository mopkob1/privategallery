<?php
/**
 * Created by PhpStorm.
 * User: mopkob
 * Date: 08.01.16
 * Time: 21:47
 */

namespace ownCommands;

use Entities\oneToOne\unidir\Product;
use Entities\oneToOne\unidir\Shiping;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
class OTOuniCreate extends Command{

    protected function configure()
    {
        $this
            ->setName('oto-uni-create')
            ->setDescription('Command for creation test entities to demonstrate One-To-One unidirectional association')
            ->setDefinition(array())
            ->setHelp(<<<EOT
Cпециальное место для вывода HELP
EOT
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->getHelper('em')->getEntityManager();
        $prd=new Product('Prod1');
        $ship=new Shiping('Shipping1');
        $prd->setShiping($ship);
        $em->persist($ship);
        $em->persist($prd);
        $em->flush();

    }
} 