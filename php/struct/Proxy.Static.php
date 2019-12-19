<?php

interface SellHouser
{
    function show();
    function contract();
    function deal();
}

class Owner
{
    public function show()
    {
    }
    public function contract()
    {
    }
    public function deal()
    {
        echo "owner deal";
    }
}

class Proxy implements SellHouser
{
    private $owner;
    public function __construct($owner)
    {
        $this->owner=$owner;
    }
    public function show()
    {
    }
    public function contract()
    {
    }
    public function deal()
    {
        $this->owner->deal();
    }
}