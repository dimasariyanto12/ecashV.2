<?php 

      try 

      { 

           $con = new PDO('mysql:host=localhost;dbname=db_kas', 'root', 'dimasari123', array(PDO::ATTR_PERSISTENT => true)); 

      } 

      catch(PDOException $e) 

      { 

           echo $e->getMessage(); 

      } 

      include_once 'AuthClass.php'; 

      $user = new Auth($con); 

 ?> 