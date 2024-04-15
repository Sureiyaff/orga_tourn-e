<?php

class AdminUpdateArtist
{
    private $artistToUpdate;

    function __construct()
    {
        $artistID = intval($_POST["id"]);
        $artistPDO = new ArtistPDO();
        $this->artistToUpdate = $artistPDO->read($artistID);
    }

    function printUpdateArtistForm()
    {
        echo '
        <form method="POST" action="index.php">
        <label for="artistname">Nom du artiste :</label></br>
        <input type="text" style="width:50%" name="artistname" id="artistname" value="' .
            $this->artistToUpdate->getName() . '" required>
        <br><br>
        <input type="hidden" name="id_artist" value="' . $this->artistToUpdate->getIdArtist() . '">
        <input type="hidden" name="id_group" value="' . $this->artistToUpdate->getIdGroup() . '">
        <input type="hidden" name="action" value="adminRedirection" >
        <input type="hidden" name="step" value="updateArtistAction" >
        <button type="submit">Modifier le artiste</button>
        </form>';
    }
}
