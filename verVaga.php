<?php
    
    require __DIR__.'/vendor/autoload.php';

  
    use App\Entity\Vaga;
 

    //CONSULTA A VAGA
    $obvagason =   Vaga::getVaga ($_GET['id']);
    //$obvagason = Vaga::getVaga($id);
   
    //VALIDAÇÃO DA VAGA
    if(!$obvagason instanceof Vaga){
        header('location: index.php?status=error');
        exit;
    }

    if  (isset(  
        $_POST['descricao'], $_POST['empresa']   
        )){
         
                     
    $obvagason ->descricao = $_POST['descricao'];     
    $obvagason ->empresa = $_POST['empresa'];
   
        header('location: index.php');
        exit;
    }
    define('TITLE','Ver vaga ' . $obvagason ->descricao  );   
    
    include __DIR__.'/includes/header.php';    
    include __DIR__.'/includes/verVaga.php';    
    include __DIR__.'/includes/footer.php';