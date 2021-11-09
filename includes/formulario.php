
<main>

    <section>
        <a href="index.php">
            <button class="btn btn-success">Voltar</button>
        </a>
    </section>

    <form method="post">

        <h2>Cargo</h2> 
        <div class="form-group">           
            <input type="text" class="form-control" name="cargo_descricao" value="<?=$obCargo -> descricao?>" placeholder="descricao">    
               <br>
            <input  type="number" class="form-control" name="cargo_id_setor" value="<?=$obCargo-> id_setor?>" placeholder="id setor">                                                      
        </div>

        <h2>Empresa</h2>
        <div class="form-group">           
              <input type="text" class="form-control" name="empresa_nome" value="<?=$obEmpresa->nome_empresa?>" placeholder="nome empresa">              
        </div>

        <div class="form-group">
            <h2>Setor </h2>  
            <input type="text" class="form-control" name="setor_nome" value="<?=$obSetor    -> nome_setor?>" placeholder="nome">  <br>
            <input type="number" class="form-control" name="setor_id_empresa" value="<?=$obSetor    -> id_empresa?>" placeholder="empresa id">                
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success">Enviar</button>
        </div>

    </form>
</main>