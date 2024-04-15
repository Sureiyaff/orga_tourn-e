<?php
require_once('pdo/database.php');
require_once('model/concert.php');

class ConcertPDO
{
    private array $data = array();

    // Return 1 concert from database
    public function read(int $id_concert): Concert
    {
        $MySQLQuery = 'SELECT * FROM `concert` WHERE id_concert = ?;';
        $stmt = DBConnection::getInstance()->prepare($MySQLQuery);
        $stmt->execute([$id_concert]);
        $concert = null;
        if (array_key_exists($id_concert, $this->data)) {
            $concert = $this->data[$id_concert];
        } else {
            $concert = $this->returnConcerts($stmt->fetchAll())[0];
        }
        return $concert;
    }
    
    // Return all concerts from database
    public function readAll(): array
    {
        $MySQLQuery = 'SELECT * FROM `concert`';
        $stmt = DBConnection::getInstance()->prepare($MySQLQuery);
        $stmt->execute();
        return $this->returnConcerts($stmt->fetchAll());
    }

    // Add new concert to database
    public function create(Concert $concert): int
    {
        $MySQLQuery = 'INSERT INTO `concert` (id_group, place, date)
        VALUES (?, ?, ?)';
        $stmt = DBConnection::getInstance()->prepare($MySQLQuery);
        $stmt->execute([
            $concert->getIdGroup(),
            $concert->getPlace(),
            $concert->getDate()
        ]);
        return DBConnection::getInstance()->lastInsertId();
    }

    // Update existing concert
    public function update(Concert $concert): bool
    {
        $res = false;
        $MySQLQuery = 'UPDATE `concert` SET id_group=?, place=?, date=? WHERE id_concert=?';
        $stmt = DBConnection::getInstance()->prepare($MySQLQuery);
        if ($stmt->execute([
            $concert->getIdGroup(),
            $concert->getPlace(),
            $concert->getDate(),
            $concert->getIdconcert()
        ])) {
            $res = true;
        }
        return $res;
    }

    // Return all concerts in $rows and update $data
    private function returnConcerts(array $rows): array
    {
        $concerts = [];
        foreach ($rows as $row) {
            $id_concert = $row['id_concert'];
            $id_group = $row['id_group'];
            $place = $row['place'];
            $date = $row['date'];
            $concert = new Concert($id_group, $place, $date, $id_concert);
            $concerts[] = $concert;
            $this->data[$id_concert] = $concert;
        }
        return $concerts;
    }

    public function delete($id_concert) {
        $MySQLQuery = 'DELETE FROM `concert` WHERE id_concert = ?;';
        $stmt = DBConnection::getInstance()->prepare($MySQLQuery);
        $stmt->execute([$id_concert]);
    }

    // Return all concerts from database
    public function getconcertsByGroupId($groupId): array
    {
        $MySQLQuery = 'SELECT * FROM concert WHERE id_group = :groupId';
        $stmt = DBConnection::getInstance()->prepare($MySQLQuery);
        $stmt->bindParam(':groupId', $groupId, PDO::PARAM_INT);
        $stmt->execute();
        return $this->returnconcerts($stmt->fetchAll());
    }
}
