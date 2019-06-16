<?php

//命令 转发 


class Receiver
{
    public function action()
    {
        echo "Receiver 执行命令";
    }
}


interface Command
{
    function execute();
}

class ConcreteCommand implements Command
{
    protected $receivers=[];
    public function __construct(Receiver $r)
    {
        $this->receiver[] = $r;
    }

    public function execute()
    {
        // do some things!
        foreach($this->receivers as $r)
        {
            $r->action();
        }
    }
}

class Invoke
{
    protected $command;
    public function __construct(Command $c)
    {
        $this->command = $c;
    }

    public function call()
    {
        //do some things!
        $this->command->execute();
    }
}


class Client
{
    public function do()
    {
        $invoke = new Invoke(new ConcreteCommand(new Receiver()));

        $invoke->call();
    }
}

$c = new Client();
$c->do();