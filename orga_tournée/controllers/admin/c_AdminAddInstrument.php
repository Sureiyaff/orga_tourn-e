<?php

class AdminAddInstrument
{
    private $newInstrument;

    function __construct()
    {
        $id_artist = (int)$_POST["id_artist"];
        echo "<script>console.log('Group ID: $id_artist');</script>"; // Afficher l'ID du groupe dans la console du navigateur
        $instruname = $_POST["instruname"];
        $weight = $_POST["weight"];
        $volume = $_POST["volume"];
        $this->newInstrument = new Instrument($id_artist, $instruname, $weight, $volume);
    }

    function printAddInstrumentResult()
    {
        $instrumentPDO = new InstrumentPDO();
        if ($instrumentPDO->create($this->newInstrument)) {
            echo '<p>L\'instrument a été ajoutée</br><a href="index.php?action=adminRedirection&step=view">Retour</a></p>';
        } else {
            echo "<p>Echec de l'enregistrement</p>";
        }
    }
}
