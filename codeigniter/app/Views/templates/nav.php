<div class="col-2">
    <ul class="list-group">
        <?php
        $links = [];
        if (session()->get('loggedIn') == null) {
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