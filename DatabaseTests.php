<?php
  require_once("Database.php");
  $dbTests = new DatabaseTests();
  $dbTests->testInsert();

  class DatabaseTests{
    
    private $db;
    
    function __construct()  {
      $filename = "../../generated_files/test.sqlite";
      unlink($filename);
      $this->db = new Database($filename);
    }
    
    function testInsert() {
      $this->db->createTable("testTable", array("testColumn"=>" CHAR(255)")); 
      $this->db->insert("testTable",array("testColumn"=>"testValue"));
    }
    
  }

?>