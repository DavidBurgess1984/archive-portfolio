<?php

/**
*  Demonstration of Abstract Factory Pattern
*  Responsibility for generating objects is separated from the object functions.  In this example, the type of pizza is specified at runtime
*  by the PizzaTestDrive class.
*  Each class better adheres to having a single responsibility.
*/

//Factory class
abstract class PizzaStore{
	
	protected $pizza;
	
	public function orderPizza($type){

		$this->pizza = $this->createPizza($type);
		
		$this->pizza->prepare();
		$this->pizza->bake();
		$this->pizza->cut();
		$this->pizza->box();
		
		return $this->pizza;
	}
	
	abstract function createPizza($type);
}

class NYPizzaStore extends PizzaStore{
	function createPizza($item){
		if($item === "cheese"){
			return new NYStyleCheesePizza();	
		} elseif($item === "pepperoni"){
			return new NYStylePepperoniPizza();
		} else {
			return null;
		}
	}
}

class ChicagoPizzaStore extends PizzaStore{
	function createPizza($item){
		if($item === "cheese"){
			return new ChicagoStyleCheesePizza();	
		} elseif($item === "pepperoni"){
			return new ChicagoStylePepperoniPizza();
		} else {
			return null;
		}
	}
}

abstract class Pizza{
	protected $name;
	protected $dough;
	protected $sauce;
	
	protected $toppings;
	
	function prepare(){
		echo "Preparing {$this->name}\n";
		echo "Tossing dough\n";
		echo "Adding Sauce\n";
		echo "Adding toppings\n";
		foreach($this->toppings as $topping){
			echo $topping."\n";
		}
	}
	
	function bake(){
		echo "Bake for 25 mins at 350 \n";
	}
	
	function cut(){
		echo "Cut the pizza into diagonal slices \n";
	}
	
	function box(){
		echo "Place pizza into box \n";
	}
	
	function getName(){
		return $this->name;
	}
}

class NYStyleCheesePizza extends Pizza{
	public function __construct(){
		$this->name = 'NY style Sauce and Cheese Pizza';
		$this->dough = "Thin crust Dough";
		$this->sauce = "Marinara Sauce";
		$this->toppings = array();
		array_push($this->toppings,"Grated Reggiano Cheese");
	}
}

class ChicagoStyleCheesePizza extends Pizza{
	public function __construct(){
		$this->name = 'Chicago style Deep Dish Cheese Pizza';
		$this->dough = "Extra thick crust Dough";
		$this->sauce = "Plum tomato Sauce";
		$this->toppings = array();
		array_push($this->toppings,"Shredded Mozzarella Cheese");
	}
	
	public function cut(){
		echo "Cutting pizza into squares\n";
	}
}

class PizzaTestDrive{
	
	public static function start(){
		$nyStore = new NYPizzaStore();
		$chicagoStore = new ChicagoPizzaStore();
		
		$pizza = $nyStore->orderPizza('cheese');
		echo "Ordered a {$pizza->getName()}\n";
		
		$pizza = $chicagoStore->orderPizza('cheese');
		echo "Ordered a {$pizza->getName()}\n";
	}
}

PizzaTestDrive::start();
?>