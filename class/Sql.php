<?php

class Sql extends PDO{

    private $conn;

    public function __construct(){
        $this->conn = new PDO("mysql:dbname=dbphp7;localhost", "gabs", "leirbags");
    }

    private function setParam($stmt, $key, $value){
        $stmt->bindParam($key, $value);
    }

    private function setParams($stmt, $params = array()){
        foreach($params as $key=>$value){
            $this->setParam($stmt, $key, $value);
        }
    }

    public function dbQuery($queryString, $parameters = array()){
        $statement = $this->conn->prepare($queryString);
        $this->setParams($statement, $parameters);
        $statement->execute();

        return $statement;
    }

    public function select($queryString, $parameters = array()): array{
        
        $statement = $this->dbQuery($queryString, $parameters);
        
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>