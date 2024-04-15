<?php

class AdminUpdateInstrument
{
    private $InstrumentToUpdate;

    function __construct()
    {
        $instrumentID = intval($_POST["id"]);
        $instrumentPDO = new InstrumentPDO();
        $this->instrumentToUpdate = $instrumentPDO->read($instrumentID);
    }

    function printUpdateInstrumentForm()
    {
        echo '
        <form method="POST" action="index.php">
        <label for="Instrumentname">Nom de l\'Instrument :</label></br>
        <input type="text" style="width:50%" name="Instrumentname" id="Instrumentname" value="' .
            $this->instrumentToUpdate->getName() . '" required>
        <br><br>
        <label for="Instrumentname">Poids :</label></br>
        <input type="text" style="width:50%" name="Instrumentweight" id="Instrumentweight" value="' .
        $this->instrumentToUpdate->getWeight() . '" required>
        <br><br>
        <label for="Instrumentname">Volume :</label></br>
        <input type="text" style="width:50%" name="Instrumentvolume" id="Instrumentvolume" value="' .
        $this->instrumentToUpdate->getVolume() . '" required>
        <br><br>
        <input type="hidden" name="id_instrument" value="' . $this->instrumentToUpdate->getIdInstrument() . '">
        <input type="hidden" name="id_artist" value="' . $this->instrumentToUpdate->getIdArtist() . '">
        <input type="hidden" name="action" value="adminRedirection" >
        <input type="hidden" name="step" value="updateInstrumentAction" >
        <button type="submit">Modifier le Instrumente</button>
        </form>';
    }
}
