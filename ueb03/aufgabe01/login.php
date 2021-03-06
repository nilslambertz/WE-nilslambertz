<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
        <div class="jumbotron text-center">
            <h1>Aufgabenplaner: Login</h1>
        </div>
        <div class="row">
            <div class="col-2">
            </div>
            <div class="col">
                <form>
                    <div class="form-group">
                        <label for="email">E-Mail-Adresse:</label>
                        <input type="text" id="email" placeholder="E-Mail-Adresse eingeben" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="password">Passwort:</label>
                        <input type="password" id="password" placeholder="Passwort" class="form-control" />
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" id="agb" class="form-check-input" />
                        <label for="agb" class="form-check-label">ABG und Datenschutzbedingungen akzeptieren</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Einloggen</button>
                    <p>Noch nicht registriert? <a href="registrierung.html">Registrierung</a></p>
                    <p>Da der Login-Vorgang technisch noch nicht realisiert wurde: <a href="todos.php">Überspringen</a></p>
                </form>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
</body>
</html>