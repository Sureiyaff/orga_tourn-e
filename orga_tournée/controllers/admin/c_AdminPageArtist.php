<?php

class AdminPageArtist
{
    private $instruments;
    private $login;
    public $selectArtist;

    function __construct()
    {
        if (isset($_POST['artistId'])) {
            $artistId = $_POST['artistId'];
            echo "<script>console.log('artist ID: $artistId');</script>"; // Afficher l'ID du artiste dans la console du navigateur
            $instrumentPDO = new InstrumentPDO();
            $this->instruments = $instrumentPDO->getinstrumentsByartistId($artistId);
        } else {
            // Si artistId n'est pas défini, vous pouvez décider de ne pas récupérer les instrumentes ou de retourner une liste vide
            $this->instruments = []; // Assignez une liste vide à $this->instruments
            // ou $this->instruments = $instrumentPDO->getAllinstruments(); // Si vous avez une méthode pour récupérer tous les instrumentes
        }
        $this->login = $_SESSION['login'];
        $artistPDO = new artistPDO();
        $this->selectArtist = $artistPDO->read($artistId);
    }

    function printArtistName(){
        echo '<h1 id="FocusSwimmingPool--Title">' . $this->selectArtist->getName() . '</h1>';
    }

    function printinstrument()
    {
        foreach ($this->instruments as $instrument) {
            echo '<tr>

                <td>' . $instrument->getIdInstrument() . '</td>
                <td>'. $instrument->getName() . '</td>
                <td>'. $instrument->getWeight() . '</td>
                <td>'. $instrument->getVolume() . '</td>

                <form method="post" action="index.php">
                <input type="hidden" name="action" value="adminRedirection">
                <input type="hidden" name="step" value="updateInstrument">
                <input type="hidden" name="type" value="instrument">
                <input type="hidden" name="id" value="'. $instrument->getIdInstrument() .'">
                <td> <button class="adminTableAction" type="submit">
                <img class="adminIcon" src="view/img/edit.ico" />
                </button></td>
                </form>

                <form method="post" action="index.php">
                <input type="hidden" name="action" value="adminRedirection">
                <input type="hidden" name="step" value="deleteInstrument">
                <input type="hidden" name="type" value="instrument">
                <input type="hidden" name="id" value="'. $instrument->getIdInstrument() .'">
                <td> <button class="adminTableAction" type="submit">
                <img class="adminIcon" src="view/img/delete.ico" />
                </button></td>
                </form>
                </td></tr>
                ';
        }
    }

    function printAddInstrument(){
        echo '
        <form method="POST" action="index.php">
        <label for="instruname">Nom :</label></br>
        <input type="text" style="width:50%" name="instruname" id="instruname" value="" required>
        <br><br>
        <label for="weight">Poids :</label></br>
        <input type="text" style="width:50%" name="weight" id="weight" value="" required>
        <br><br>
        <label for="volume">Volume :</label></br>
        <input type="text" style="width:50%" name="volume" id="volume" value="" required>
        <br><br>
        <input type="hidden" name="id_artist" value="' . $this->selectArtist->getIdArtist() . '">
        <input type="hidden" name="action" value="adminRedirection" >
        <input type="hidden" name="step" value="addInstrument" >
        <button type="submit">Ajouter l\'instrument</button>
        </form>';
    }
}
