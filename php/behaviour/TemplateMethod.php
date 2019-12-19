<?php

//定好骨架 父类调用子类

abstract class BankTemplateMethod {
	//具体方法
	public function takeNumber(){
		echo "取号排队";
	}
	
	public abstract function transact(); //办理具体的业务	//钩子方法
	
	public function evaluate(){
        echo "反馈评分";
	}
	


	public final function process(){	//模板方法！！！
		$this->takeNumber();

		$this->transact();

		$this->evaluate();
	}
	
}
