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
                //include("arrays.php");
                foreach($reiter as $r){
                    echo("<div class='col card border-0'>");
                    echo("<div class='card-header'>" . (isset($r['name']) ? $r['name'] : '') . ":</div>");
                    if(isset($r['id'])) {
                        echo("<ul class='list-group'>");
                        foreach($aufgaben as $aufgabe) {
                            if(isset($aufgabe['reiter']) && $aufgabe['reiter'] == $r['id']) {
                                $zustaendig = [];
                                foreach($aufgaben_mitglieder as $aufgabe_mitglied) {
                                    if(isset($aufgabe['id']) && isset($aufgabe_mitglied['aufgabe']) && $aufgabe_mitglied['aufgabe'] == $aufgabe['id']) {
                                        foreach($mitglieder as $mitglied) {
                                            if(isset($mitglied['id']) && isset($mitglied['name']) && $mitglied['id'] == $aufgabe_mitglied['mitglied']) {
                                                array_push($zustaendig, $mitglied['name']);
                                            }
                                        }
                                    }
                                }
                                if(isset($aufgabe['name'])) {
                                    echo("<li class='list-group-item'>");
                                    echo($aufgabe['name']);
                                    if(count($zustaendig) > 0) {
                                        echo(" (");
                                        for($i = 0; $i < count($zustaendig); $i++) {
                                            echo($zustaendig[$i]);
                                            if($i != count($zustaendig) - 1) {
                                                echo ", ";
                                            }
                                        }
                                        echo(")");
                                    }
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