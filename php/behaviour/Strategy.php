<?php

//针对 各种条件类型 使用相应算法


interface Strategy
{
    function algorithm();
}

class strategy1 implements Strategy
{
    public function algorithm($var)
    {
        return 1;
    }
}

class strategy2 implements Strategy
{
    public function algorithm($var)
    {
        return 2;
    }
}

class Context
{
    private $strategy;

    public function __construct(Strategy $s)
    {
        $this->strategy = $s;
    }


    public function doAlgorithm($var)
    {
        return $this->strategy->algorithm($var);
    }

}



