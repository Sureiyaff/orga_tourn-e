<?php

class AdminUpdateArtistAction
{
    function __construct()
    {
    }

    function executeArtistUpdate()
    {
        if (isset($_POST['id_artist'])) {
            $id_artist = htmlspecialchars($_POST['id_artist']);
            $id_group = htmlspecialchars($_POST['id_group']);
            $name = htmlspecialchars($_POST['artistname']);
            $updatedArtist = new Artist($id_group, $name, $id_artist);
            $artistPDO = new ArtistPDO();
            if ($artistPDO->update($updatedArtist)) {
                echo '<p>L\'artiste a été modifiée</br><a href="index.php?action=adminRedirection&step=view">Retour</a></p>';
            } else {
                echo "Une erreur est survenue lors de la modification de l'activité.";
            }
        }
    }
}
