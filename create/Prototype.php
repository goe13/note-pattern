<?php

//效率提升

interface Prototype
{
    public function shallowCopy();
    public function deepCopy();
}


class ConcretePrototype implements Prototype
{
    /**
     * 浅拷贝
     * */
    public function shallowCopy()
    {
        return clone $this;
    }
    /**
     * 深拷贝
     * */
    public function deepCopy()
    {
        $serialize_obj = serialize($this);
        $clone_obj = unserialize($serialize_obj);
        return $clone_obj;
    }
}