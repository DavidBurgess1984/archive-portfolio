<?php

/**
 * The Strategy pattern encapsulates an algorithm as an object.  This is to prevent excessive subclasses being produced and
 * ensures that each class is responsible for one action.  This adheres to SOLID principles of OO Design.
 * We may add another CostStrategy class without changing the Lesson class Code
 */

abstract class Lesson{
  private $duration;
  private $costStrategy;
  
  function __construct($duration, $costStrategy){
    $this->duration = $duration;
    $this->costStrategy = $costStrategy;
  }
  
  function getCost(){
    return $this->costStrategy->getCost($this);
  }
  
  function getChargeType(){
    return $this->costStrategy->getChargeType();
  }
  
  function getDuration(){
    return $this->duration;
  }
}

class Seminar extends Lesson{}
class Lecture extends Lesson{}

interface CostStrategy{
  function getCost(Lesson $lesson);
  function getChargeType();
}

class TimedCostStrategy implements CostStrategy{
  function getCost(Lesson $lesson){
    return 5 * $lesson->getDuration();
  }
  
  function getChargeType(){
    return "Timed Cost Strategy";
  }
}

class FixedCostStrategy implements CostStrategy{
  function getCost(Lesson $lesson){
    return 30;
  }
  
  function getChargeType(){
    return "Fixed Cost Strategy";
  }
}
$duration = 3;
$lessons[] = new Lecture($duration, new TimedCostStrategy());

$duration = 5;
$lessons[] = new Seminar($duration, new FixedCostStrategy());

foreach($lessons as $lesson){
  echo "Class: ".get_class($lesson)."\n";
  echo "Lesson type: {$lesson->getChargeType()} \n";
  echo "Cost: {$lesson->getCost()} \n";
}
?>