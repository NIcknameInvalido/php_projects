<?php require('componentes/cabecalho.php') ?>
    <div class="row col-12 table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome Jogador</th>
                    <th scope="col">Nome do Time</th>
                    <th scope="col">Data de Início</th>
                    <th scope="col">Data de Fim</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($jogadores as $arr => $jogador): ?>
                    <tr>
                        <th scope="row"><?= $jogador['id']?></th>
                        <td><?= $jogador['nome'] ?></td>
                        <td><?= $jogador['time'] ?></td>
                        <td><?= $jogador['dt_inicio']?></td>
                        <td><?= isset($jogador['dt_fim'])?$jogador['dt_fim']:"Vigente"?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="col-12 mt-4">
            <button type="button" class="btn btn-dark"><a style="text-decoration: none;" class="text-light" href="../controles/cadastrar_jogadores.php" target="_blank">Cadastrar Jogador</a></button>
        </div>
    </div>
    
<?php require('componentes/rodape.php') ?>