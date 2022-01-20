<div class="container-fluid">
    <div class="jumbotron text-center">
        <h1>Aufgabenplaner: Todos (<?php echo(isset($_SESSION['projektName']) ? $_SESSION['projektName'] : "Aktuelles Projekt") ?>)</h1>
    </div>
    <?php include('templates/nav.php');
    ?>
    <div class="row">
        <div class="col-2"></div>
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
                                    if(isset($aufgabe['mitglieder'])) {
                                        echo(" (" . $aufgabe['mitglieder'] . ")");
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
        <div class="col-2"></div>
    </div>
</div>