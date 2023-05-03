
<html>
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" type="text/css" href="style.css" />
            <meta http-equiv="x-ua-compatible" content="IE=edge" />
            <title>Book form</title>
    </head>

    <body>
        <h1>Création d'un nouveau livre</h1>

        <form id='bookForm' method='post'>

                <div class='input-wrapper'>
                    <label for='title'>Titre</label>
                    <input id='title' class='register' name='title' type='text' value='' minlength="2" required>
                </div>
                <div class='input-wrapper'>
                    <label for='content'>Description</label>
                    <textarea id='content' class='register' name='content' type='textarea' value='' minlengh="2" required></textarea>
                </div>

                <button type="submit" class="register">Enregistrer le nouveau livre</button>
        </form>
    </body>
</html>