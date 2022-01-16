<?php
function getReiterNameFromAufgabe($aufgabe, $reiter)
{
    if (isset($aufgabe['reiter'])) {
        foreach ($reiter as $r) {
            if (isset($r['id']) && $r['id'] == $aufgabe['reiter']) {
                if (isset($r['name'])) {
                    return $r['name'];
                }
            }
        }
    }
    return "";
}

function getMitgliederNamenFromAufgabe($aufgabe, $aufgaben_mitglieder, $mitglieder)
{
    $zustaendig = [];
    foreach ($aufgaben_mitglieder as $aufgabe_mitglied) {
        if (isset($aufgabe['id']) && isset($aufgabe_mitglied['aufgabe']) && $aufgabe_mitglied['aufgabe'] == $aufgabe['id']) {
            foreach ($mitglieder as $mitglied) {
                if (isset($mitglied['id']) && isset($mitglied['name']) && $mitglied['id'] == $aufgabe_mitglied['mitglied']) {
                    array_push($zustaendig, $mitglied['name']);
                }
            }
        }
    }
    $result = "";
    for ($i = 0; $i < count($zustaendig); $i++) {
        $result .= $zustaendig[$i];
        if ($i != count($zustaendig) - 1) {
            $result .= ", ";
        }
    }
    return $result;
}

function getProjektNamenFromMitglied($projekte, $projekte_mitglieder, $mitglied)
{
    $projekt_namen = [];
    foreach ($projekte_mitglieder as $projekt_mitglied) {
        if (isset($mitglied['id']) && $projekt_mitglied['mitglied'] == $mitglied['id']) {
            foreach ($projekte as $projekt) {
                if (isset($projekt['id']) && isset($projekt['name']) && $projekt['id'] == $projekt_mitglied['projekt']) {
                    array_push($projekt_namen, $projekt['name']);
                }
            }
        }
    }
    $result = "";
    for ($i = 0; $i < count($projekt_namen); $i++) {
        $result .= $projekt_namen[$i];
        if ($i != count($projekt_namen) - 1) {
            $result .= ", ";
        }
    }
    return $result;
}

function isMitgliedInProjekt($projekte_mitglieder, $mitgliedId) {
    foreach ($projekte_mitglieder as $projekt_mitglied) {
        if (isset($projekt_mitglied['mitglied']) && $projekt_mitglied['mitglied'] == $mitgliedId){
            return true;
        }
    }
    return false;
}

function getProjektIdsFromMitglied($projekte_mitglieder, $mitglied)
{
    $projektIds = [];
    foreach ($projekte_mitglieder as $projekt_mitglied) {
        if (isset($mitglied['id']) && isset($projekt_mitglied['mitglied']) && isset($projekt_mitglied['projekt'])
            && $projekt_mitglied['mitglied'] == $mitglied['id']) {
            array_push($projektIds, $projekt_mitglied['projekt']);
        }
    }
    return $projektIds;
}

function getAufgabenFromProjekt($aufgaben, $projektId) {
    $result = [];
    foreach ($aufgaben as $aufgabe) {
        if(isset($aufgabe['projekt']) && $aufgabe['projekt'] == $projektId) {
            array_push($result, $aufgabe);
        }
    }
    return $result;
}