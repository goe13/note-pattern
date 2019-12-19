<?php
// 观察者 发布消息+订阅消息
// 推送消息， 拉取消息 主动，被动


interface Observer
{
    function update(Subject $s);
}

class Observer1 implements Observer
{
    private $myState;
    public function update(Subject $s)
    {
        $this->myState = $s->getState();
    }

    public function getState()
    {
        return $this->myState;
    }
}

abstract class Subject
{
    protected $obsevers=[];

    public function registerObserver(Observer $o)
    {
        $this->observers[] = $o;
    }

    //removeObserver
    abstract function setState($s);
    abstract function getState();

    public function notifyAllObservers()
    {
        foreach($this->observers as $ob)
        {
            $ob->update($this);
        }
    }
}

class ConcreteSubject extends Subject
{
    private $state;

    public function setState($s)
    {
        $this->state = $s;
        $this->notifyAllObservers();
    }

    public function getState()
    {
        return $this->state;
    }

}


class Client
{
    function do()
    {
        $o1 = new Observer1;
        $o2 = new Observer1;
        $o3 = new Observer1;

        $cs = new ConcreteSubject();

        $cs->registerObserver($o1);
        $cs->registerObserver($o2);
        $cs->registerObserver($o3);

        echo "状态是",$cs->getState(),"\n";

        echo "状态是",$o1->getState(),"\n";
        echo "状态是",$o2->getState(),"\n";
        echo "状态是",$o3->getState(),"\n";

        $cs->setState("dajiahao");

        echo "状态是",$cs->getState(),"\n";

        echo "状态是",$o1->getState(),"\n";
        echo "状态是",$o2->getState(),"\n";
        echo "状态是",$o3->getState(),"\n";

        $cs->setState("123");

        echo "状态是",$cs->getState(),"\n";

        echo "状态是",$o1->getState(),"\n";
        echo "状态是",$o2->getState(),"\n";
        echo "状态是",$o3->getState(),"\n";
    }
}

$c = new Client();
$c->do();