<div class="container-fluid">
    <div class="jumbotron text-center">
        <h1>Aufgabenplaner: Mitglieder</h1>
    </div>
    <?php include('templates/nav.php');
    ?>
    <div class="row">
        <div class="col-2"></div>
        <div class="col pb-2">
            <?php
            $disabled = $delete;
            $action = "";
            if ($showForm == true):
                if ($id) {
                    if ($delete) {
                        $action = "delete";
                    } else {
                        $action = "edit";
                    }
                } else {
                    $action = "create";
                }
                echo('<a href="' . base_url('mitglieder') . '"><button class="btn btn-info mb-3">Zurück</button></a>');
                echo form_open(base_url('mitglieder/submit/'), array('role' => 'form'));
                ?>
                <?php if ($id != null): ?>
                <?php if ($delete): ?>
                    <h3>Löschen:</h3>
                <?php else: ?>
                    <h3>Bearbeiten:</h3>
                <?php endif; ?>
            <?php else: ?>
                <h3>Erstellen:</h3>
            <?php endif; ?>

                <?php
                $formElements = [];
                $formElements["name"] = "Name";
                $formElements["username"] = "Username";
                $formElements["email"] = "E-Mail-Adresse";
                if (!$delete && (!isset($id) || (session()->get('userId') != null) && $id == session()->get('userId'))) {
                    $formElements["password"] = "Passwort";
                }

                foreach ($formElements as $key => $name) {
                    echo('<div class="form-group">');
                    echo('<label for="' . $key . '">' . $name . ':</label>');
                    echo('<input 
                            type="' . ($key == "password" ? $key : 'text') . '" 
                            id="' . $key . '" 
                            name="' . $key . '"
                            placeholder="' . $name . '" 
                            value="' . ((isset($mitglieder[$key]) && $key != "password" ? $mitglieder[$key] : '')) . '"
                            class="form-control"
                            ' . ($disabled ? "disabled" : "") . '
                            />');
                    echo('</div>');
                }
                if($id) {
                    echo form_hidden('id', $id);
                }
                ?>
                <div class="form-group form-check">
                    <input type="checkbox" id="inProjekt" name="inProjekt" class="form-check-input"
                        <?php echo $id && isMitgliedInProjekt($projekte_mitglieder, $mitglieder["id"]) ? "checked" : "" ?>
                        <?php echo ($disabled ? "disabled" : "") ?>
                    />
                    <label for="inProjekt" class="form-check-label">Diesem Projekt zugeordnet</label>
                </div>
                <?php if ($delete): ?>
                <button type="button" class="btn btn-danger deleteModal">Löschen</button>
                <button name="action" value="delete" class="deleteReal d-none">Löschen</button>

            <?php else: ?>
                <button type="reset" class="btn btn-info">Werte zurücksetzen</button>
                <button type="submit" name="action" value="<?php echo $action ?>" class="btn btn-primary">Speichern</button>
            <?php endif; ?>
                </form>
            <?php
            else:
                ?>
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
                    foreach ($mitglieder as $mitglied) {
                        echo("<tr>");
                        echo("<td>" . (isset($mitglied['name']) ? $mitglied['name'] : '') . "</td>");
                        echo("<td>" . (isset($mitglied['username']) ? $mitglied['username'] : '') . "</td>");
                        echo("<td>" . (isset($mitglied['email']) ? $mitglied['email'] : '') . "</td>");
                        $currentProjektId = isset($_SESSION['projektId']) ? $_SESSION['projektId'] : -1;
                        echo('<td><div class="form-group form-check"> <input type="checkbox" class="form-check-input" ' .
                            (isMitgliedInProjekt($projekte_mitglieder, $mitglied["id"]) ? "checked" : "") . ' disabled/></div></td>');
                        echo('<td class="text-right">'
                            . '<a href="mitglieder/edit/' . $mitglied['id'] . '" class="mr-3"><i class="fas fa-edit fa-lg"></i></a>'
                            . '<a href="mitglieder/delete/' . $mitglied['id'] . '"><i class="fas fa-trash fa-lg"></i></a>'
                            . '</td>');
                        echo("</tr>");
                    }
                    ?>
                    </tbody>
                </table>
                <a href="mitglieder/create">
                    <button class="btn btn-primary">Neues Mitglied erstellen</button>
                </a>
            <?php endif; ?>
        </div>
        <div class="col-2"></div>
    </div>
</div>