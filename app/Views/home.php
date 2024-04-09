<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
    <div class="mt-5">
        <div class="d-flex align-items-center">
            <h1 class="mt-5 mb-5 text-primary">Liste de paiements</h1>
        </div>
        <div class="container mb-4 mt-4">
                <form action="<?= site_url('/rechercher') ?>" method="post" class="d-flex">
                    <?= csrf_field() ?>
                    <input 
                        type="text" 
                        name="query" 
                        class="form-control" 
                        id="query"
                        placeholder="Rechercher par Nom, Date, Matricule"
                    >
                    <button type="submit" class="btn btn-primary">Recherche</button>
                </form>
            </div>
        <div class="d-flex align-items-center justify-content-between">
            
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
                <?php foreach ($paiements as $key => $paiement): ?>
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
