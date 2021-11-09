<?php

  namespace App\Entity;

  use \App\Db\DataBase;
  use \PDO;

class Empresa{
    
    public $id;  
    public $nome_empresa;
    
    /**
    * FUNÇÃO RESPONSÁVEL POR CADASTRAR OS 
    * OBJETOS DE EMPRESA NO BANCO 'empresa'
    * 
    *  */  
    public function cadastrarEmpresa(){
      //inserir vaga no banco 'empresa'
      $obDatabase = new Database('empresa');
      $this->id = $obDatabase->insert([
                                    'nome_empresa' => $this->nome_empresa
                                      ]);
    //RETORNAR STATUS
    return true;
  }
  public static function getEmpresa(){
    return (new Database('empresa'))->selectEmpresa()
                    ->fetchAll(PDO::FETCH_CLASS,self::class);
                                  
  }


  }
