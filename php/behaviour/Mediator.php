<?php

//中介者
interface Mediator
{
    function register(String $dname, Colleague $c);
    function command(String $dname);
}
//部门
interface Colleague
{
    function selfAction();
    function outAction();
}



class Leader implements Mediator
{
    private static $map;
    public function register($name,$d)
    {
        $this->map[$name] = $d;
    }
    public function command($name)
    {
        if(isset($this->map[$name])){
            $this->map[$name]->selfAction();
        }
    }
}

class Department implements Colleague
{
    private $name;
    private $leader;
    public function __construct(String $name,Leader $leader)
    {
        $this->name = $name;
        $this->leader = $leader;
        $this->leader->register($name,$this);
    }
    public function selfAction()
    {
        echo "沃在做";
    }
    public function outAction()
    {
        echo "leader needtodo do";
        $this->leader->command("A");
    }
}