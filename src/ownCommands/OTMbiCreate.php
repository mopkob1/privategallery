<?php
/**
 * Created by PhpStorm.
 * User: mopkob
 * Date: 08.01.16
 * Time: 21:47
 */

namespace ownCommands;


use Entities\oneToMany\bidir\Feature;
use Entities\oneToMany\bidir\Product;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
class OTMbiCreate extends Command{

    protected function configure()
    {
        $this
            ->setName('otm-bi-create')
            ->setDescription('Command for creation test entities to demonstrate One-To-Many (Many-To-One) bidirectional association')
            ->setDefinition(array())
            ->setHelp(<<<EOT
Cпециальное место для вывода HELP
EOT
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->getHelper('em')->getEntityManager();
        $objs=array();
        $pars=array(
                    'Feature1'=>'Entities\oneToMany\bidir\Feature',
                    'Feature2'=>'Entities\oneToMany\bidir\Feature',
                    'Feature3'=>'Entities\oneToMany\bidir\Feature',
                    'Feature4'=>'Entities\oneToMany\bidir\Feature',
                    );
        foreach ($pars as $name => $obj) {
            $objs[]=new $obj($name);
        }
        $prd=new Product('Product1');
        foreach ($objs as $ftr) {
            $ftr->setProduct($prd);
            $em->persist($ftr);
        }
        $em->persist($prd);

        $em->flush();

    }
} 