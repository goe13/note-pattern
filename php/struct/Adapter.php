<?php
// 连接功能方法

//目标功能方法
interface Target
{
    function say();
}

//被适配的类 需要隐藏 脚手架
class Adaptee
{
    public function doUse()
    {
        echo "我可以使用\n";
    }
}

// class Adapter1 extends Adaptee implements Target
// {
    // public function say()
    // {
        // $this->doUse($this);
    // }
// }

class Adapter2 implements Target
{
    private $adaptee;
    public function __construct(Adaptee $adaptee)
    {
        $this->adaptee = $adaptee;
    }

    //封装 统一 target 的功能方法
    public function say()
    {
        $this->adaptee->doUse();
    }
}


class Client
{
    public function do()
    {
        $a = new Adapter2(new Adaptee());

        $a->say();
    }
}

$c = new Client();
$c->do();