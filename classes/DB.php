<?php

if(preg_match('/view/', $_SERVER['REQUEST_URI']) || preg_match('/includes/', $_SERVER['REQUEST_URI'])) {

    require_once("../config/config_store.php");

}else{

    require_once("config/config_store.php");

}


class DB{

    private static $_instance;
    private $_pdo,
            $_query,
            $_error = false,
            $_results,
            $_count = 0;

    public function __construct(){

        $username = Config::get('db.user');
        $password = Config::get('db.password');
        $dsn='mysql:dbname='. Config::get('db.db_name') . ';host=' . Config::get('db.host') .'';

        try{

            $this->_pdo = new PDO($dsn, $username, $password);

        }catch(PDOException $e){

            echo "Failed to connect to Database";
            die($e->getMessage());

        }

    } // end method

    public static function getInstance(){

        if(!isset(self::$_instance)){

            self::$_instance = new DB();

        }

        return self::$_instance;

    } // end method

    public function escape($data){

        return htmlentities($data, ENT_QUOTES);

    } // end method

    public function query($sql, $clause, $params = array()){

         switch($clause){

          case "Param_ON":

            $this->_error = false;

             if($this->_query = $this->_pdo->prepare($sql)){

               $x = 1;

             if(count($params)){

                if(is_array($params) || is_object($params) || is_string($params) || is_numeric($params)){

                   foreach($params as $param){

                      $this->_query->bindValue($x, $param);
                      $x++;

                   }
                }
             }

             if($this->_query->execute()){

                 $this->_results = $this->_query->fetchAll(PDO::FETCH_ASSOC);
                 $this->_count = $this->_query->rowCount();

             }else{

                 $this->_error = true;

             }

          }
          return $this;

          break;

          case "Param_OFF":

             $this->_error = false;

             if($this->_query = $this->_pdo->prepare($sql)){

                if($this->_query->execute()){

                   $this->_results = $this->_query->fetchAll(PDO::FETCH_ASSOC);
                   $this->_count = $this->_query->rowCount();

                }else{

                   $this->_error = true;

                }

             }
             return $this;

          break;

         } // end switch

    } // end method query



    public function getExecute() {

        return $this->_query->execute();

    }

    public function fetch() {

        return $this->_query->fetch(PDO::FETCH_ASSOC);

    }

    public function countRow() {

        return $this->_count;

    }

    public function results() {

        return $this->_results;

    }

    public function first() {

        return $this->_results[0];

    }

    public function last() {

        return $this->results[$this->_count-1];

    }

    public function error(){

        return $this->_error;

    } // end method


} // end class


?>