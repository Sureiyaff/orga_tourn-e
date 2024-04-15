<?php

class AdminDeleteConcert
{
    private $concert;

    function __construct()
    {
        $type = $_POST["type"];
        $id = $_POST["id"];
        switch ($type) {
            case 'concert':
                $concertPDO = new ConcertPDO();
                $this->concert = $concertPDO->read($id);
                break;
        }
    }

    function printDeleteResult()
    {
        if ($this->concert != null) {
            $concertPDO = new ConcertPDO();
            $concertPDO->delete($this->concert->getIdConcert());
            echo '<p>Le concert a été supprimé</br><a href="index.php?action=adminRedirection&step=view">Retour</a></p>';
        }
    }
}
