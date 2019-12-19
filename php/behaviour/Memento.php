<?php

//备忘录
//

class Emp
{
    private $name;

    function __construct($name)
    {
        $this->name = $name;
    }

    function getMemento()
    {
        static $num=0;
        $num++;
        echo "备忘{$num}次\n";
        return new EmpMemento($this);
    }

    function recovery(EmpMemento $m)
    {
        echo "撤回:\n";
        $this->name = $m->getName();
    }

    function getName()
    {
        return $this->name;
    }
    function setName($name)
    {
        $this->name = $name;
    }
}

class EmpMemento
{
    private $name;
    function __construct(Emp $e)
    {
        $this->name = $e->getName();
    }
    function getName()
    {
        return $this->name;
    }
}

class CareTaker
{
    private $mementos=[];
    function setMemento(EmpMemento $m)
    {
        $this->mementos[] = $m;
    }
    function getMemento()
    {
        if(count($this->mementos)>0){
            return array_pop($this->mementos);
        }else{
            throw new Exception('已经到底了');
        }
    }
}

class Client
{
    function do()
    {
        $ct = new CareTaker();

        $emp = new Emp('start');
        echo $emp->getName(),"\n";

        $ct->setMemento($emp->getMemento());
        $emp->setName('la0');
        $ct->setMemento($emp->getMemento());
        $emp->setName('la1');
        $ct->setMemento($emp->getMemento());
        $emp->setName('la2');
        $ct->setMemento($emp->getMemento());
        $emp->setName('la3');
        echo $emp->getName(),"\n";

        $emp->recovery($ct->getMemento());
        echo $emp->getName(),"\n";
        $emp->recovery($ct->getMemento());
        echo $emp->getName(),"\n";
        $emp->recovery($ct->getMemento());
        echo $emp->getName(),"\n";
        $emp->recovery($ct->getMemento());
        echo $emp->getName(),"\n";
    }
}

$c = new Client();
$c->do();