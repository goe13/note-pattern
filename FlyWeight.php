<?php
/**
 *  部分共享 部分不共享 TODO::为什么需要继承operation方法
 */

interface FlyWeight
{
    function operation();
}

class ConcreteFlyWeight implements FlyWeight
{
    public function operation()
    {
        
    }
}

class UnshareConcreteFlyWeight
{

}


class FlyWeightFactory
{
    private static $map;

    public static function get($key)
    {
        if(isset(self::$map[$key])){
            return self::$map[$key];
        }else{
            self::$map[$key] = new f();
            return self::$map[$key];
        }
    }
}