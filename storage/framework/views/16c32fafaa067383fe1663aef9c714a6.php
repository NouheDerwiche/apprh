<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Nouveau Compte</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f7f7f7;
        }

        h2 {
            color: #333333;
        }

        p {
            margin-bottom: 10px;
        }

        ul {
            padding-left: 20px;
        }

        li {
            margin-bottom: 5px;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 12px;
            color: #999999;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Bienvenue, <?php echo e($user->name); ?>!</h2>

        <p>Votre compte au RH.TUNISIE  a été créé avec succès. Voici vos informations de connexion:</p>
        <ul>
            <li>Nom d'utilisateur: <?php echo e($user->email); ?></li>
            <li>Mot de passe: <?php echo e($password); ?></li>
        </ul>
        <p>Veuillez vous connecter et changer votre mot de passe dès que possible.</p>
        <p>Merci,</p>
        <p>L'équipe de votre application</p>
    </div>
    <div class="footer">
        <p>Ceci est un e-mail généré automatiquement, veuillez ne pas y répondre.</p>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\pfe\apprh\resources\views/emails/nouveau-compte.blade.php ENDPATH**/ ?>