<?php

/*
 * 桥接模式
 * 使用发送器，将一个类对象传入另一个类作为属性，耦合M+N个类
 * 
 */

abstract class Info {

    protected $_send = NULL;

    public function __construct($send) {
        $this->_send = $send;
    }

    abstract function msg($content);

    public function send($to, $content) {
        $content = $this->msg($content);
        $this->_send->send($to, $content);
    }

}

class Email {

    public function send($to, $content) {
        echo "Email: From:$to Content:$content<br>\n";
    }

}
class Sms {

    public function send($to, $content) {
        echo "Sms: From:$to Content:$content<br>\n";
    }

}

class CommonBridge extends Info{
    public function msg($content) {
        return 'CommonBridge>>'.$content;
    }
}
class DangerBridge extends Info{
    public function msg($content) {
        return 'DangerBridge>>'.$content;
    }
}
//调用桥接
$CommonEmail  = new CommonBridge(new Email());
$CommonEmail->send('Tom','XXXXX');

$DangerSms  = new DangerBridge(new Sms());
$DangerSms->send('Lucy','OOOOOOO');



//基本类
interface Implementor
{
    function operation();
}

class Implementor1
{
    public function operation()
    {
        echo "this is opration1\n";
    }
}
class Implementor2
{
    public function operation()
    {
        echo "this is opration2\n";
    }
}


abstract class Abstraction
{
    private $implementor;//*用以连接

    public function operation()
    {
        $this->implementor->operation();
    }

    abstract function setImplementor(Implementor $i);
}

class Abstraction1 extends Abstraction
{
    function setImplementor(Implementor $i)
    {
        $this->implementor = $i;
    }
}
