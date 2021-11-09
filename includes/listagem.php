<?php 
use \App\Entity\Vaga;
    $mensagem = '';

    if(isset($_GET['status'])){
        switch($_GET['status']){
            case 'success':
                $mensagem = '<div class= "alert alert-success"> Ação executada com sucesso!</div';
                break;

            case 'error':
                $mensagem = '<div class= "alert alert-danger"> Ação não executada!</div';
                    break;
            
        }
    } 
    
 
    $resultados = '';
    foreach($vagas as $vaga){
        $resultados .=  '<tr>
                                
                             
                            <td>'.$vaga->id.'</td>
                            <td>'.$vaga->descricao.'</td>
                            <td>'.$vaga->empresa.'</td>
                            
                            <td>
                                <a href="verVaga.php?id='.$vaga->id.'">
                                    <button type="button" class="btn btn-primary">Ver Vaga</button>
                                <a/>
                                <a href="editar.php?id='.$vaga->id.'">
                                    <button type="button" class="btn btn-primary">Editar</button>
                                <a/>
                                <a href="excluir.php?id='.$vaga->id.'">
                                    <button type="button" class="btn btn-danger">Excluir</button>
                                <a/>                                
                            </td>
                        </tr>';

    }

    $resultados = strlen($resultados) ? $resultados : '<tr>    
                                                        <td colspan = "6" class=text-center>
                                                            Nenhuma vaga encontrada!
                                                        </td>
                                                        </tr>';

?>
<main>
 <?=$mensagem?>
    <section>
        <a href="cadastrar.php">
            <button class="btn btn-success">Nova Vaga</button>
        </a>
    </section>

    <section>
        <table class="table bg-light mt-3">
            <thead>
                <tr>
                    <th>ID Vaga</th>
                    <th>Descricao</th>
                    <th>Empresa</th>
                    <th>Ação</th>
                </tr>
            </thead>            <tbody>
                <?=$resultados?>
            </tbody>

        </table>
    </section>


</main>