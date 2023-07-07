<div class="wrapper p-3 mt-5">
  <div class="row justify-content-center">
    <div class="card col-10">
        <form action="/sac/module/add" method="POST">

          <div class="card-header">
            <h3 class="card-title">Créer un module</h3>
              <?php
                if(isset($error)){
                  echo '<div class="alert alert-danger">'.$error.'</div>';
                }
              ?>
          </div>
          <div class="card-body">

                <div class="form-group">
                    <label for="name">Identifiant module</label>
                    <input type="text" class="form-control" name="module_id" id="numero_module" placeholder="Identifiant module" required>
                </div>
              <div class="form-group">
                <label for="enseignant_id">Enseignant</label>
                <select class="form-control" name="enseignant_id" id="enseignant_id" required>
                  <?php foreach ($enseignants as $enseignant) { ?>
                  <option value="<?= $enseignant['user'] ?>" selected><?= $enseignant['first_name'].' '.$enseignant['last_name'] ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                    <label for="name">Nom du module</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Nom du module" required>
                </div>
                <div class="form-group">
                    <label for="level">Niveau</label>
                    <input type="text" maxlength="4" class="form-control" name="level" id="level" placeholder="Niveau">
                </div>

          </div>
          <div class="card-footer">
            <input type="submit" class="btn btn-success w-100" value="Valider"/>
          </div>


        </form>
    </div>
  </div>
</div>
