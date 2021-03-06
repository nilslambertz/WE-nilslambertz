<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Todos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
        <div class="jumbotron text-center">
            <h1>Aufgabenplaner: Todos (Aktuelles Projekt)</h1>
        </div>
        <div class="row">
            <?php
                include("nav.php");
            ?>
            <div class="col">
                <div class="row">
                    <div class="col card border-0">
                        <div class="card-header">ToDo:</div>
                        <ul class="list-group">
                            <li class="list-group-item">HTML Datei erstellen (Max Mustermann)</li>
                            <li class="list-group-item">CSS Datei erstellen (Max Mustermann)</li>
                        </ul>
                    </div>
                    <div class="col card border-0">
                        <div class="card-header">Erledigt:</div>
                        <ul class="list-group">
                            <li class="list-group-item">Pc einschalten (Petra Müller)</li>
                            <li class="list-group-item">Kaffee einschalten (Petra Müller)</li>
                        </ul>
                    </div>
                    <div class="col card border-0">
                        <div class="card-header">Verschoben:</div>
                        <ul class="list-group">
                            <li class="list-group-item">Für die Uni lernen (Max Mustermann)</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>