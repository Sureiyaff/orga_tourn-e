<?php

class AdminUpdateConcert
{
    private $concertToUpdate;

    function __construct()
    {
        $concertID = intval($_POST["id"]);
        $concertPDO = new ConcertPDO();
        $this->concertToUpdate = $concertPDO->read($concertID);
    }

    function printUpdateConcertForm()
    {
        echo '
        <form method="POST" action="index.php">
        <label for="place">Lieu du concert :</label></br>
        <input type="text" style="width:50%" name="place" id="place" value="' .
            $this->concertToUpdate->getPlace() . '" required>
        <br><br>
        <label for="date">Date du concert :</label></br>
        <input type="text" style="width:50%" name="date" id="date" value="' .
            $this->concertToUpdate->getDate() . '" required>
        <br><br>
        <input type="hidden" name="id_concert" value="' . $this->concertToUpdate->getIdconcert() . '">
        <input type="hidden" name="id_group" value="' . $this->concertToUpdate->getIdGroup() . '">
        <input type="hidden" name="action" value="adminRedirection" >
        <input type="hidden" name="step" value="updateConcertAction" >
        <button type="submit">Modifier le concerte</button>
        </form>';
    }
}
