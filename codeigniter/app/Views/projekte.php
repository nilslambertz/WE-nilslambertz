<div class="container-fluid">
    <div class="jumbotron text-center">
        <h1>Aufgabenplaner: Projekte</h1>
    </div>
    <div class="row">
        <?php include('templates/nav.php');
        ?>
        <div class="col"><?php
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
                echo('<a href="' . base_url('projekte') . '"><button class="btn btn-info mb-3">Zurück</button></a>');
                echo form_open(base_url('projekte/submit/'), array('role' => 'form'));
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
                    <label for="name">Projektname:</label>
                    <input type="text" id="name" name="name" placeholder="Projekt" class="form-control"
                        <?php echo $disabled ? "disabled" : "" ?>
                        value="<?php echo isset($projekte['name']) ? $projekte['name'] : "" ?>"
                    />
                </div>
                <div class="form-group">
                    <label for="beschreibung">Projektbeschreibung:</label>
                    <textarea type="text" id="beschreibung" name="beschreibung" placeholder="Beschreibung" class="form-control"
                        <?php echo $disabled ? "disabled" : "" ?>
                    ><?php echo isset($projekte['beschreibung']) ? $projekte['beschreibung'] : "" ?></textarea>
                </div>
                <?php echo form_hidden('ersteller', isset($projekte['ersteller']) ? $projekte['ersteller'] : ""); ?>
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
            <?php echo form_open(base_url('projekte/action/'), array('role' => 'form', 'class' => 'mb-3')); ?>
                <div class="form-group">
                    <h3><label for="projekt">Projekt auswählen:</label></h3>
                    <select class="custom-select" name="projekt" id="projekt">
                        <option value="-1" <?php echo isset($_SESSION['projektId']) ? "" : "selected" ?>>- bitte auswählen -</option>
                        <?php
                        foreach($projekte as $projekt) {
                            if(isset($projekt['id']) && isset($projekt['name'])) {
                                echo("<option " .
                                    (isset($_SESSION['projektId']) && $_SESSION['projektId'] == $projekt['id'] ? "selected " : "") .
                                    "value='" . $projekt['id'] . "'" .
                                    ">");
                                echo($projekt['name']);
                                echo("</option>");
                            }
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" name="action" value="select" class="btn btn-success">Auswählen</button>
                <button type="submit" name="action" value="edit" class="btn btn-primary">Bearbeiten</button>
                <button type="submit" name="action" value="delete" class="btn btn-danger">Löschen</button>
            </form>
            <a href="projekte/create" class="mt-3">
                <button class="btn btn-primary">Neues Projekt erstellen</button>
            </a>
            <?php endif; ?>
        </div>
        <div class="col-2"></div>
    </div>
</div>