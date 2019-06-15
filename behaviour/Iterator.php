<?php

interface Iterator
{
    function first():void;
    function next():void;

    function hasNext():Boolean;
    function getCurrent();

    function isFirst():Boolean;
    function isLast():Boolean;

}
