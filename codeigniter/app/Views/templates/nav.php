<div class="row">
<div class="col-1"></div>
<nav class="col navbar navbar-expand-lg navbar-light bg-light mb-4">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo(base_url('projekte')) ?>">Projekte</a>
            </li>
            <?php if(session()->get('projektId')) : ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo(session()->get('projektName') != null ? session()->get('projektName') : "Aktuelles Projekt") ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?php echo(base_url('todos')) ?>">Projektübersicht</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo(base_url('reiter')) ?>">Reiter</a>
                    <a class="dropdown-item" href="<?php echo(base_url('aufgaben')) ?>">Aufgaben</a>
                    <a class="dropdown-item" href="<?php echo(base_url('mitglieder')) ?>">Mitglieder</a>
                </div>
            </li>
            <?php endif; ?>
        </ul>
        <?php if(session()->get('loggedIn')) : ?><a href="<?php echo(base_url('login/process_logout')) ?>"><button class="btn btn-primary" type="submit">Logout</button></a>
        <?php endif; ?>
    </div>
</nav>
<div class="col-1"></div></div>