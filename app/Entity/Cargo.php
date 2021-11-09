<?php

  namespace App\Entity;

  use \App\Db\DataBase;
  use \PDO;
class Cargo{
    
    public $id;  
    public $descricao;
    public $id_Setor;

    /**
    * FUNÇÃO RESPONSÁVEL POR CADASTRAR OS 
    * OBJETOS DE CARGO NO BANCO 'cargo'
    * 
    *  */  
    public function cadastrarCargo(){
      //inserir Cargo no banco
      $obDatabase = new Database('cargo');
      $this->id = $obDatabase->insert([
              'descricao'   => $this->descricao, 
              'id_Setor'    => $this->id_Setor 
               
      ]);
    //RETORNAR STATUS
    return true;
  }
 

  }
