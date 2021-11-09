<main>
        
    <h2 class="mt-3"> Excluir</h2>
    <form method="post">
        <div class="form-group">                   
            <p>Você deseja realmente excluir a vaga <strong><?=$obvagason->descricao?></strong>?</p>
        <div class="form-group class=text-center">            
            <button type="submit" name="excluir" class="btn btn-danger">Excluir</button>
            <a href="index.php">
            <button type="button" class="btn btn-success">Cancelar</button>
        </div>
    </form>

</main>