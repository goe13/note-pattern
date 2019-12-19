<?php
//安全 延迟 

//调用B的show方法时候去调用A的show方法
class Proxy{
    private $obj;
    function __construct(Object $o){
        $this->obj = $o;
    }
    function __call($name, $arguments)
    {
         $ref = new ReflectionClass($this->obj);
         if ($ref->hasMethod($name)){
             $method = $ref->getMethod($name);
             if ($method->isPublic()&&!$method->isAbstract()&&count($arguments)){
                 if ($method->isStatic()){
                     $method->invoke(null,$arguments);
                 }
                 else{
                     $method->invoke($this->obj,$arguments);
                 }
             }
         }
    }
}





