<?php

  // Get the command that the user wants to run.
  // Generate a random log file for it to redirect the output
  // Put the command, the ID, and the location of the log file in the SQLLite database
  
  require_once("Database.php");

  $db = new Database();
  if (!$db->hasTable("processes")){
    echo "Creating database functions";
    $db->createTable("processes",array( "id"=>"INTEGER(4) PRIMARY KEY",
                                        "name"=>"CHAR(255)",
                                        "outputFile"=>"CHAR (255)"
                                      )));
  }
  
  

  $command = 'ant  -buildfile "/Users/Vineeth/projects/remoteControl/bootstrap.xml" test';
  $commandMap = array("1"=> $command);
  
  $processes =   
  $startCommand = $_GET["start"];
  
  if (array_key_exists("$startCommand",$commandMap)){
    $processes->add($command[$startCommand]);
  }
  
  
  
  class Processes   {
    
    private $db; 
    
    function __construct($db) {
      $this->db = $db;
    }
    
    function add($process)  {
      $db->insert("processes", array("name"=>$process,
                                     "outputFile"=>"foobar.txt"));
      
    }
  }
  

  
  
  
 
?>
