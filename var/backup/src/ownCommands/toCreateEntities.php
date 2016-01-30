<?php
/**
 * Created by PhpStorm.
 * User: mopkob
 * Date: 06.01.16
 * Time: 21:26
 */

namespace ownCommands;


use Entities\Address;
use Entities\Admin;
use Entities\Helpdesk;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

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

        $addr1=new Address();
        $addr1->setAddress('addr1');
        $addr2=new Address();
        $addr2->setAddress('addr2');

        $admin1=new Admin();
        $admin1->setAdminfield('admin1');
        $admin1->setAddress($addr1);
        $admin2=new Admin();
        $admin2->setAdminfield('admin2');
        $admin2->setAddress($addr1);

        $hd1=new Helpdesk();
        $hd1->setHelpdeskfield('HelpDesk1');
        $hd1->setAddress($addr2);

        $hd2=new Helpdesk();
        $hd2->setHelpdeskfield('HelpDesk2');
        $hd2->setAddress($addr1);

        $em->persist($addr1);
        $em->persist($addr2);

        $em->persist($hd1);
        $em->persist($hd2);

        $em->persist($admin1);
        $em->persist($admin2);

        $em->flush();
    }


}