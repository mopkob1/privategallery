<?php
/**
 * Created by PhpStorm.
 * User: mopkob
 * Date: 08.01.16
 * Time: 21:47
 */

namespace ownCommands;


use Entities\manyToMany\bidir\Group;
use Entities\manyToMany\bidir\User;
use Entities\oneToMany\bidir\Feature;
use Entities\oneToMany\bidir\Product;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
class MTMbiCreate extends Command{

    protected function configure()
    {
        $this
            ->setName('mtm-bi-create')
            ->setDescription('Command for creation test entities to demonstrate Many-To-Many bidirectional association')
            ->setDefinition(array())
            ->setHelp(<<<EOT
Cпециальное место для вывода HELP
EOT
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $userstr="Entities\manyToMany\bidir\User";
        $groupstr="Entities\manyToMany\bidir\Group";
        $users=array();
        $groups=array();
        $def=array(3,7,6,6,8,3);

        $em = $this->getHelper('em')->getEntityManager();

        //Создал
        for ($i=0; $i++<9;){
            $users[] = new User($this->getShort($userstr).$i);
            $groups[] = new Group($this->getShort($groupstr).$i);
        }

        //Обработал избранных
        foreach ($def as $i => $cur) {
            $users[$i]->addGroup($groups[$cur-1]);
        }

        //Обработал всех кроме избранных
        foreach ($groups as $g=>$group) {
            if ( ! in_array($g+1,$def) )
                foreach ($users as $u => $user)
                    $user->addGroup($group);
        }

        //Сохранил
        foreach ($users as $user) $em->persist($user);
        foreach ($groups as $group) $em->persist($group);

        $em->flush();
    }

    private function getShort($str)
    {
        return array_pop(explode("\\",$str));
    }
} 