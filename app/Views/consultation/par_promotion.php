<!-- app/Views/consultation/par_promotion.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiements par Promotion</title>
</head>
<body>
    <h1>Liste des paiements pour cette promotion :</h1>
    <table>
        <thead>
            <tr>
                <th>Numéro Paiement</th>
                <th>Montant</th>
                <th>Motif</th>
                <th>Date Paiement</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($paiements as $paiement): ?>
                <tr>
                    <td><?= $paiement['NumP'] ?></td>
                    <td><?= $paiement['Montant'] ?></td>
                    <td><?= $paiement['Motif'] ?></td>
                    <td><?= $paiement['DateP'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
