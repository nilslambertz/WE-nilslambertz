<?php
    global $mitglieder;
    $mitglieder = array(
        array(
            'id' => 1,
            'username' => 'mustermann',
            'name' => 'Max Mustermann',
            'email' => 'mustermann@muster.de',
            'projektID' => 1
        ),
        array(
            'id' => 2,
            'username' => 'elena',
            'name' => 'Elena Musterfrau',
            'email' => 'elena@example.com',
            'projektID' => 1
        )
    );

    global $reiter;
    $reiter = array(
        array(
            'id' => 1,
            'name' => 'ToDo',
            'beschreibung' => 'Dinge, die erledigt werden müssen.'
        ),
        array(
            'id' => 2,
            'name' => 'Erledigt',
            'beschreibung' => 'Dinge, die erledigt sind.'
        ),
        array(
            'id' => 3,
            'name' => 'Verschoben',
            'beschreibung' => 'Dinge, die später erledigt werden.'
        ),
    );

    global $aufgaben;
    $aufgaben = array(
        array(
            'id' => 1,
            'titel' => 'HTML-Datei erstellen',
            'beschreibung' => 'HTML-Datei erstellen',
            'reiter' => 1,
            'zustaendig' => 1
        ),
        array(
            'id' => 2,
            'titel' => 'CSS-Datei erstellen',
            'beschreibung' => 'CSS-Datei erstellen',
            'reiter' => 1,
            'zustaendig' => 2
        ),
        array(
            'id' => 3,
            'titel' => 'Pc einschalten',
            'beschreibung' => 'Pc einschalten',
            'reiter' => 2,
            'zustaendig' => 1
        ),
        array(
            'id' => 4,
            'titel' => 'Kaffee trinken',
            'beschreibung' => 'Kaffee trinken',
            'reiter' => 2,
            'zustaendig' => 2
        ),
        array(
            'id' => 5,
            'titel' => 'Für die Uni lernen',
            'beschreibung' => 'Für die Uni lernen',
            'reiter' => 3,
            'zustaendig' => 1
        ),
    );

    global $projekte;
    $projekte = array(
        array(
            'id' => 1,
            'name' => 'Erstes Projekt'
        ),
        array(
            'id' => 2,
            'name' => 'Zweites Projekt'
        )
    );