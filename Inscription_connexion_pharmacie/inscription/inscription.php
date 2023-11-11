<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="./inscription_connexion.css">
    <title>Inscription et Connexion</title>
</head>
<body>
    <h1 style="color: marron;">Boulangerie artisanal parisienne</h1>
    <div class="container" id="container">
        
        <div class="form-container sign-up">
            <form action="inscription_traitement.php" method="post">
                <h1 id="txth1">Creation de mon compte</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fab fa-github"></i></a>
                    <a href="#" class="icon"><i class="fab fa-linkedin-in"></i></a>
                </div>
              
                <span>utilise votre adresse email pour l'inscription</span>
                <input type="text" name="nom" id="nom" placeholder="Nom utilisateurs" required>
                <input type="text" name="lieu" placeholder="Lieu de votre pharmacie" required>
                <input type="email" name="email" id="email" placeholder="utilisateurs@gmail.com" required>
                <input type="password" name="password" placeholder="******" required>
                <input type="password" name="confi_psr" placeholder="******" required>
                <button type="submit" name="register">Inscription</button>
            </form>
        </div>

        <div class="form-container sign-in">
            <form action="login_traitement.php" method="post">
                <h1>Se connecter</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fab fa-github"></i></a>
                    <a href="#" class="icon"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>utilise votre email et mots de passe</span>
                <input type="email" name="email" id="email" placeholder="email">
                <input type="password" name="password" id="password" placeholder="*******">
                <a href="recuperation_mdp.php">Mots de passe oubliee ?</a>
                <button type="submit" name="login">Connect</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcom's Back</h1>
                    <p>Entrer votre details personnel </p>
                    <button class="hidden" id="login">Connexion</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Salut mes amies !</h1>
                    <p>Inscription pour votre details personnel</p>
                    <button class="hidden" id="inscription">Inscription</button>
                </div>
            </div>
        </div>
    </div>



    <script src="script.js"></script>
</body>
</html>