<div class="col-2">
    <ul class="list-group">
        <li class="list-group-item">
            <?php
                $this->session = \Config\Services::session();
                if(!$this->session->get('loggedIn')) {
                    echo('<a href="login">Login</a>');
                } else {
                    echo('<a href="' . base_url() . '/login/process_logout">Logout</a>');
                }
            ?>
        </li>
        <li class="list-group-item">
            <a href="projekte">Projekte</a>
        </li>
        <li class="list-group-item">
            <a href="todos">Aktuelles Projekt</a>
        </li>
        <li class="list-group-item ml-4">
            <a href="reiter">Reiter</a>
        </li>
        <li class="list-group-item ml-4">
            <a href="aufgaben">Aufgaben</a>
        </li>
        <li class="list-group-item ml-4">
            <a href="mitglieder">Mitglieder</a>
        </li>
    </ul>
</div>