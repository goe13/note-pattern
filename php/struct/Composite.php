<?php

// 处理树型结构 天然递归

interface Component
{
    function operate();
}

interface Leaf extends Component
{//叶子

}
interface Composite extends Component
{//容器
    //children:array[Component]

    function add(Component $c);
    function remove(Component $c);
    function getChild(Int $index):Component;
}



