<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

    <h1 class="text-primary mt-3 pb-5">Editer un Etudiant</h1>

    <form action="<?= site_url('/etudiant/update/'. $etudiant['NumMat']) ?>" method="post">
        <?= csrf_field() ?>
        <input type="hidden" name="_method" value="PUT">

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
                        value="<?= $etudiant['NomEtudiant'] ?>"
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
                        value="<?= $etudiant['Promotion'] ?>"
                    >
                </div>
            </div>

        </div>
        
        <button type="submit" class="btn btn-primary">Enregistrer Etudiant</button>
    </form>
    
<?= $this->endSection() ?>
