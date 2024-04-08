<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
    <div class="mt-5">
        <div class="d-flex align-items-center">
            <h1 class="mt-5 mb-5 text-primary">Liste de paiements</h1>
        </div>
        <div class="d-flex align-items-center justify-content-between">
                <div class="mb-3">
                    <label for="NumMat" class="form-label">Par Date:</label>
                    <form action="<?= base_url('/filtrage/date') ?>" method="get" class="d-flex">
                        <input type="date" name="date" id="date" class="form-control">
                        <button type="submit" class="btn btn-primary">Filtrer</button>
                    </form>
                </div>
                <div class="mb-3">
                    <label for="NomEtudiant" class="form-label">Par Etudiant:</label>
                    <form action="<?= base_url('/filtrage/etudiant') ?>" method="get" class="d-flex">
                        <select class="form-select" name="NomEtudiant" id="NomEtudiant">
                            <option selected>Liste des etudiants</option>
                            <?php foreach($etudiants as $etudiant): ?>
                                <option value="<?php $etudiant['NomEtudiant'] ?>">
                                    <?= $etudiant['NomEtudiant'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <button type="submit" class="btn btn-primary">Filtrer</button>
                    </form>
                </div>
                <div class="mb-3">
                    <label for="Promotion" class="form-label">Par Promotion:</label>
                    <form action="<?= base_url('/filtrage/promotion') ?>" method="get" class="d-flex">
                        <select class="form-select" name="Promotion" id="Promotion">
                            <option selected>Liste des promotion</option>
                            <?php foreach($etudiants as $etudiant): ?>
                                <option value="<?php $etudiant['NumMat'] ?>">
                                    <?= $etudiant['Promotion'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <button type="submit" class="btn btn-primary">Filtrer</button>
                    </form>
                </div>
            </div>
        
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Matricule</th>
                    <th scope="col">Nom etudiant</th>
                    <th scope="col">Promotion</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($etudiants as $etudiant): ?>
                    <tr>
                        <td><?= $etudiant['NumMat'] ?></td>
                        <td><?= $etudiant['NomEtudiant'] ?></td>
                        <td><?= $etudiant['Promotion'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?= $this->endSection() ?>
