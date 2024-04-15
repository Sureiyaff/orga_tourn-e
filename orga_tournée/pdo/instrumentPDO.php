<?php
require_once('pdo/database.php');
require_once('model/instrument.php');

class InstrumentPDO
{
    private array $data = array();

    // Return 1 instrument from database
    public function read(int $id_instrument): Instrument
    {
        $MySQLQuery = 'SELECT * FROM `instrument` WHERE id_instrument = ?;';
        $stmt = DBConnection::getInstance()->prepare($MySQLQuery);
        $stmt->execute([$id_instrument]);
        $instrument = null;
        if (array_key_exists($id_instrument, $this->data)) {
            $instrument = $this->data[$id_instrument];
        } else {
            $instrument = $this->returnInstruments($stmt->fetchAll())[0];
        }
        return $instrument;
    }
    
    // Return all instruments from database
    public function readAll(): array
    {
        $MySQLQuery = 'SELECT * FROM `instrument`';
        $stmt = DBConnection::getInstance()->prepare($MySQLQuery);
        $stmt->execute();
        return $this->returnInstruments($stmt->fetchAll());
    }

    // Add new instrument to database
    public function create(Instrument $instrument): int
    {
        $MySQLQuery = 'INSERT INTO `instrument` (id_artist, name, weight, volume)
        VALUES (?, ?, ?, ?)';
        $stmt = DBConnection::getInstance()->prepare($MySQLQuery);
        $stmt->execute([
            $instrument->getIdArtist(),
            $instrument->getName(),
            $instrument->getWeight(),
            $instrument->getVolume()
        ]);
        return DBConnection::getInstance()->lastInsertId();
    }

    // Update existing instrument
    public function update(Instrument $instrument): bool
    {
        $res = false;
        $MySQLQuery = 'UPDATE `instrument` SET id_artist=?, name=?, weight=?, volume=? WHERE id_instrument=?';
        $stmt = DBConnection::getInstance()->prepare($MySQLQuery);
        if ($stmt->execute([
            $instrument->getIdArtist(),
            $instrument->getName(),
            $instrument->getWeight(),
            $instrument->getVolume(),
            $instrument->getIdInstrument()
        ])) {
            $res = true;
        }
        return $res;
    }

    // Return all instruments in $rows and update $data
    private function returninstruments(array $rows): array
    {
        $instruments = [];
        foreach ($rows as $row) {
            $id_instrument = $row['id_instrument'];
            $id_group = $row['id_artist'];
            $name = $row['name'];
            $weight = $row['weight'];
            $volume = $row['volume'];
            $instrument = new Instrument($id_group, $name, $weight, $volume, $id_instrument);
            $instruments[] = $instrument;
            $this->data[$id_instrument] = $instrument;
        }
        return $instruments;
    }

    public function delete($id_instrument) {
        $MySQLQuery = 'DELETE FROM `instrument` WHERE id_instrument = ?;';
        $stmt = DBConnection::getInstance()->prepare($MySQLQuery);
        $stmt->execute([$id_instrument]);
    }

    // Return all instruments from database
    public function getinstrumentsByartistId($artistId): array
    {
        $MySQLQuery = 'SELECT * FROM instrument WHERE id_artist = :artistId';
        $stmt = DBConnection::getInstance()->prepare($MySQLQuery);
        $stmt->bindParam(':artistId', $artistId, PDO::PARAM_INT);
        $stmt->execute();
        return $this->returninstruments($stmt->fetchAll());
    }
}
