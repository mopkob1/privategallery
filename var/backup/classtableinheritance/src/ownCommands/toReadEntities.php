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

class toReadEntities extends Command {
    protected function configure()
    {
        parent::configure();
        $this
            ->setName('2read-ent')
            ->setDescription('Command for read test entities')
            ->setDefinition(array())
            ->setHelp(<<<EOT
Cпециальное место для вывода HELP
EOT
        );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->getHelper('em')->getEntityManager();

        $e= $em->find('Entities\Employee',3);
        print_r($e->getname());
        print_r($e->gettitle());
    }


}