<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Todos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
        <div class="jumbotron text-center">
            <h1>Aufgabenplaner: Todos (Aktuelles Projekt)</h1>
        </div>
        <div class="row">
            <?php
                include("nav.php");
            ?>
            <div class="col">
                <div class="row">
                    <?php
                    $reiter = array();
                    $aufgaben = array();
                    $mitglieder = array();
                    include("arrays.php");
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
</body>
</html>