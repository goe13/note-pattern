<?php

interface EleFactory{
    public function newCpu();
    public function newGpu();
}

class InterFactory implements EleFactory
{
    public function newCpu()
    {
        return new LowCpu();
    }
    public function newGpu()
    {
        return new HighGpu();
    }
}

class AMDFactory implements EleFactory
{
    public function newCpu()
    {
        return new HighCpu();
    }
    public function newGpu()
    {
        return new LowGpu();
    }
}

interface Cpu{
    public function run();
}
interface Gpu{
    public function run();
}

class HighCpu implements Cpu
{
    public function run()
    {
        echo 'run fast' , "\n";
    }
}
class LowCpu implements Cpu
{
    public function run()
    {
        echo 'run slow' , "\n";
    }
}

class HighGpu implements Gpu
{
    public function run()
    {
        echo 'run fast' , "\n";
    }
}
class LowGpu implements Gpu
{
    public function run()
    {
        echo 'run slow' , "\n";
    }
}



class Client
{
    public function do()
    {
        $fi = new InterFactory();
        $fa = new InterFactory();

        $cpu = $fi->newCpu();
        $gpu = $fa->newCpu();

        $cpu->run();
        $gpu->run();
    }
}

$c = new Client();
$c->do();