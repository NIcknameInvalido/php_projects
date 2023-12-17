 <?php include('cabecalho.php');?>
 <form class="content d-flex align-items-center px-5" action="../controles/cadastrar_times.php" method="post">
    <div class="container mt-4">
        <h1>Cadastro de Time</h1>
        <!-- Formulário com 5 Inputs de Texto -->
        <div class="col-lg-12"> 
                <div class="form-group row">
                    <div class="col">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
                    </div>
                    <div class="col">
                        <label for="sigla">Sigla</label>
                        <input type="text" class="form-control" id="sigla" name="sigla" placeholder="exemplo: FLA">
                    </div>
                    <div class="col-2">
                        <label for="ano_fundacao">Criação</label>
                        <input type="number" class="form-control" id="ano_fundacao" name = "ano_fundacao" placeholder="ano de fundação">
                    </div> 
                </div>
                <button type="submit" class="btn btn-primary mt-3">Cadastrar</button>
            
        </div> 
    </div>
</form>
<?php include('rodape.php');?>