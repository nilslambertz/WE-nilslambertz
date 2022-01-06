<div class="container-fluid">
    <div class="jumbotron text-center">
        <h1>Aufgabenplaner: Login</h1>
    </div>
    <div class="row">
        <div class="col-2">
        </div>
        <div class="col">
            <?php
            helper('form');
            echo form_open(base_url('login/process_login/'), array('role' => 'form'));
            ?>
            <div class="form-group">
                <label for="username">Benutzername:</label>
                <input type="text" id="username" name="username" placeholder="Benutzernamen eingeben" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="password">Passwort:</label>
                <input type="password" id="password" name="password" placeholder="Passwort" class="form-control"/>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" id="agb" class="form-check-input"/>
                <label for="agb" class="form-check-label">ABG und Datenschutzbedingungen akzeptieren</label>
            </div>
            <button id="btnsubmit" type="submit" class="btn btn-primary">Einloggen</button>
            <p>Noch nicht registriert? <a href="registrierung">Registrierung</a></p>
            <p>Da der Login-Vorgang technisch noch nicht realisiert wurde: <a href="todos">Überspringen</a></p>
            </form>
        </div>
        <div class="col-2"></div>
    </div>
</div>