<div class="container-fluid">
    <div class="jumbotron text-center">
        <h1>Aufgabenplaner: Reiter</h1>
    </div>
    <div class="row">
        <?php include('templates/nav.php');
        ?>
        <div class="col">
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
                echo('<a href="' . base_url('reiter') . '"><button class="btn btn-info mb-3">Zurück</button></a>');
                echo form_open(base_url('reiter/submit/'), array('role' => 'form'));
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
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" placeholder="Name" class="form-control"
                        <?php echo $disabled ? "disabled" : "" ?>
                           value="<?php echo isset($reiter['name']) ? $reiter['name'] : "" ?>"
                    />
                </div>
                <div class="form-group">
                    <label for="beschreibung">Beschreibung:</label>
                    <textarea type="text" id="beschreibung" name="beschreibung" placeholder="Beschreibung" class="form-control"
                        <?php echo $disabled ? "disabled" : "" ?>
                    ><?php echo isset($reiter['beschreibung']) ? $reiter['beschreibung'] : "" ?></textarea>
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
                    <th scope="col">Name</th>
                    <th scope="col">Beschreibung</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach($reiter as $r){
                    echo("<tr>");
                    echo("<td>" . (isset($r['name']) ? $r['name'] : '') . "</td>");
                    echo("<td>" . (isset($r['beschreibung']) ? $r['beschreibung'] : '') . "</td>");
                    echo('<td class="text-right">'
                        . '<a href="reiter/edit/' . $r['id'] . '" class="mr-3"><i class="fas fa-edit fa-lg"></i></a>'
                        . '<a href="reiter/delete/' . $r['id'] . '"><i class="fas fa-trash fa-lg"></i></a>'
                        . '</td>');
                    echo("</tr>");
                }
                ?>
                </tbody>
            </table>
            <a href="reiter/create">
                <button class="btn btn-primary">Neuen Reiter erstellen</button>
            </a>
            <?php endif; ?>
        </div>
        <div class="col-2"></div>
    </div>
</div>