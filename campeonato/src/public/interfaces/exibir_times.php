<div class="row col-12 table-responsive">
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
            <?php foreach ($times as $arr => $time) : ?>
                <tr>
                    <th scope="row"><?= $time->id ?></th>
                    <td><?= $time->nome ?></td>
                    <td><?= $time->sigla ?></td>
                    <td><?= $time->ano_fundacao ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="col-12 mt-4">
            <button type="button" class="btn btn-dark"><a style="text-decoration: none;" class="text-light" href="../controles/cadastrar_times.php" target="_blank">Cadastrar Times</a></button>
    </div>
</div>
