<?php

class Filme {

    private $filmeId;
    private $titulo;
    private $genero;
    private $imdb;
    private $anoLancamento;

    public function getFilmeId() { return $this->filmeId; }
    public function setFilmeId($value){
        $this->filmeId = $value;
    }

    public function getTitulo(){ return $this->titulo; }
    public function setTitulo($value) {
        $this->titulo = $value;
    }

    public function getGenero(){ return $this->genero; }
    public function setGenero($value){
        $this->genero = $value;
    }

    public function getImdb(){ return $this->imdb; }
    public function setImdb($value){
        $this->imdb = $value;
    }

    public function getLancamento(){ return $this->anoLancamento; }
    public function setLancamento($value){
        $this->anoLancamento = $value;
    }

    public function loadById($id){
        $sql = new Sql();
        $result = $sql->select("SELECT * FROM filmes WHERE filme_id = :ID", array(":ID"=>$id));
        
        if(isset($result[0])) {

            $row = $result[0];

           $this->setFilmeId($row['filme_id']);
           $this->setTitulo($row['titulo']);
           $this->setGenero($row['genero']);
           $this->setImdb($row['imdb']);
           $this->setLancamento($row['ano_lancamento']);
        }
    }

    public function __toString(){
        return json_encode(array(
            "filme_id" => $this->getFilmeId(),
            "titulo" => $this->getTitulo(),
            "genero" => $this->getGenero(),
            "imdb" => $this->getImdb(),
            "ano_lancamento" => $this->getLancamento()
        ));
    }
}

?>