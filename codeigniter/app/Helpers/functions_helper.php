<?php

function isMitgliedInProjekt($projekte_mitglieder, $mitgliedId) {
    foreach ($projekte_mitglieder as $projekt_mitglied) {
        if (isset($projekt_mitglied['mitglied']) && $projekt_mitglied['mitglied'] == $mitgliedId){
            return true;
        }
    }
    return false;
}