<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Aufgaben</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
        <div class="jumbotron text-center">
            <h1>Aufgabenplaner: Aufgaben</h1>
        </div>
        <div class="row">
            <?php
                include("nav.php");
            ?>
            <div class="col pb-2">
                <table class="table">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">Aufgabenbezeichnung</th>
                        <th scope="col">Beschreibung der Aufgabe</th>
                        <th scope="col">Reiter</th>
                        <th scope="col">Zuständig</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $aufgaben = array();
                    $reiter = array();
                    $mitglieder = array();
                    include("arrays.php");
                    foreach($aufgaben as $aufgabe){
                        echo("<tr>");
                        echo("<td>" . (isset($aufgabe['titel']) ? $aufgabe['titel'] : '') . "</td>");
                        echo("<td>" . (isset($aufgabe['beschreibung']) ? $aufgabe['beschreibung'] : '') . "</td>");
                        if(isset($aufgabe['reiter'])) {
                            $gefundenerReiter = null;
                            foreach($reiter as $r) {
                                if(isset($r['id']) && $r['id'] == $aufgabe['reiter']) {
                                    $gefundenerReiter = $r;
                                }
                            }
                            echo("<td>" . (isset($gefundenerReiter['name']) ? $gefundenerReiter['name'] : '') . "</td>");
                        } else {
                            echo("<td></td>");
                        }
                        if(isset($aufgabe['zustaendig'])) {
                            $gefundenesMitglied = null;
                            foreach($mitglieder as $mitglied) {
                                if(isset($mitglied['id']) && $mitglied['id'] == $aufgabe['zustaendig']) {
                                    $gefundenesMitglied = $mitglied;
                                }
                            }
                            echo("<td>" . (isset($gefundenesMitglied['name']) ? $gefundenesMitglied['name'] : '') . "</td>");
                        } else {
                            echo("<td></td>");
                        }
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
                        <label for="aufgabenbezeichnung">Aufgabenbezeichnung:</label>
                        <input type="text" id="aufgabenbezeichnung" placeholder="Aufgabe" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="aufgabenbeschreibung">Beschreibung:</label>
                        <textarea type="text" id="aufgabenbeschreibung" placeholder="Beschreibung" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="erstellungsdatum">Erstellungsdatum:</label>
                        <input type="text" id="erstellungsdatum" placeholder="01.01.19" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="faelligBis">Fällig bis:</label>
                        <input type="text" id="faelligBis" placeholder="01.01.19" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="reiterSelect">Zugehöriger Reiter:</label>
                        <select class="custom-select" id="reiterSelect">
                            <option value="todo" selected>ToDo</option>
                            <option value="erledigt">Erledigt</option>
                            <option value="verschoben">Verschoben</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="zustaendig">Zuständig:</label>
                        <select class="custom-select" id="zustaendig">
                            <option value="max" selected>Max Mustermann</option>
                            <option value="petra">Petra Müller</option>
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