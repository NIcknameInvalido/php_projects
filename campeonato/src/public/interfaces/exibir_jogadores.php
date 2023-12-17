<?php require('componentes/cabecalho.php') ?>
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
<?php require('componentes/rodape.php') ?>