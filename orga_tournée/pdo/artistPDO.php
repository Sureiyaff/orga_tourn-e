<?php
require_once('pdo/database.php');
require_once('model/artist.php');

class ArtistPDO
{
    private array $data = array();

    // Return 1 artist from database
    public function read(int $id_artist): Artist
    {
        $MySQLQuery = 'SELECT * FROM `artist` WHERE id_artist = ?;';
        $stmt = DBConnection::getInstance()->prepare($MySQLQuery);
        $stmt->execute([$id_artist]);
        $artist = null;
        if (array_key_exists($id_artist, $this->data)) {
            $artist = $this->data[$id_artist];
        } else {
            $artist = $this->returnArtists($stmt->fetchAll())[0];
        }
        return $artist;
    }
    
    // Return all artists from database
    public function readAll(): array
    {
        $MySQLQuery = 'SELECT * FROM `artist`';
        $stmt = DBConnection::getInstance()->prepare($MySQLQuery);
        $stmt->execute();
        return $this->returnArtists($stmt->fetchAll());
    }

    // Add new artist to database
    public function create(Artist $artist): int
    {
        $MySQLQuery = 'INSERT INTO `artist` (id_group, name)
        VALUES (?, ?)';
        $stmt = DBConnection::getInstance()->prepare($MySQLQuery);
        $stmt->execute([
            $artist->getIdGroup(),
            $artist->getName()
        ]);
        return DBConnection::getInstance()->lastInsertId();
    }

    // Update existing artist
    public function update(Artist $artist): bool
    {
        $res = false;
        $MySQLQuery = 'UPDATE `artist` SET id_group=?, name=? WHERE id_artist=?';
        $stmt = DBConnection::getInstance()->prepare($MySQLQuery);
        if ($stmt->execute([
            $artist->getIdGroup(),
            $artist->getName(),
            $artist->getIdArtist()
        ])) {
            $res = true;
        }
        return $res;
    }

    // Return all artists in $rows and update $data
    private function returnartists(array $rows): array
    {
        $artists = [];
        foreach ($rows as $row) {
            $id_artist = $row['id_artist'];
            $id_group = $row['id_group'];
            $name = $row['name'];
            $artist = new Artist($id_group, $name, $id_artist);
            $artists[] = $artist;
            $this->data[$id_artist] = $artist;
        }
        return $artists;
    }

    public function delete($id_artist) {
        $MySQLQuery = 'DELETE FROM `artist` WHERE id_artist = ?;';
        $stmt = DBConnection::getInstance()->prepare($MySQLQuery);
        $stmt->execute([$id_artist]);
    }

    // Return all artists from database
    public function getArtistsByGroupId($groupId): array
    {
        $MySQLQuery = 'SELECT * FROM artist WHERE id_group = :groupId';
        $stmt = DBConnection::getInstance()->prepare($MySQLQuery);
        $stmt->bindParam(':groupId', $groupId, PDO::PARAM_INT);
        $stmt->execute();
        return $this->returnArtists($stmt->fetchAll());
    }
}
