<?php

//状态模式  状态切换

interface State
{
    function handle();
}

class FreeState implements State
{
    public function handle(){
        echo "空闲中\n";
    }
}

class UseState implements State
{
    public function handle(){
        echo "使用中\n";
    }
}

class Context
{
    private $state;

    public function setState(State $s)
    {
        echo "已更改\n";
        $this->state = $s;
        $this->state->handle();
    }

}

class Client
{
    function do()
    {
        $context = new Context();
        $context->setState(new FreeState());
        $context->setState(new UseState());
    }
}

$c = new Client();
$c->do();