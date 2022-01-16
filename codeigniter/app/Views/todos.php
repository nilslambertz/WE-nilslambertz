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
                foreach($reiter as $r){
                    echo("<div class='col card border-0'>");
                    echo("<div class='card-header'>" . (isset($r['name']) ? $r['name'] : '') . ":</div>");
                    if(isset($r['id'])) {
                        echo("<ul class='list-group'>");
                        foreach($aufgaben as $aufgabe) {
                            if(isset($aufgabe['reiter']) && $aufgabe['reiter'] == $r['id']) {
                                if(isset($aufgabe['name'])) {
                                    echo("<li class='list-group-item'>");
                                    echo($aufgabe['name']);
                                    $zustaendig = getMitgliederNamenFromAufgabe($aufgabe, $aufgaben_mitglieder, $mitglieder);
                                    if(strlen($zustaendig) > 0) {
                                        echo(" (" . $zustaendig . ")");
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