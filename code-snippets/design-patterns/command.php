<?php

/**
* Command Pattern - PHP implementation taken from Head First Design Patterns
* We encapsulate the command and separate out the invoker object.  There are four terms associated:
* command, receiver, invoker and client.  The invoker does not know anything about a concrete command.
* Allows undo functionality to be easily implemented.
*
*/
interface Command{
	public function execute();
}

class LightOnCommand implements Command{
	private $light;
	
	public function __construct(Light $light){
		$this->light = $light;
	}
	
	public function execute(){
		$this->light->on();
	}
}

class GarageDoorOpenCommand implements Command{
	private $garageDoor;
	
	public function __construct($garageDoor){
		$this->garageDoor = $garageDoor;
	}
	
	public function execute(){
		$this->garageDoor->up();
	}
}

//Receiver Classes
class GarageDoor{
	public function up(){
		echo "Garage Door is up\n";
	}
	
	public function down(){
		echo "Garage Door is down\n";
	}
}

class Light{
	public function on(){
		echo "light is On\n";
	}
	
	public function off(){
		echo "light is Off\n";
	}
}

//Invoker Class
class SimpleRemoteControl {
	private $slot;
	
	public function __construct(){
		
	}
	
	public function setCommand(Command $command){
		$this->slot = $command;
	}
	
	public function buttonWasPressed(){
		$this->slot->execute();
	}
}

//Client Class
class RemoteControlTest{
	public static function init(){
		$remote = new SimpleRemoteControl();
		$light = new Light();
		$garageDoor = new GarageDoor();
		
		$lightOn = new LightOnCommand($light);
		$garageDoorOpenCommand = new GarageDoorOpenCommand($garageDoor);
		$remote->setCommand($lightOn);
		$remote->buttonWasPressed();
		
		$remote->setCommand($garageDoorOpenCommand);
		$remote->buttonWasPressed();
	}
}

RemoteControlTest::init();
?>