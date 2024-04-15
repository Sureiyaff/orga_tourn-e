<?php

class AdminUpdateInstrumentAction
{
    function __construct()
    {
    }

    function executeInstrumentUpdate()
    {
        if (isset($_POST['id_instrument'])) {
            $id_instrument = htmlspecialchars($_POST['id_instrument']);
            $id_artist = htmlspecialchars($_POST['id_artist']);
            $name = htmlspecialchars($_POST['Instrumentname']);
            $weight = htmlspecialchars($_POST['Instrumentweight']);
            $volume = htmlspecialchars($_POST['Instrumentvolume']);
            $updatedInstrument = new Instrument($id_artist, $name, $weight, $volume, $id_instrument);
            $instrumentPDO = new InstrumentPDO();
            if ($instrumentPDO->update($updatedInstrument)) {
                echo '<p>L\'Instrument a été modifiée</br><a href="index.php?action=adminRedirection&step=view">Retour</a></p>';
            } else {
                echo "Une erreur est survenue lors de la modification de l'activité.";
            }
        }
    }
}
