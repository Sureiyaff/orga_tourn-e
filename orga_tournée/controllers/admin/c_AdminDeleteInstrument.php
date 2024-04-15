<?php

class AdminDeleteInstrument
{
    private $instrument;

    function __construct()
    {
        $type = $_POST["type"];
        $id = $_POST["id"];
        switch ($type) {
            case 'instrument':
                $instrumentPDO = new InstrumentPDO();
                $this->instrument = $instrumentPDO->read($id);
                break;
        }
    }

    function printDeleteResult()
    {
        if ($this->instrument != null) {
            $instrumentPDO = new InstrumentPDO();
            $instrumentPDO->delete($this->instrument->getIdinstrument());
            echo '<p>L\'instrument a été supprimé</br><a href="index.php?action=adminRedirection&step=view">Retour</a></p>';
        }
    }
}
