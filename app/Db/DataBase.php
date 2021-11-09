<?php

    namespace App\Db;
    use \PDO;
    use \PDOException;

class DataBase{
    //Configurações da conexão
    const HOST = 'localhost'; 
    const NAME = 'vagas'; 
    const USER = 'root';
    const PASS = '';
 
    private $table; 
    private $connection;
 
        public function __construct($table){
            $this->table = $table;
            $this->setConnection();
        }
         /**
        * FUNÇÃO RESPONSÁVEL POR CRIAR A CONEXÃO 
        * COM O BANCO 
        * 
        *  */  
        private function setConnection(){
            try{
                $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME,self::USER,self::PASS);
                $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e){
                die('ERROR na tabela  '. $this->table . ' '  .$e->getMessage());

            }
        }
        /**
        * FUNÇÃO RESPONSÁVEL POR EXECUTAR COMANDOS 
        * DO BANCO DE ACORDO COM A CONEXÃO ATUAL 
        * 
        *  */  
        public function execute($query,$params = []){
            try{
                $statement = $this->connection->prepare($query);
                $statement->execute($params);
                return $statement;
            }catch(PDOException $e){
                die('ERROR tabela '. $this->table  . ' '  .$e->getMessage());

            }
        }
       /**
        * FUNÇÃO RESPONSÁVEL POR INSERIR REGISTROS 
        * 
        *  */  
        public function insert($values){
            //DADOS DA QUERY
            $fields = array_keys($values);    
            $binds = array_pad([],count($fields),'?');
            $query = 'INSERT INTO '.$this->table.' ('.implode(',',$fields).') VALUES('.implode(',',$binds).')';
            
            //EXECUTA O INSERT
            $this->execute($query,array_values($values));
            
            //retorna o ID inserido
        return $this->connection->lastInsertId();
             
        }

         /**
        * FUNÇÃO RESPONSÁVEL POR SELECIONAR REGISTROS 
        * DA TABELA VAGAS (COM WHERE)
        *  */  
        public function select($where = null, $order = null, $limit = null, $fields ='*'){
            //DADOS DA QUERY
            $where = strlen($where) ? 'WHERE '.$where : ''; 
            $order = strlen($order) ? 'ORDER '.$order : ''; 
            $limit = strlen($limit) ? 'LIMIT '.$limit : ''; 

            //MONTA A QUERY
            $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit ;
            
            //EXECUTA A QUERY
        return $this->execute($query);

        }
        public function selectEmpresa( ){
            $query = 'SELECT  nome_empresa FROM empresa ';
            //EXECUTA A QUERY
        return $this->execute($query);

        }
         /**
        * FUNÇÃO RESPONSÁVEL POR SELECIONAR REGISTROS 
        * DA TABELA VAGAS
        *  */  
        public function selectVagas( ){
            //MONTA A QUERY SELECIONA VAGAS
            $query = 'SELECT id, descricao, empresa FROM vaga';
            //EXECUTA A QUERY
        return $this->execute($query);    
        }
 
        public function update($where,$values){
        //DADOS DA QUERY
            $fields = array_keys($values);
            //MONTA A QUERY
            $query = 'UPDATE '.$this->table.' SET '.implode('=?,',$fields).'=? WHERE '.$where;
        //EXECUTAR A QUERY
            $this->execute($query,array_values($values));
        //RETORNA STATUS
        return true;
    }

    /**
     * FUNÇÃO RESPONSÁVEL POR DELETAR REGISTROS 
     *  */   
    public function delete ($where){
        //MONTA QUERY
        $query = 'DELETE FROM '.$this->table. ' WHERE '.$where;
        //EXECUTA QUERY
        $this->execute($query);
        //RETORNA STATUS
        return true;
    }

}
    