<form class="shadow-lg col-6 d-flex align-items-center p-5 " action="../controles/cadastrar_times.php" method="post">
     <div class="container mt-4">
         <h1>Cadastro de Time</h1>
         <div class="col-lg-12">
             <div class="form-group row">
                 <div class="col-4">
                     <label for="nome">Nome</label>
                     <input type="text" class="form-control <?= isset($errors['nome']) ? 'is-invalid' : '' ?>" id="nome" name="nome" placeholder="Nome">
                     <?php if (isset($errors['nome'])) : ?>
                         <div class="invalid-feedback">
                             <?= $errors['nome'] ?>
                         </div>
                     <?php endif ?>
                 </div>
                 <div class="col-4">
                     <label for="sigla">Sigla</label>
                     <input type="text" class="form-control <?= isset($errors['sigla']) ? 'is-invalid' : '' ?>" id="sigla" name="sigla" placeholder="exemplo: FLA">
                     <?php if (isset($errors['sigla'])) : ?>
                         <div class="invalid-feedback">
                             <?= $errors['sigla'] ?>
                         </div>
                     <?php endif ?>
                 </div>
                 <div class="col-4">
                     <label for="ano_fundacao">Criação</label>
                     <input type="number" class="form-control <?= $errors['ano_fundacao'] ? 'is-invalid' : '' ?>" id="ano_fundacao" name="ano_fundacao" placeholder="ano de fundação">
                     <?php if (isset($errors['ano_fundacao'])) : ?>
                         <div class="invalid-feedback">
                             <?= $errors['ano_fundacao'] ?>
                         </div>
                     <?php endif ?>
                 </div>

             </div>
             <button type="submit" class="btn btn-primary mt-3">Cadastrar</button>
         </div>
     </div>
 </form>