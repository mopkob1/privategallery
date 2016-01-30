<?php
/**
 * Created by PhpStorm.
 * User: mopkob
 * Date: 06.01.16
 * Time: 21:26
 */

namespace ownCommands;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Entities\Employee;
use Entities\Person;

class toCreateEntities extends Command {
    protected function configure()
    {
        parent::configure();
        $this
            ->setName('2create-ent')
            ->setDescription('Command for creation test entities')
            ->setDefinition(array())
            ->setHelp(<<<EOT
Cпециальное место для вывода HELP
EOT
        );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->getHelper('em')->getEntityManager();

        $p= new Person();
        $e= new Employee();
        $p->setName("next obj");
        $e->setName("Another obj");
        $e->setTitle("Title for second");
        //$em->persist($p);
        $em->persist($e);
        $em->flush();
    }


}