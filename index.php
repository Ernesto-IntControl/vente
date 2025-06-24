<?php
session_start(); // Démarre la session pour stocker les messages

// Définition des montres
$montres = [
    [
        'nom' => 'GENEVA',
        'description' => 'FABRIQUE PAR LA MAISON GENEVA EN USA.',
        'image' => 'images//hrm.jpg',
        'prix' => '50 $',
    ],
    [
        'nom' => 'HUTBLOT',
        'description' => 'FABRIQUE PAR MAISON HUTBLOT EN GERMANIE.',
        'image' => 'images//hrm1.jpg',
        'prix' => '60 $',
    ],
    [
        'nom' => 'BINBOND',
        'description' => 'FABRIQUE PAR LA MAISON BINBOND EN CHINE',
        'image' => 'images//hrm2.jpg',
        'prix' => '50 $',
    ],
    [
        'nom' => 'LV ROLEX',
        'description' => 'FABRIQUE PAR MAISON LOUIS VUITTON EN BRAZIL.',
        'image' => 'images//hrm5.jpg',
        'prix' => '40 $',
    ],
    [
        'nom' => 'HRM',
        'description' => 'FABRIQUE PAR LA MAISON HERMAN AU CONGO.',
        'image' => 'images//hrm4.jpg',
        'prix' => '90 $',
    ],
    // Ajoutez ici d'autres montres avec leurs détails
];

// Gestion des messages de confirmation
$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['form_type']) && $_POST['form_type'] == 'purchase') {
        // Récupérer les données du formulaire d'achat
        $nom_client = $_POST['nom'];
        $postnom_client = $_POST['postnom'];
        $numero_client = $_POST['numero'];
        $pays_client = $_POST['pays'];
        $ville_client = $_POST['ville'];
        $province_client = $_POST['province'];
        $montre_achetee = $_POST['montre'];
        $modele_paiement = $_POST['modele_paiement'];
        
        $message = "Félicitations, $nom_client! Votre commande pour la $montre_achetee a été reçue. La livraison à votre domicile est pour bientôt.";
    }
}

// Page d'accueil
if (!isset($_GET['page']) || $_GET['page'] == 'home'): ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIENVENUE A DJAHAJ </title>
    <style>
        body {
            font-family: 'Arial ', sans-serif;
            background-color: #e9ecef;
            margin: 0;
            padding: 0;
        }
        header {
            background: linear-gradient(135deg, #28a745, #218838);
            color: #fff;
            padding: 20px;
            text-align: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }
        h1 {
            margin: 0;
            font-size: 2.5em;
        }
        .welcome {
            text-align: center;
            padding: 50px;
            background: url('https://example.com/welcome-background.jpg') no-repeat center center;
            background-size: cover;
            color: black;
        }
        .button {
            background: #28a745;
            color: #fff;
            padding: 15px 30px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 1.2em;
            transition: background 0.3s;
        }
        .button:hover {
            background: #218838;
        }
        .about, .contact {
            margin: 20px;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        footer {
            text-align: center;
            padding: 20px;
            background: #333;
            color: #fff;
        }
    </style>
</head>
<body>

<header>
    <h1>DJAHAJ VENTE EN LIGNE</h1>
</header>

<div class="welcome">
    <h2>BIENVENUE SUR NOTRE PLATE FORME DJAHAJ!</h2>
    <p>Découvrez notre sélection de montres excellent.</p>
    <a href="?page=montres" class="button">Découvrir les Montres</a>
</div>

<div class="about">
    <h2>À Propos de Djahaj</h2>
    <p>Djahaj est une entreprise spécialisée dans la vente de montres raffinées, située à Kolwezi, Congo. Nous nous engageons à offrir des produits de qualité qui évoquent l'élégance et le luxe.</p>
</div>

<div class="contact">
    <h2>Contactez-Nous</h2>
    <p>Pour toute question, veuillez nous contacter à l'adresse suivante : <a href="mailto:contact@djahajujkol.com">contact@djahaj.com</a></p>
</div>

<footer>
    <p>&copy; 2025 Djahaj. Tous droits réservés.</p>
</footer>

</body>
</html>

<?php
// Fin de la page d'accueil
endif;

// Page des montres
if (isset($_GET['page']) && $_GET['page'] == 'montres'): ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Djahaj - Montres</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        header {
            background: linear-gradient(135deg, #28a745, #218838);
            color: #fff;
            padding: 20px;
            text-align: center;
        }
        h1 {
            margin: 0;
            font-size: 2.5em;
        }
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 20px auto;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .product {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            margin: 20px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            flex: 1 1 calc(30% - 40px);
            transition: transform 0.2s;
        }
        .product:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }
        .product img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
            margin-bottom: 15px;
        }
        .button {
            background: #28a745;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }
        .form-container {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            margin: 20px 0;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        footer {
            text-align: center;
            padding: 20px;
            background: #333;
            color: #fff;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        input[type="text"], input[type="email"], input[type="number"], select {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            width: 100%;
        }
    </style>
</head>
<body>

<header>
    <h1> VENTE DES MONTRES</h1>
</header>

<div class="container">
    <?php foreach ($montres as $montre): ?>
        <div class="product">
            <img src="<?php echo $montre['image']; ?>" alt="<?php echo $montre['nom']; ?>">
            <h2><?php echo $montre['nom']; ?></h2>
            <p><?php echo $montre['description']; ?></p>
            <p>Prix: <?php echo $montre['prix']; ?></p>
            <button class="button" onclick="document.getElementById('<?php echo $montre['nom']; ?>').style.display='block'">Acheter</button>
            <div id="<?php echo $montre['nom']; ?>" class="form-container" style="display:none;">
                <form method="POST" action="">
                    <input type="hidden" name="form_type" value="purchase">
                    <input type="hidden" name="montre" value="<?php echo $montre['nom']; ?>">
                    <label for="nom">Nom :</label>
                    <input type="text" name="nom" required>
                    <label for="postnom">Postnom :</label>
                    <input type="text" name="postnom" required>
                    <label for="numero">Numéro :</label>
                    <input type="text" name="numero" required>
                    <label for="pays">Pays :</label>
                    <input type="text" name="pays" required>
                    <label for="ville">Ville :</label>
                    <input type="text" name="ville" required>
                    <label for="province">Province :</label>
                    <input type="text" name="province" required>
                    <label for="modele_paiement">Modèle de paiement :</label>
                    <select name="modele_paiement" required>
                        <option value="Carte de crédit">Carte de crédit</option>
                        <option value="PayPal">PayPal</option>
                        <option value="Virement bancaire">Virement bancaire</option>
                    </select>
                    <button type="submit" class="button">Confirmer l'Achat</button>
                </form>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php if ($message): ?>
    <div class="form-container">
        <p><?php echo $message; ?></p>
    </div>
<?php endif; ?>

<footer>
    <p>&copy; 2025 Djahaj. Tous droits réservés.</p>
</footer>

</body>
</html>

<?php
// Fin de la page des montres
endif;
?>

