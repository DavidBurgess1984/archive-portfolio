<?php

/**
 * Example of the Decorator Design Pattern.  Each object from a subclass of DecorateProcess acts as a wrapper on the MainProcess Object.
 * Clearly demonstrates the open closed SOLID principle.  
 */

class RequestHelper{}

abstract class ProcessRequest{
  abstract function process(RequestHelper $req);
}

class MainProcess extends ProcessRequest{
  function process(RequestHelper $req){
    print __CLASS__." doing something helpful with request \n";
  }
}

abstract class DecorateProcess extends ProcessRequest{
  protected $processRequest;
  function __construct(ProcessRequest $pr){
    $this->processRequest = $pr;
  }
}

class AuthenticateRequest extends DecorateProcess{
  function process(RequestHelper $req){
    print __CLASS__. " authorising the request \n";
    $this->processRequest->process($req);
  }
}

class StructureRequest extends DecorateProcess{
  function process(RequestHelper $req){
    print __CLASS__. " structuring the request \n";
    $this->processRequest->process( $req);
  }
}

class LogRequest extends DecorateProcess{
  function process(RequestHelper $req){
    print __CLASS__. " logging the request \n";
    $this->processRequest->process( $req);
  }
}

$process = new AuthenticateRequest(new StructureRequest(new LogRequest(new MainProcess())));

$process->process(new RequestHelper());
?>