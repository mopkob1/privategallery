<?php
/**
 * Created by PhpStorm.
 * User: mopkob
 * Date: 08.01.16
 * Time: 21:47
 */

namespace ownCommands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
class MTMbiRead extends Command{
    protected $outmsg=array();
    protected function configure()
    {
        $this
            ->setName('mtm-bi-read')
            ->setDescription('Command for show results creation test entities to demonstrate Many-To-Many (Many-To-Many) bidirectional association')
            ->setDefinition(array())
            ->setHelp(<<<EOT
Cпециальное место для вывода HELP
EOT
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->ShowUser(3);
        $this->ShowGroup(7);
    }
    private function ShowGroup($id=1){
        $data=$this->ShareData();
        $em = $this->getHelper('em')->getEntityManager();
        $this->outmsg[]="\nBack direction:\n\n    Read from DB '".$data('slaveshort').
                        "' obj, then load by many-To-many association '".
                        $data('ownershort')."' objects\n\n";

        $group=$em->find($data('slave'),$id);
        $this->output(array($data('slaveshort'),'ID',$group->getid()));
        $this->output(array($data('slaveshort'),'Name',$group));

        $this->outmsg[]="\n    ".$data('slaveshort')." has many-To-many association with "
                        .$data('ownershort').":\n\n";

        foreach ($group->getUsers() as $user) {
            $this->output(array($data('ownershort'),'ID',$user->getid()));
            $this->output(array($data('ownershort'),'Name',$user));
            $this->outmsg[]="\n";
        }




        print_r((string)$this);
    }
    private function ShowUser($id=1){
        $data=$this->ShareData();
        $this->outmsg[]="\nPrimary direction:\n\n    Read from DB '".$data('slaveshort')."' obj, then load by many-To-many association '".$data('ownershort')."' objects\n";

        $em = $this->getHelper('em')->getEntityManager();
        $user=$em->find($data('owner'),$id);
        $this->output(array($data('ownershort'),'ID',$user->getid()));
        $this->output(array($data('ownershort'),'Name',$user));
        $this->outmsg[]="\n    ".$data('ownershort')." include collection of ".$data('slaveshort').":\n\n";
        foreach ($user->getGroups() as $group) {
            $this->output(array($data('slaveshort'),'ID',$group->getid()));
            $this->output(array($data('slaveshort'),'Name',$group));
            $this->outmsg[]="\n";
        }

        print_r((string)$this);
    }
    private function ShareData(){
        $data=array(
            'owner'=>'\Entities\manyToMany\bidir\User',
            'slave'=>'\Entities\manyToMany\bidir\Group'
        );
        $data['ownershort']=array_pop(explode('\\',$data['owner']));
        $data['slaveshort']=array_pop(explode('\\',$data['slave']));
        return function($name) use ($data) {
            return $data[$name];
        };

    }
    private function output(array $opts){
        $this->outmsg[]=sprintf("\t%1\$s %2\$s: %3\$s\n",$opts[0],$opts[1],$opts[2]);
    }
    public function __toString(){
        $ret=implode("",$this->outmsg);
        $this->outmsg=array();
        return $ret;
    }
} 