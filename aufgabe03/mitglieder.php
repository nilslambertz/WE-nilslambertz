<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mitglieder</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
        <div class="jumbotron text-center">
            <h1>Aufgabenplaner: Mitglieder</h1>
        </div>
        <div class="row">
            <?php
                include("nav.php");
            ?>
            <div class="col pb-2">
                <table class="table">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">E-Mail</th>
                        <th scope="col">In Projekt</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Max Mustermann</td>
                        <td>mustermann@muster.de</td>
                        <td>
                        </td>
                        <td class="text-right">
                            <object height="20" data="icons/edit-box.svg" type="image/svg+xml">Bearbeiten</object>
                            <object height="20" data="icons/trash-bin.svg" type="image/svg+xml">Löschen</object>
                        </td>
                    </tr>
                    <tr>
                        <td>Petra Müller</td>
                        <td>petra@mueller.de</td>
                        <td>
                        </td>
                        <td class="text-right">
                            <object height="20" data="icons/edit-box.svg" type="image/svg+xml">Bearbeiten</object>
                            <object height="20" data="icons/trash-bin.svg" type="image/svg+xml">Löschen</object>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <form>
                    <h3>Bearbeiten/Erstellen:</h3>
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" id="username" placeholder="Username" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="email">E-Mail-Adresse:</label>
                        <input type="text" id="email" placeholder="E-Mail-Adresse eingeben" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="passwort">Passwort:</label>
                        <input type="password" id="passwort" placeholder="Passwort" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="projekt">Zugewiesenes Projekt:</label>
                        <select class="custom-select" id="projekt">
                            <option value="1" selected>Projekt 1</option>
                            <option value="2">Projekt 2</option>
                            <option value="3">Projekt 3</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-primary">Speichern</button>
                    <button type="button" class="btn btn-info">Reset</button>
                </form>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
</body>
</html>