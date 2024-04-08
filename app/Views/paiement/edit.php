<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

    <h1>Editer un Paiement</h1>

    <?= session()->getFlashdata('error') ?>
    <?= validation_list_errors() ?>


    <form action="/paiement/enregistrer" method="post">
        <?= csrf_field() ?>
        <label for="NumMat">Numéro Matricule:</label>
        <input type="text" name="NumMat" id="NumMat" required value="<?= set_value('NumMat') ?>"><br>
        
        <label for="Montant">Montant:</label>
        <input type="number" name="Montant" id="Montant" required value="<?= set_value('Montant') ?>"><br>
        
        <label for="Motif">Motif:</label>
        <input type="text" name="Motif" id="Motif" required value="<?= set_value('Motif') ?>"><br>
        
        <label for="DateP">Date de Paiement:</label>
        <input type="date" name="DateP" id="DateP" required value="<?= set_value('DateP') ?>"><br>
        
        <button type="submit">Enregistrer Paiement</button>
    </form>
    
<?= $this->endSection() ?>
