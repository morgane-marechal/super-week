<?php

namespace SuperWeek\Model;
use pdo;
class Database {

    // private properties
    private string $db_host = 'xxxx';
    private string $db_username = 'xxxx';
    private string $db_password = 'xxxx';
    private int $db_port = -1;
  
    // protected properties
    protected string $db_name = 'super_week';
  
    // initialize some  properties with `null`
    public ?object $pdo = null;
    public ?object $db = null;

    // public properties
    // - connection errors
    public int $db_connect_errno;
    public string $db_connect_error;
  
    /**
     * Constructor that is automatically called whenever an object of this database gets created.
     * @param bool $autoConnect - if TRUE, a connection to the database will be attempted automatically or during object instantiation of this class
     */
    public function __construct(bool $autoConnect = false) {
      $this->db_connect_errno = 0;
      $this->db_connect_error = "";
      if ($autoConnect) {
        $this->dbConnect();
      }
  
    } 
  
    public function setDatabaseUsername(string $db_username): void {
      $this->db_username = $db_username;
    }

    public function setDatabasePassword(string $db_password): void {
      $this->db_password = $db_password;
    }

    public function setDatabasePort(int $db_port): void {
      $this->db_port = $db_port;
    }
    
  

    public function dbConnect(): ?object {
      // initialize the `pdo` variable by setting it to null
      $pdo = null;
      $this->resetConnectErrors();
      // define some options for the pdo connection as `db_options`
      $db_options = [
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', // BE SURE TO WORK IN UTF8
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //ERROR TYPE
        PDO::ATTR_EMULATE_PREPARES => false // FOR NO EMULATE PREPARE (SQL INJECTION)
      ];
  
      // get our current Data Source Name as `db_dsn`
      $db_dsn = $this->getDSN();
      
      // Let's try to establish a database connection, shall we?
      try {
  
        // ...connect to our database, using the `db_name` variable
        $pdo = new pdo($db_dsn, $this->db_username, $this->db_password, $db_options);
        $this->pdo = $pdo;
      
      } catch (PDOException $e) { 
         // update the connection errors
        $this->updateConnectErrors($this::ERROR_FOUND, "[dbConnect]: Failed to connect to Maxaboom database - " . $e->getMessage());
      }   

      return $pdo; 
    }
  




    public function dbClose(): void {
      // close the database connection by setting the `pdo` & `db` objects to null
      $this->pdo = null;
      $this->db = null;
    }
  

    private function getDSN(): string {
      $default_dsn = "mysql:host=$this->db_host;dbname=$this->db_name";
      
      return ($this->db_port !== -1) ? "$default_dsn;port={$this->db_port}" : $default_dsn;
    }
  

    private function resetConnectErrors(): void {
      $this->db_connect_errno = 0;
      $this->db_connect_error = "";
    }


    private function updateConnectErrors($errno, $error): void {
      $this->db_connect_errno = $errno;
      $this->db_connect_error = $error;
    }
  
  }