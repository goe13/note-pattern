<?php
//便于大型复杂生产类

interface Skill{
    function run();
}
interface Attr{
    function run();
}

class FireSkill implements Skill
{
    public function run()
    {
        echo "create fire ball\n";
    }
}

class IntellectualAttr implements Attr
{
    public function run()
    {
        echo "magic powerful\n";
    }
}


interface Race{}

class ElfRace implements Race
{
    private $skill;
    private $attr;

    public function getAttr()
    {
        return $this->attr;
    }
    public function setAttr(Attr $var)
    {
        $this->attr = $var;
    }
    public function getSkill()
    {
        return $this->skill;
    }
    public function setSkill(Skill $var)
    {
        $this->skill = $var;
    }

    public function dosome()
    {
        $this->attr->run();
        $this->skill->run();
    }
}

interface RoleBuilder{
    function skill();
    function attr();
}

class FireMagicRoleBuilder implements RoleBuilder
{
    public function skill()
    {
        return new FireSkill();
    }
    public function attr()
    {
        return new IntellectualAttr();
    }
}

class ConcreteBuilder
{
    private $builder;
    public function __construct(RoleBuilder $builder)
    {
        $this->builder = $builder;
    }
    public function concreteRole()
    {

        $skill = $this->builder->skill();
        $attr = $this->builder->attr();


        $race = new ElfRace();
        $race->setSkill($skill);
        $race->setAttr($attr);

        return $race;
    }
}

class Client
{
    public function do()
    {
        $cb = new ConcreteBuilder(new FireMagicRoleBuilder());
        $role = $cb->concreteRole();

        $role->dosome();
    }
}

$c = new Client();

$c->do();