<?php

class AdminAddConcert
{
    private $newConcert;

    function __construct()
    {
        $id_group = (int)$_POST["id_group"];
        echo "<script>console.log('Group ID: $id_group');</script>"; // Afficher l'ID du groupe dans la console du navigateur
        $place = $_POST["place"];
        $date = $_POST["date"];
        $this->newConcert = new Concert($id_group, $place, $date);
    }

    function printAddConcertResult()
    {
        $concertPDO = new ConcertPDO();
        if ($concertPDO->create($this->newConcert)) {
            echo '<p>Le concert a été ajoutée</br><a href="index.php?action=adminRedirection&step=view">Retour</a></p>';
        } else {
            echo "<p>Echec de l'enregistrement</p>";
        }
    }
}
