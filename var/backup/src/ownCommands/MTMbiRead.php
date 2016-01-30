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
/*        $this->ShowProduct();
        $this->ShowFeature();*/
    }
    private function ShowFeature(){
        $data=$this->ShareData();
        $em = $this->getHelper('em')->getEntityManager();
        $this->outmsg[]="\nBack direction:\n\n    Read from DB '".$data('ownershort').
                        "' obj, then load by one-To-many association '".
                        $data('slaveshort')."' objects\n\n";

        $ftr3=$em->find($data('owner'),3);
        $this->output(array($data('ownershort'),'ID',$ftr3->getid()));
        $this->output(array($data('ownershort'),'Name',$ftr3));

        $this->outmsg[]="\n    ".$data('ownershort')." has one-To-many association with "
                        .$data('slaveshort').":\n\n";

        $prd=$ftr3->getProduct();
        $this->output(array($data('slaveshort'),'ID',$prd->getid()));
        $this->output(array($data('slaveshort'),'Name',$prd));
        $this->outmsg[]="\n";

        print_r((string)$this);
    }
    private function ShowProduct(){
        $data=$this->ShareData();
        $this->outmsg[]="\nPrimary direction:\n\n    Read from DB '".$data('slaveshort')."' obj, then load by many-To-one association '".$data('ownershort')."' objects\n";

        $em = $this->getHelper('em')->getEntityManager();
        $prd=$em->find($data('slave'),1);
        $this->output(array($data('slaveshort'),'ID',$prd->getid()));
        $this->output(array($data('slaveshort'),'Name',$prd));
        $this->outmsg[]="\n    ".$data('slaveshort')." include collection of ".$data('ownershort').":\n\n";
        foreach ($prd->getFeatures() as $ftr) {
            $this->output(array($data('ownershort'),'ID',$ftr->getid()));
            $this->output(array($data('ownershort'),'Name',$ftr));
            $this->outmsg[]="\n";
        }

        print_r((string)$this);
    }
    private function ShareData(){
        $data=array(
            'owner'=>'\Entities\oneToMany\bidir\Feature',
            'slave'=>'\Entities\oneToMany\bidir\Product'
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