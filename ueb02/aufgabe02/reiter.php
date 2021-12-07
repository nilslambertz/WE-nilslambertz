<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reiter</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
        <div class="jumbotron text-center">
            <h1>Aufgabenplaner: Reiter</h1>
        </div>
        <div class="row">
            <?php
                include("nav.php");
            ?>
            <div class="col">
                <table class="table">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Beschreibung</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $reiter = array();
                    include("arrays.php");
                    foreach($reiter as $r){
                    echo("<tr>");
                        echo("<td>" . (isset($r['name']) ? $r['name'] : '') . "</td>");
                        echo("<td>" . (isset($r['beschreibung']) ? $r['beschreibung'] : '') . "</td>");
                        echo('<td class="text-right">'
                            . '<object height="20" data="icons/edit-box.svg" type="image/svg+xml">Bearbeiten</object>'
                            . '<object height="20" data="icons/trash-bin.svg" type="image/svg+xml">Löschen</object>'
                            . '</td>');
                        echo("</tr>");
                    }
                    ?>
                    </tbody>
                </table>
                <form>
                    <h3>Bearbeiten/Erstellen:</h3>
                    <div class="form-group">
                        <label for="reiterBezeichnung">Bezeichnung des Reiters:</label>
                        <input type="text" id="reiterBezeichnung" placeholder="Reiter" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="reiterBeschreibung">Beschreibung:</label>
                        <textarea type="text" id="reiterBeschreibung" placeholder="Beschreibung" class="form-control"></textarea>
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