<?php

    require __DIR__. '/vendor/autoload.php';     

    use \App\Entity\Vaga;

 
    //CONSULTA A VAGA
    $obvagason = Vaga::getVaga($_GET['id']);
    
 
    if(isset($_POST['excluir'])){
        
 
        $obvagason ->excluir();

        header('location: index.php?status=success');
        exit;
    }

    
    
    include __DIR__.'/includes/header.php';    
    include __DIR__.'/includes/confirmar-exclusao.php';    

    
    include __DIR__.'/includes/footer.php';
    