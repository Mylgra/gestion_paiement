<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

    <h1 class="text-primary mt-3 pb-5">Enregistrer un Etudiant</h1>

    <?php if(session()->getFlashdata('error')): ?>
        <span class="alert alert-danger" role="alert">
            <?= session()->getFlashdata('error') ?>
        </span>
    <?php endif; ?>

    <form action="<?= site_url('/etudiant/store') ?>" method="post">
        <?= csrf_field() ?>

        <div class="row">

            <div class="col-md-6">
                <div class="mb-3">
                    <label for="NomEtudiant" class="form-label">Nom etudiant</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        name="NomEtudiant" 
                        id="NomEtudiant" 
                        required 
                        value="<?= set_value('NomEtudiant') ?>"
                    >
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label for="Promotion" class="form-label">Promotion</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        name="Promotion" 
                        id="Promotion" 
                        required 
                        value="<?= set_value('Promotion') ?>"
                    >
                </div>
            </div>

        </div>
        
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>


    <div class="mt-5">
    <h1 class="mt-5 mb-5 text-primary">Liste des etudiants</h1>
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Matricule</th>
                    <th scope="col">Nom etudiant</th>
                    <th scope="col">Promotion</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($etudiants as $etudiant): ?>
                    <tr>
                        <td><?= $etudiant['NumMat'] ?></td>
                        <td><?= $etudiant['NomEtudiant'] ?></td>
                        <td><?= $etudiant['Promotion'] ?></td>
                        <td class="d-flex gap-3">
                            <a href="<?= site_url('/etudiant/voir/'. $etudiant['NumMat']) ?>" class="btn btn-secondary ml-2 mr-2">Voir</a>
                            <a href="<?= site_url('/etudiant/edition/'. $etudiant['NumMat']) ?>" class="btn btn-primary ml-2 mr-2">Editer</a>
                            <form action="<?= base_url('/etudiant/delete/'.$etudiant['NumMat']) ?>" method="post" confirm="Voulez vous supprimer cette etudiant">
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
