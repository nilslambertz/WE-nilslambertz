<div class="container-fluid">
    <div class="jumbotron text-center">
        <h1>Aufgabenplaner: Aufgaben</h1>
    </div>
    <div class="row">
        <?php include('templates/nav.php');
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
                foreach($aufgaben as $aufgabe){
                    echo("<tr>");
                    echo("<td>" . (isset($aufgabe['name']) ? $aufgabe['name'] : '') . "</td>");
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
                    $zustaendig = [];
                    foreach($aufgaben_mitglieder as $aufgabe_mitglied) {
                        if(isset($aufgabe['id']) && isset($aufgabe_mitglied['aufgabe']) && $aufgabe_mitglied['aufgabe'] == $aufgabe['id']) {
                            foreach($mitglieder as $mitglied) {
                                if(isset($mitglied['id']) && isset($mitglied['name']) && $mitglied['id'] == $aufgabe_mitglied['mitglied']) {
                                    array_push($zustaendig, $mitglied['name']);
                                }
                            }
                        }
                    }
                    echo("<td>");
                    for($i = 0; $i < count($zustaendig); $i++) {
                        echo($zustaendig[$i]);
                        if($i != count($zustaendig) - 1) {
                            echo ", ";
                        }
                    }
                    echo("</td>");
                    echo('<td class="text-right">'
                        . '<object height="20" data="assets/edit-box.svg" type="image/svg+xml">Bearbeiten</object>'
                        . '<object height="20" data="assets/trash-bin.svg" type="image/svg+xml">Löschen</object>'
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