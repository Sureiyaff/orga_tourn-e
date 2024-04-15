<?php

class AdminPageGroup
{
    private $artists;
    private $group;
    private $login;
    private $concerts;
    public $selectGroup;

    function __construct()
    {
        if (isset($_POST['groupId'])) {
            $groupId = $_POST['groupId'];
            echo "<script>console.log('Group ID: $groupId');</script>"; // Afficher l'ID du groupe dans la console du navigateur
            $artistPDO = new ArtistPDO();
            $this->artists = $artistPDO->getArtistsByGroupId($groupId);
        } else {
            // Si groupId n'est pas défini, vous pouvez décider de ne pas récupérer les artistes ou de retourner une liste vide
            $this->artists = []; // Assignez une liste vide à $this->artists
            // ou $this->artists = $artistPDO->getAllArtists(); // Si vous avez une méthode pour récupérer tous les artistes
        }
        if (isset($_POST['groupId'])) {
            $groupId = $_POST['groupId'];
            echo "<script>console.log('Group ID: $groupId');</script>"; // Afficher l'ID du groupe dans la console du navigateur
            $concertPDO = new ConcertPDO();
            $this->concerts = $concertPDO->getconcertsByGroupId($groupId);
        } else {
            // Si groupId n'est pas défini, vous pouvez décider de ne pas récupérer les artistes ou de retourner une liste vide
            $this->concerts = []; // Assignez une liste vide à $this->artists
            // ou $this->artists = $artistPDO->getAllArtists(); // Si vous avez une méthode pour récupérer tous les artistes
        }
        $this->login = $_SESSION['login'];
        $groupPDO = new GroupPDO();
        $this->selectGroup = $groupPDO->read($groupId);

    }

    function printGroupName(){
        echo '<h1 id="FocusSwimmingPool--Title">' . $this->selectGroup->getName() . '</h1>';
    }
    
    function printArtist()
    {
        foreach ($this->artists as $artist) {
            echo '<tr>

                <td>' . $artist->getIdArtist() . '</td>

                <form method="post" action="index.php">
                <input type="hidden" name="action" value="adminRedirection">
                <input type="hidden" name="step" value="pageArtist">
                <input type="hidden" name="type" value="artist">
                <input type="hidden" name="artistId" value="'. $artist->getIdArtist() .'">
                <td> <button class="adminTableAction" type="submit">'. $artist->getName() . '</td>
                </form>
            

                <form method="post" action="index.php">
                <input type="hidden" name="action" value="adminRedirection">
                <input type="hidden" name="step" value="updateArtist">
                <input type="hidden" name="type" value="artist">
                <input type="hidden" name="id" value="'. $artist->getIdArtist() .'">
                <td> <button class="adminTableAction" type="submit">
                <img class="adminIcon" src="view/img/edit.ico" />
                </button></td>
                </form>

                <form method="post" action="index.php">
                <input type="hidden" name="action" value="adminRedirection">
                <input type="hidden" name="step" value="deleteArtist">
                <input type="hidden" name="type" value="artist">
                <input type="hidden" name="id" value="'. $artist->getIdArtist() .'">
                <td> <button class="adminTableAction" type="submit">
                <img class="adminIcon" src="view/img/delete.ico" />
                </button></td>
                </form>
                </td></tr>
                ';
        }
    }

    function printAddArtist(){
        echo '
        <form method="POST" action="index.php">
        <label for="artistname">Nom du artiste :</label></br>
        <input type="text" style="width:50%" name="artistname" id="artistname" value="" required>
        <br><br>
        <input type="hidden" name="id_group" value="' . $this->selectGroup->getIdGroup() . '">
        <input type="hidden" name="action" value="adminRedirection" >
        <input type="hidden" name="step" value="addArtist" >
        <button type="submit">Ajouter l\'artiste</button>
        </form>';
    }

    function printConcert()
    {
        foreach ($this->concerts as $concert) {
            echo '<tr>
                <td>'. $concert->getPlace() . '</td>
                <td>'. $concert->getDate() . '</td>


                <form method="post" action="index.php">
                <input type="hidden" name="action" value="adminRedirection">
                <input type="hidden" name="step" value="updateConcert">
                <input type="hidden" name="type" value="concert">
                <input type="hidden" name="id" value="'. $concert->getIdConcert() .'">
                <td> <button class="adminTableAction" type="submit">
                <img class="adminIcon" src="view/img/edit.ico" />
                </button></td>
                </form>

                <form method="post" action="index.php">
                <input type="hidden" name="action" value="adminRedirection">
                <input type="hidden" name="step" value="deleteConcert">
                <input type="hidden" name="type" value="concert">
                <input type="hidden" name="id" value="'. $concert->getIdConcert() .'">
                <td> <button class="adminTableAction" type="submit">
                <img class="adminIcon" src="view/img/delete.ico" />
                </button></td>
                </form>
                </td></tr>
                ';
        }
    }

    function printAddConcert(){
        echo '
        <form method="POST" action="index.php">
        <label for="place">Lieu du concert :</label></br>
        <input type="text" style="width:50%" name="place" id="place" value="" required>
        <br><br>
        <label for="date">Date du concert :</label></br>
        <input type="text" style="width:50%" name="date" id="date" value="" required>
        <br><br>
        <input type="hidden" name="id_group" value="' . $this->selectGroup->getIdGroup() . '">
        <input type="hidden" name="action" value="adminRedirection" >
        <input type="hidden" name="step" value="addConcert" >
        <button type="submit">Ajouter le concert</button>
        </form>';
    }
}
