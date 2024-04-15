<?php

class AdminAddArtist
{
    private $newArtist;

    function __construct()
    {
        $id_group = (int)$_POST["id_group"];
        echo "<script>console.log('Group ID: $id_group');</script>"; // Afficher l'ID du groupe dans la console du navigateur
        $artistname = $_POST["artistname"];
        $this->newArtist = new Artist($id_group, $artistname);
    }

    function printAddArtistResult()
    {
        $artistPDO = new ArtistPDO();
        if ($artistPDO->create($this->newArtist)) {
            echo '<p>L\'artiste a été ajoutée</br><a href="index.php?action=adminRedirection&step=view">Retour</a></p>';
        } else {
            echo "<p>Echec de l'enregistrement</p>";
        }
    }
}
