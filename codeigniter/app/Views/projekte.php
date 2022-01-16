<div class="container-fluid">
    <div class="jumbotron text-center">
        <h1>Aufgabenplaner: Projekte</h1>
    </div>
    <div class="row">
        <?php include('templates/nav.php');
        ?>
        <div class="col">
            <?php echo form_open(base_url('projekte/select/'), array('role' => 'form', 'class' => 'mb-3')); ?>
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