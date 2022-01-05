<div class="container-fluid">
    <div class="jumbotron text-center">
        <h1>Aufgabenplaner: Mitglieder</h1>
    </div>
    <div class="row">
        <?php include('templates/nav.php');
        ?>
        <div class="col pb-2">
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">E-Mail</th>
                    <th scope="col">In Projekt</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach($mitglieder as $mitglied){
                    echo("<tr>");
                    echo("<td>" . (isset($mitglied['name']) ? $mitglied['name'] : '') . "</td>");
                    echo("<td>" . (isset($mitglied['username']) ? $mitglied['username'] : '') . "</td>");
                    echo("<td>" . (isset($mitglied['email']) ? $mitglied['email'] : '') . "</td>");
                    $projekt_namen = [];
                    foreach($projekte_mitglieder as $projekt_mitglied) {
                        if(isset($mitglied['id']) && $projekt_mitglied['mitglied'] == $mitglied['id']) {
                            foreach($projekte as $projekt) {
                                if(isset($projekt['id']) && isset($projekt['name']) && $projekt['id'] == $projekt_mitglied['projekt']) {
                                    array_push($projekt_namen, $projekt['name']);
                                }
                            }
                        }
                    }
                    echo("<td>");
                    for($i = 0; $i < count($projekt_namen); $i++) {
                        echo($projekt_namen[$i]);
                        if($i != count($projekt_namen) - 1) {
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