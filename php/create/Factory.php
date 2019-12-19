<?php

class ACar
{
    public function run()
    {
        echo 'ACar run',"\n";
    }
}

class BCar
{
    public function run()
    {
        echo 'BCar run',"\n";
    }
}

class CarFactory
{
    public function getCar($name)
    {
        return new $name();
    }
}

class Client
{
    public function do()
    {
        $f = new CarFactory();
        $acar = $f->getCar('ACar');
        $acar->run();
    }
}

$c = new Client();
$c->do();