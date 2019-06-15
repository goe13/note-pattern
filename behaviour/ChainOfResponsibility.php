<?php

//处理 级别处理的 任务

class LeaveRequest
{
    private $name;
    private $day;
    private $reason;

    public function __construct($name,$day,$reason)
    {
        $this->name = $name;
        $this->day = $day;
        $this->reason = $reason;
    }

    public function setName($name) { 
        $this->name= $name;
    }
    public function getName() { 
        return $this->name;
    }
    //..
}


abstract class Leader
{
    private $name;
    private $nextLeader;

    function __construct(String $name)
    {
        $this->name = $name;
    }

    public function setNextLeader(Leader $l)
    {
        $this->nextLeader = $l;
    }

    public abstract function handleLeaveRequest(LeaveRequest $lr);
}







