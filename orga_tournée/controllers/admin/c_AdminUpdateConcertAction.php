<?php

class AdminUpdateConcertAction
{
    function __construct()
    {
    }

    function executeconcertUpdate()
    {
        if (isset($_POST['id_concert'])) {
            $id_concert = htmlspecialchars($_POST['id_concert']);
            $id_group = htmlspecialchars($_POST['id_group']);
            $place = htmlspecialchars($_POST['place']);
            $date = htmlspecialchars($_POST['date']);
            $updatedConcert = new concert($id_group, $place, $date, $id_concert);
            $concertPDO = new concertPDO();
            if ($concertPDO->update($updatedConcert)) {
                echo '<p>Le concert a été modifiée</br><a href="index.php?action=adminRedirection&step=view">Retour</a></p>';
            } else {
                echo "Une erreur est survenue lors de la modification de l'activité.";
            }
        }
    }
}
