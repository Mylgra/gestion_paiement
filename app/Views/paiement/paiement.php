<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

    <h1 class="text-primary mt-3 pb-5">Nouveau Paiement</h1>

    <?php if(session()->getFlashdata('error')): ?>
        <span class="alert alert-danger" role="alert">
            <?= session()->getFlashdata('error') ?>
        </span>
    <?php endif; ?>

    <form action="<?= site_url('/paiement/store') ?>" method="post">
        <?= csrf_field() ?>
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="NumMat" class="form-label">Etudiant:</label>
                    <select class="form-select" name="NumMat" id="NumMat">
                        <option selected>Choisir un étudiant </option>
                        <?php foreach($etudiants as $etudiant): ?>
                            <option value="<?php $etudiant['NumMat'] ?>">
                                <?php $etudiant['NomEtudiant'] . ' ' . $etudiant['Promotion'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
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
        <h1 class="mt-5 mb-5 text-primary">Liste des paiement</h1>
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Numero</th>
                    <th scope="col">Etudiant</th>
                    <th scope="col">Montant</th>
                    <th scope="col">DatePaiement</th>
                    <th scope="col">Motif</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $key => $paiement): ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= $paiement['NomEtudiant'] ?></td>
                        <td><?= $paiement['Montant'] ?> CDF</td>
                        <td><?= $paiement['DateP'] ?></td>
                        <td><?= $paiement['Motif'] ?></td>
                        <td class="d-flex gap-3">
                            <a href="<?= site_url('/paiement/edition/'. $paiement['NumP'] ) ?>" class="btn btn-primary ml-2 mr-2">Editer</a>
                            <form action="<?= base_url('/paiement/delete/'.$paiement['NumP'] ) ?>" method="post" confirm="Voulez vous supprimer cette etudiant">
                            <?= csrf_field() ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger ml-2">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
<?= $this->endSection() ?>
