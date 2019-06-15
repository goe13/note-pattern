<?php
//动态为对象添加功能
//方便功能扩展


interface Component
{
    function operate();
}
//基础对象
interface ConcreteComponent extends Component
{

}
//创建生成
interface Decorator extends Component
{
    function __construct(Component $c);
}



interface ICar
{
    function move();
}

class Car implements ICar
{
    public function move()
    {
        echo "car move \n";
    }
}

class SuperCar implements ICar
{
    protected $c;
    public function __construct(ICar $c)
    {
        $this->c = $c;
    }
    public function move()
    {
        $this->c->move();
    }
}


class WaterCar extends SuperCar
{
    public function dosome()
    {
        echo "waterCar \n";
    }
    public function move()
    {
        parent::move();
        $this->dosome();
    }
}


class FlyCar extends SuperCar
{
    public function dosome()
    {
        echo "FlyCar \n";
    }
    public function move()
    {
        parent::move();
        $this->dosome();
    }
}

class AICar extends SuperCar
{
    public function dosome()
    {
        echo "AICar  \n";
    }
    public function move()
    {
        parent::move();
        $this->dosome();
    }
}


class Client
{
    public function do()
    {
        $car = new Car();
        $car->move();

        $car1 = new AICar(new FlyCar(new WaterCar($car)));
        $car1->move();

    }
}

$c = new Client();
$c->do();