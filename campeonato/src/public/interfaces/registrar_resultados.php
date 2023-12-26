<?php require('componentes/cabecalho.php') ?>
<div class="container">
    <h2 class="mb-4">Registro de Resultado</h2>
    
    <form>
        <div class="form-group">
            <label for="timeCasa">Time da Casa</label>
            <input type="text" class="form-control" id="timeCasa" placeholder="Nome do time da casa">
        </div>
        
        <div class="form-group row">
            <div class="col">
                <label for="golsCasa">Gols do Time da Casa</label>
                <input type="number" class="form-control" id="golsCasa" placeholder="Número de gols">
            </div>
            <div class="col">
                <label for="golsVisitante">Gols do Time Visitante</label>
                <input type="number" class="form-control" id="golsVisitante" placeholder="Número de gols">
            </div>
        </div>
        
        <div class="form-group">
            <label for="timeVisitante">Time Visitante</label>
            <input type="text" class="form-control" id="timeVisitante" placeholder="Nome do time visitante">
        </div>
        
        <button type="submit" class="btn btn-primary btn-block">Registrar Resultado</button>
    </form>
</div>
<?php require('componentes/rodape.php') ?>