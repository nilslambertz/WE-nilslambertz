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
        $links["todos"] = isset($_SESSION['projektName']) ? $_SESSION['projektName'] : "Aktuelles Projekt";
        $links["reiter"] = "Reiter";
        $links["aufgaben"] = "Aufgaben";
        $links["mitglieder"] = "Mitglieder";

        $classes["todos"] = "mt-3 border-top";
        $classes["reiter"] = "ml-3";
        $classes["aufgaben"] = "ml-3";
        $classes["mitglieder"] = "ml-3";

        foreach ($links as $link => $titel) {
            echo('<li class="list-group-item ' . (isset($classes[$link]) ? "$classes[$link]" : "") . '">');
            echo('<a href="' . base_url($link) . '">' . $titel . '</a>');
            echo('</li>');
        }
        ?>
    </ul>
</div>