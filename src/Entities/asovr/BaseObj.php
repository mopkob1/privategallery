<?php
/**
 * Created by PhpStorm.
 * User: mopkob
 * Date: 11.01.16
 * Time: 0:04
 */

namespace Entities\asovr;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @MappedSuperclass 
 */
class BaseObj {
    /**
     * @ManyToOne(targetEntity="Entities\asovr\Log", mappedBy="obj")
     * @JoinColumn(name="log_id", referencedColumnName="id")
     */
    protected $logs;

    function __construct()
    {
        $this->logs = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getLogs()
    {
        return $this->logs;
    }

    public function addLog(Log $log){
        $this->getLogs()->add($log);
        $log->setObj($this);
    }
} 