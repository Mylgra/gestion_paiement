<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

    <h1>Editer un Paiement</h1>

    <?php if(session()->getFlashdata('error')): ?>
        <span class="alert alert-danger" role="alert">
            <?= session()->getFlashdata('error') ?>
        </span>
    <?php endif; ?>

    <form action="<?= site_url('/paiement/update/'. $paiement['NumP']) ?>" method="post">
        <?= csrf_field() ?>
        <input type="hidden" name="_method" value="PUT">
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="NumMat" class="form-label">Etudiant:</label>
                    <select class="form-select" name="NumMat" id="NumMat">
                        <option selected>Choisir un étudiant </option>
                        <?php foreach($etudiants as $etudiant): ?>
                            <option value="<?php echo $etudiant['NumMat']; ?>"
                                <?php if ($paiement['NumMat'] == $etudiant['NumMat']) echo 'selected'; ?>>
                                <?php echo $etudiant['NomEtudiant'] . ' ' . $etudiant['Promotion']; ?>
                            </option>

                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="Montant" class="form-label">Montant</label>
                    <input type="number" class="form-control" name="Montant" id="Montant" required value="<?= $paiement['Montant'] ?>">
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="DateP" class="form-label">Date de Paiement:</label>
                    <input type="date" class="form-control" name="DateP" id="DateP" required value="<?= $paiement['DateP'] ?>">
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3">
                    <label for="DateP" class="form-label">Motif:</label>
                    <textarea class="form-control" name="Motif" id="Motif" required ><?= $paiement['Motif'] ?></textarea>
                </div>
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary">Enregistrer Paiement</button>
    </form>

    
<?= $this->endSection() ?>
