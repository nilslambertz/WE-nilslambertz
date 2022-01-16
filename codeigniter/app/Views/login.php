<div class="container-fluid">
    <div class="jumbotron text-center">
        <h1>Aufgabenplaner: Login</h1>
    </div>
    <div class="row">
        <div class="col-2">
        </div>
        <div class="col">
            <?php
            echo form_open(base_url('login/process_login/'), array('role' => 'form'));
            ?>
            <div class="form-group">
                <label for="username">Benutzername:</label>
                <input type="text" id="username" name="username" placeholder="Benutzernamen eingeben"
                       class="form-control <?php echo isset($error['username']) ? "is-invalid" : "" ?>"
                        value="<?php echo isset($values['username']) ? $values['username'] : "" ?>"/>
                <div class="invalid-feedback">
                    <?=(isset($error['username']))?$error['username']:''?>
                </div>
            </div>
            <div class="form-group">
                <label for="password">Passwort:</label>
                <input type="password" id="password" name="password" placeholder="Passwort"
                       class="form-control <?php echo isset($error['password']) ? "is-invalid" : "" ?>"
                       value="<?php echo isset($values['password']) ? $values['password'] : "" ?>"/>
                <div class="invalid-feedback">
                    <?=(isset($error['password']))?$error['password']:''?>
                </div>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" id="agb" name="agb"
                       class="form-check-input <?php echo isset($error['agb']) ? "is-invalid" : "" ?>"
                       <?php echo isset($values['agb']) ? "checked" : "" ?>/>
                <label for="agb" class="form-check-label">ABG und Datenschutzbedingungen akzeptieren</label>
                <div class="invalid-feedback">
                    <?=(isset($error['agb']))?$error['agb']:''?>
                </div>
            </div>
            <button id="btnsubmit" type="submit" class="btn btn-primary">Einloggen</button>
            </form>
        </div>
        <div class="col-2"></div>
    </div>
</div>