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
    public function getACar()
    {
        return new ACar();
    }
    public function getBCar()
    {
        return new BCar();
    }
}

class Client
{
    public function do()
    {
        $f = new CarFactory();
        $acar = $f->getACar();
        $acar->run();
    }
}

$c = new Client();
$c->do();