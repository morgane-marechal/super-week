
<html>
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" type="text/css" href="style.css" />
            <meta http-equiv="x-ua-compatible" content="IE=edge" />
            <title>Register</title>
    </head>

    <body>
        <h1>Page d'enregistrement</h1>

        <form id='registerForm' method='post'>

                <div class='input-wrapper'>
                    <label for='first_name'>Prénom</label>
                    <input id='first_name' class='register' name='first_name' type='text' value='' minlength="2" required>
                </div>
                <div class='input-wrapper'>
                    <label for='last_name'>Nom</label>
                    <input id='last_name' class='register' name='last_name' type='text' value='' minlengh="2" required>
                </div>

                <div class='input-wrapper'>
                    <label for='email'>Email</label>
                    <input id='email' class='register' name='email' type='email' value=''  pattern="^[a-zA-Z0-9]+(?:\.[a-zA-Z0-9]+)*@[a-zA-Z0-9]+(?:\.[a-zA-Z0-9]+)*$" required>
                </div>

                <div class='input-wrapper'>
                    <label for='password'>Mot de passe</label>
                    <input id='password' class='register' name='password' type='password' value='' minlengh="2" required>
                </div>

                <div class='input-wrapper'>
                    <label for='checkPassword'>Vérifier le mot de passe</label>
                    <input id='checkPassword' class='register' name='checkPassword' type='password' value='' minlengh="2" required>
                </div>
                <button type="submit" class="register">Enregistrer</button>
        </form>
    </body>
</html>