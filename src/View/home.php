<html>
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" type="text/css" href="style.css" />
            <meta http-equiv="x-ua-compatible" content="IE=edge" />
            <title>Home</title>
    </head>
    
    <body>
        <main>
                <h1>Accueil</h1>

            <div class="displayAction">
                <button id="allUsers">Tous les utilisateurs</button>
            </div>

            <div class="displayAction">
                <button id="allBooks">Tous les livres</button>
            </div>

            <div class="displayAction">
                <form id='oneUser' method='get'>
                    <div class='input-wrapper'>
                        <label for='content'>Id de l'utilisateur</label>
                        <input id='content' class='register' name='oneUser' type='text' value=''>
                    </div>
                    <button type="submit" class="register">Informations de l'utilisateur</button>
                </form>        
            </div>

            <div class="displayAction">

                <form id='oneBook' method='get'>
                    <div class='input-wrapper'>
                        <label for='content'>Id du livre</label>
                        <input id='content' class='register' name='oneBook' type='text' value=''>
                    </div>
                    <button type="submit" class="register">Informations du livre</button>
                </form>       
            </div>

            <div id="display">
                
            </div>
        </main>

    </body>
    <script type="text/javascript" src="script.js"></script>
</html>