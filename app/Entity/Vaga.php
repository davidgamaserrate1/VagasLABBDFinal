<?php

  namespace App\Entity;

  use \App\Db\DataBase;
  use \PDO;


class Vaga{
    
    public $id;
    public $descricao;   
    public $empresa;
    
    /**
    * FUNÇÃO RESPONSÁVEL POR CADASTRAR OS 
    * OBJETOS DE VAGA NO BANCO 'vaga'
    * 
    *  */       
    public function cadastrar(){
      //inserir vaga no banco
      $obDatabase = new Database('vaga');
      $this->id = $obDatabase->insert([
              'descricao'  => $this->descricao, 
              'empresa'    => $this->empresa
               
      ]) ;
    //RETORNAR STATUS
    return true;
  }
      /**
    * FUNÇÃO RESPONSÁVEL POR ATUALIZAR OS 
    * OBJETOS DE VAGA NO BANCO 'vaga'
    * 
    *  */     
  public function atualizar(){
    return (new Database('vaga'))->update('id = '.$this->id,[
                                              'descricao'    => $this->descricao,
                                              'empresa' => $this->empresa
                                         ]);
  }
    /**
    * FUNÇÃO RESPONSÁVEL POR RETORNAR TODO  
    * OBJETOS DE VAGA NO BANCO 'vaga' ATRAVES DA FUNÇÃO SELECT
    * CRIADA EM DataBase.php
    * 
    *  */   
  public static function getVagas(){
    return (new Database('vaga'))->selectVagas( )
                                  ->fetchAll(PDO::FETCH_CLASS,self::class);
                                  
  }
    /**
    * FUNÇÃO RESPONSÁVEL POR RETORNAR  
    * OBJETOS DE VAGA NO BANCO 'vaga', DE ACORDO COM ID PASSADO COMO PARAMETRO
    * NA FUNÇÃO CRIADA EM DataBase.php
    *  
    *  */   
    public static function getVaga($id){
        return (new Database('vaga'))->select('id = '.$id)
                                      ->fetchObject(self::class);
    }
    /**
     * Método responsáve por excluir vaga do banco de dados
     * 
     */
    public function excluir(){
        return (new Database('vaga'))->delete('id ='.$this->id);
    }

}

