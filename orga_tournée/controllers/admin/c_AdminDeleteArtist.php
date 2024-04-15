<?php

class AdminDeleteArtist
{
    private $artist;

    function __construct()
    {
        $type = $_POST["type"];
        $id = $_POST["id"];
        switch ($type) {
            case 'artist':
                $artistPDO = new ArtistPDO();
                $this->artist = $artistPDO->read($id);
                break;
        }
    }

    function printDeleteResult()
    {
        if ($this->artist != null) {
            $artistPDO = new artistPDO();
            $artistPDO->delete($this->artist->getIdartist());
            echo '<p>Le artiste a été supprimé</br><a href="index.php?action=adminRedirection&step=view">Retour</a></p>';
        }
    }
}
