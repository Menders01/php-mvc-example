<?php 
 
  /**
   * 
   */
  namespace MVC\Model;

  class Manager
  {
  	
  	protected function dbConnect() {

  		$db = new \PDO('mysql:host=localhost;dbname=blog', 'root', '', array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));

		return $db;
  	}
  }