<div class="container-fluid">
    <div class="jumbotron text-center">
        <h1>Aufgabenplaner: Todos (Aktuelles Projekt)</h1>
    </div>
    <div class="row">
        <?php include('templates/nav.php');
        ?>
        <div class="col">
            <div class="row">
                <?php
                $reiter = array();
                $aufgaben = array();
                $mitglieder = array();
                //include("arrays.php");
                foreach($reiter as $r){
                    echo("<div class='col card border-0'>");
                    echo("<div class='card-header'>" . (isset($r['name']) ? $r['name'] : '') . ":</div>");
                    if(isset($r['id'])) {
                        echo("<ul class='list-group'>");
                        foreach($aufgaben as $aufgabe) {
                            if(isset($aufgabe['reiter']) && $aufgabe['reiter'] == $r['id']) {
                                $gefundenesMitglied = null;
                                if(isset($aufgabe['zustaendig'])) {
                                    foreach($mitglieder as $mitglied) {
                                        if(isset($mitglied['id']) && $mitglied['id'] == $aufgabe['zustaendig']) {
                                            $gefundenesMitglied = $mitglied;
                                        }
                                    }
                                }
                                if(isset($aufgabe['titel'])) {
                                    echo("<li class='list-group-item'>");
                                    echo($aufgabe['titel']);
                                    echo(isset($gefundenesMitglied['name']) ? (" (" . $gefundenesMitglied['name'] . ")") : "");
                                    echo("</li>");
                                }
                            }
                        }
                        echo("</ul>");
                    }
                    echo("</div>");
                }
                ?>
            </div>
        </div>
    </div>
</div>