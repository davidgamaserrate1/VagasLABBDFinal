<?php

    require __DIR__. '/vendor/autoload.php';
    define('TITLE','Cadastrar Vaga');
    
 
    use \App\Entity\Empresa;
    use \App\Entity\Cargo;
    use \App\Entity\Setor;
    use \App\Entity\Vaga;
 
 
    //cadastrar
    $obVaga     = new Vaga;
    $obCargo    = new Cargo;
    $obEmpresa  = new Empresa;
    $obSetor    = new Setor;
  
    //echo (sizeof($listavagason->empresa_nome) );
    $vagas = $obVaga->getVagas();
    $obterEmpresas =  $obEmpresa->getEmpresa();
    
    // $vagas = $obCadastraVaga->getVagas();
    // for ($i = 0; $i < sizeof($vagas); $i++){
    //     $c = ($vagas[$i]->descricao);   
    //     $s = ($vagas[$i]->nome_setor);     
    //     $e = ($vagas[$i]->nome_empresa);
    //         $obVaga -> cadastrar(null,$c , $s ,$e );
    //      //  $obVaga -> cadastrar($vagas[$i]->descricao . ', ',$vagas[$i]->nome_setor . ', ', $vagas[$i]->nome_empresa);
    //     } 
    //echo( $vagas[0]->nome_empresa);
   

  
    
    if(isset
        (  
            $_POST['cargo_descricao'], $_POST['cargo_id_setor'], 
            $_POST['empresa_nome'], $_POST['setor_nome'],
            $_POST['setor_id_empresa']
        ))
    {
        $obCadastraVaga = new Vaga;
        $obCargo ->  descricao  =  $_POST['cargo_descricao'];
        $obCargo -> id_Setor=  $_POST['cargo_id_setor'];
        $obEmpresa -> nome_empresa =    $_POST['empresa_nome'];
        $obSetor -> nome_setor  = $_POST['setor_nome'];
        $obSetor -> id_empresa= $_POST['setor_id_empresa'];

        $obCargo ->cadastrarCargo();
        $obEmpresa ->cadastrarEmpresa();
        $obSetor ->cadastrarSetor();

        $obCadastraVaga -> descricao =  $obCargo ->  descricao ;
        $obCadastraVaga -> empresa = $obEmpresa -> nome_empresa ;
        $obCadastraVaga ->cadastrar();
        header('location: index.php?status=success');
        exit;
    }
    
    
    include __DIR__.'/includes/header.php';    
    include __DIR__.'/includes/formulario.php';    
    include __DIR__.'/includes/footer.php';