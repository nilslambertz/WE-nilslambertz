<div class="container-fluid">
    <div class="jumbotron text-center">
        <h1>Aufgabenplaner: Aufgaben</h1>
    </div>
    <div class="row">
        <?php include('templates/nav.php');
        ?>

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
            echo('<a href="' . base_url('aufgaben') . '"><button class="btn btn-info mb-3">Zurück</button></a>');
            echo form_open(base_url('aufgaben/submit/'), array('role' => 'form'));
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
                if($id) {
                    echo form_hidden('id', $id);
                }
                ?>
                <div class="form-group">
                    <label for="name">Aufgabenbezeichnung:</label>
                    <input type="text" name="name" id="name" placeholder="Name" class="form-control"
                        <?php echo $disabled ? "disabled" : "" ?>
                           value="<?php echo isset($aufgaben['name']) ? $aufgaben['name'] : "" ?>"
                    />
                </div>
                <div class="form-group">
                    <label for="beschreibung">Beschreibung:</label>
                    <textarea type="text" name="beschreibung" id="beschreibung" placeholder="Beschreibung" class="form-control"
                    <?php echo $disabled ? "disabled" : "" ?>><?php echo isset($aufgaben['beschreibung']) ? $aufgaben['beschreibung'] : "" ?></textarea>
                </div>
                <div class="form-group">
                    <label for="faelligkeitsdatum">Fällig bis:</label>
                    <input type="text" name="faelligkeitsdatum" id="faelligkeitsdatum" placeholder="01.01.19" class="form-control"
                        <?php echo $disabled ? "disabled" : "" ?>
                           value="<?php echo isset($aufgaben['faelligkeitsdatum']) ? $aufgaben['faelligkeitsdatum'] : "" ?>"
                    />
                </div>
                <div class="form-group">
                    <label for="reiter">Zugehöriger Reiter:</label>
                    <select class="custom-select" name="reiter" id="reiter" <?php echo $disabled ? "disabled" : "" ?>>
                    <?php foreach($reiter as $r) {
                        if(isset($r['name']) && $r['id']) {
                            echo('<option value="' . $r['id'] . '" ' . (isset($aufgaben['reiter']) && $aufgaben['reiter'] == $r['id'] ? 'selected' : '') . '>' . $r['name']  . '</option>');
                        }
                    }
                    ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="mitglieder[]">Zuständige Mitglieder:</label>
                    <select class="custom-select" name="mitglieder[]" id="mitglieder" multiple <?php echo $disabled ? "disabled" : "" ?>>
                        <?php foreach($mitglieder as $mitglied) {
                            if(isset($mitglied['name']) && $mitglied['id']) {
                                echo('<option value="' . $mitglied['id'] . '" ' . (isset($zustaendigeMitglieder) && in_array($mitglied['id'],$zustaendigeMitglieder) ? 'selected' : '') .  ' >' . $mitglied['name']  . '</option>');
                            }
                        }
                        ?>
                    </select>
                </div>
                <?php if ($delete): ?>
                <button type="submit" name="action" value="delete" class="btn btn-danger">Löschen</button>

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
                    echo("<td>" . (isset($aufgabe['reiterName']) ? $aufgabe['reiterName'] : '') . "</td>");
                    echo("<td>" . (isset($aufgabe['mitglieder']) ? $aufgabe['mitglieder'] : '') . "</td>");
                    echo('<td class="text-right">'
                        . '<a href="aufgaben/edit/' . $aufgabe['id'] . '" class="mr-3"><i class="fas fa-edit fa-lg"></i></a>'
                        . '<a href="aufgaben/delete/' . $aufgabe['id'] . '"><i class="fas fa-trash fa-lg"></i></a>'
                        . '</td>');
                    echo("</tr>");
                }
                ?>
                </tbody>
            </table>
                <a href="aufgaben/create" class="mt-3">
                    <button class="btn btn-primary">Neue Aufgabe erstellen</button>
                </a>
            <?php endif; ?>
        </div>
        <div class="col-2"></div>
    </div>
</div>