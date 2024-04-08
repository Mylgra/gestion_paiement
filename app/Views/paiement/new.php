<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

    <h1>Enregistrer un Paiement</h1>

    <?= session()->getFlashdata('error') ?>
    <?= validation_list_errors() ?>

    <form action="<?= site_url('/paiement/store') ?>" method="post">
        <?= csrf_field() ?>
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="NumMat" class="form-label">Numéro Matricule:</label>
                    <input type="text" class="form-control" name="NumMat" id="NumMat" required value="<?= set_value('NumMat') ?>">
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="Montant" class="form-label">Montant</label>
                    <input type="number" class="form-control" name="Montant" id="Montant" required value="<?= set_value('Montant') ?>">
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="DateP" class="form-label">Date de Paiement:</label>
                    <input type="date" class="form-control" name="DateP" id="DateP" required value="<?= set_value('DateP') ?>">
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3">
                    <label for="DateP" class="form-label">Motif:</label>
                    <textarea class="form-control" name="DateP" id="DateP" required ><?= set_value('DateP') ?></textarea>
                </div>
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary">Enregistrer Paiement</button>
    </form>

    <div class="mt-4">
        <table class="table">
            <thead class="table-dark">
                <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                </tr>
            </tbody>
        </table>
    </div>
    
<?= $this->endSection() ?>
