<div class="col-2">
    <ul class="list-group">
        <?php
        helper('url');
        $this->session = \Config\Services::session();

        $links = [];
        if (!$this->session->get('loggedIn')) {
            $links['login'] = "Login";
        } else {
            $links['login/process_logout'] = "Logout";
        }
        $links["projekte"] = "Projekte";
        $links["todos"] = "Aktuelles Projekt";
        $links["reiter"] = "Reiter";
        $links["aufgaben"] = "Aufgaben";
        $links["mitglieder"] = "Mitglieder";

        foreach ($links as $link => $titel) {
            echo('<li class="list-group-item">');
            echo('<a href="' . base_url($link) . '">' . $titel . '</a>');
            echo('</li>');
        }
        ?>
    </ul>
</div>