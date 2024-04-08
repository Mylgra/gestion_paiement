<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enregistrer un Paiement</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <header class="container mt-3">
        <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
        <a href="<?= url_to('Home::index') ?>" class="d-flex align-items-center text-dark text-decoration-none">
            <span class="fs-4">Gestion paiement Etudiant</span>
        </a>

        <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
            <a class="me-3 py-2 text-dark text-decoration-none" href="<?= site_url(); ?>">Accueil</a>
            <a class="me-3 py-2 text-dark text-decoration-none" href="<?= site_url('etudiant'); ?>">Etudaints</a>
            <a class="me-3 py-2 text-dark text-decoration-none" href="<?= site_url('paiement'); ?>">Paiement</a>
        </nav>
        </div>
    </header>
    <div class="container">
        <?= $this->renderSection('content') ?>
    </div>
</body>
</html>
