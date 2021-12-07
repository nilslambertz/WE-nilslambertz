<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Projekte</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
        <div class="jumbotron text-center">
            <h1>Aufgabenplaner: Projekte</h1>
        </div>
        <div class="row">
            <?php
                include("nav.php");
            ?>
            <div class="col">
                <form class="mb-3">
                    <div class="form-group">
                        <h3><label for="projektSelect">Projekt auswählen:</label></h3>
                        <select class="custom-select" id="projektSelect">
                            <option selected>- bitte auswählen -</option>
                            <?php
                                $projekte = array();
                                include("arrays.php");
                                foreach($projekte as $projekt) {
                                    if(isset($projekt['id']) && isset($projekt['name'])) {
                                        echo("<option>");
                                        echo($projekt['name']);
                                        echo("</option>");
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <button type="button" class="btn btn-primary">Auswählen</button>
                    <button type="button" class="btn btn-primary">Bearbeiten</button>
                    <button type="button" class="btn btn-danger">Löschen</button>
                </form>
                <form>
                    <h3>Projekt bearbeiten/erstellen:</h3>
                    <div class="form-group">
                        <label for="projektName">Projektname:</label>
                        <input type="text" id="projektName" placeholder="Projekt" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="projektBeschreibung">Projektbeschreibung:</label>
                        <textarea type="text" id="projektBeschreibung" placeholder="Beschreibung" class="form-control"></textarea>
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