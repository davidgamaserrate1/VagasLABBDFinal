<?php

  namespace App\Entity;

  use \App\Db\DataBase;
  
class Setor{
    
    public $id;  
    public $nome_setor;
    public $id_empresa;

    /**
    * FUNÇÃO RESPONSÁVEL POR CADASTRAR OS 
    * OBJETOS DE SETOR NO BANCO 'setor'
    * 
    *  */  
    public function cadastrarSetor(){
        //inserir vaga no banco
        $obDatabase = new Database('setor');
        $this->id = $obDatabase->insert([
                'nome_setor'          => $this->nome_setor, 
                'id_empresa'    => $this->id_empresa
                 
        ])+rand(0,31232312323123);
      //RETORNAR STATUS
      return true;
    }


  }
