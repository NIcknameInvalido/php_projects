<?php require('componentes/cabecalho.php') ?>
<div class="row d-flex justify-content-center">
    <div class="col-4">
        <form class="shadow-lg col-12 d-flex align-items-center p-5" action="../controles/cadastrar_campeonato.php" method="post">
            <div class="container mt-4">
                <h1 class="">Cadastro de Campeonato</h1>
                <div class="row">
                    <div class="col-12">
                        <label for="nome">Nome do campeonato</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" value="<?= isset($_POST['nome']) ? $_POST['nome'] : "" ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <label for="ano_edicao">Ano da edição</label>
                        <input type="number" class="form-control" id="ano_edicao" name="ano_edicao" placeholder="ano_edicao" value="<?= isset($_POST['ano_edicao']) ? $_POST['ano_edicao'] : "" ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <label for="dt_inicio">Data de início</label>
                        <input type="date" class="form-control" id="dt_inicio" name="dt_inicio" placeholder="DD/MM/AAAA" value="<?= isset($_POST['dt_inicio']) ? $_POST['dt_inicio'] : "" ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <label for="dt_fim">Data de fim</label>
                        <input type="date" class="form-control" id="dt_fim" name="dt_fim" placeholder="DD/MM/AAAA" value="<?= isset($_POST['dt_fim']) ? $_POST['dt_fim'] : "" ?>">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3 mb-5">Cadastrar</button>
            </div>
        </form>
    </div>
    <div class="col-6 me-4">
        <table class="table text-center">
            <thead>
                <tr>
                    <th class="col-3" scope="col">Cameponato</th>
                    <th class="col" scope="col">Ano da Edição</th>
                    <th class="col" scope="col">Data de Início</th>
                    <th class="col" scope="col">Data de Fim</th>
                    <th class="col" scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($edicoes_campeonato as $edi_camp) : ?>
                    <tr>
                        <form action="cadastrar_campeonato.php" method="get">
                            <input type="hidden" name="ed_id_campeonato" value="<?=$edi_camp['id_campeonato']?>">
                            <td class="col-3">
                                <fieldset disabled><input type="text" class="form-control" id="nome" name="nome" placeholder="nome" value="<?=$edi_camp['nome_campeonato']?>"></fieldset>
                            </td>
                            <td class="col"><input type="number" class="form-control" id="ano_edicao" name="ed_ano_edicao" placeholder="AAAA" value="<?=$edi_camp['ano_edicao']?>"></td>
                            <td class="col"><input type="date" class="form-control" id="dt_inicio" name="ed_dt_inicio" placeholder="DD/MM/AAAA" value="<?= $edi_camp['dt_inicio']?>"></td>
                            <td class="col"><input type="date" class="form-control" id="dt_fim" name="ed_dt_fim" placeholder="DD/MM/AAAA" value="<?=$edi_camp['dt_fim']?>"></td>
                            <td class="col">
                                <button type="submit" class="btn btn-primary">Nova</button>
                            </td>
                        </form>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<?php include('componentes/rodape.php') ?>