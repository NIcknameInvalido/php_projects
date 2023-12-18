<?php require('componentes/cabecalho.php') ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Sigla</th>
                <th scope="col">Ano de Fundação</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($times as $arr => $time): ?>
                <tr>
                    <th scope="row"><?= $time->id ?></th>
                    <td><?= $time->nome ?></td>
                    <td><?= $time->sigla ?></td>
                    <td><?= $time->ano_fundacao ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php require('componentes/rodape.php') ?>