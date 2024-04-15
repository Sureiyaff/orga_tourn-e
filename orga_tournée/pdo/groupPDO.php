<?php
require_once('pdo/database.php');
require_once('model/group.php');

class GroupPDO
{
    private array $data = array();

    // Return 1 group from database
    public function read(int $id_group): Group
    {
        $MySQLQuery = 'SELECT * FROM `group` WHERE id_group = ?;';
        $stmt = DBConnection::getInstance()->prepare($MySQLQuery);
        $stmt->execute([$id_group]);
        $group = null;
        if (array_key_exists($id_group, $this->data)) {
            $group = $this->data[$id_group];
        } else {
            $group = $this->returnGroups($stmt->fetchAll())[0];
        }
        return $group;
    }
    
    // Return all groups from database
    public function readAll(): array
    {
        $MySQLQuery = 'SELECT * FROM `group`';
        $stmt = DBConnection::getInstance()->prepare($MySQLQuery);
        $stmt->execute();
        return $this->returnGroups($stmt->fetchAll());
    }

    // Add new group to database
    public function create(Group $group): int
    {
        $MySQLQuery = 'INSERT INTO `group` (name,description,picture)
        VALUES (?, ?, ?)';
        $stmt = DBConnection::getInstance()->prepare($MySQLQuery);
        $stmt->execute([
            $group->getName(),
            $group->getDescription(),
            $group->getPicture()
        ]);
        return DBConnection::getInstance()->lastInsertId();
    }

    // Update existing group
    public function update(Group $group): bool
    {
        $res = false;
        $MySQLQuery = 'UPDATE `group` SET name=?, description=?, picture=? WHERE id_group=?';
        $stmt = DBConnection::getInstance()->prepare($MySQLQuery);
        if ($stmt->execute([
            $group->getName(),
            $group->getDescription(),
            $group->getPicture(),
            $group->getIdGroup()
        ])) {
            $res = true;
        }
        return $res;
    }

    // Return all groups in $rows and update $data
    private function returnGroups(array $rows): array
    {
        $groups = [];
        foreach ($rows as $row) {
            $id_group = $row['id_group'];
            $name = $row['name'];
            $description = $row['description'];
            $picture = $row['picture'];
            $group = new Group($name, $description, $picture, $id_group);
            $groups[] = $group;
            $this->data[$id_group] = $group;
        }
        return $groups;
    }

    public function delete($id_group) {
        $MySQLQuery = 'DELETE FROM `group` WHERE id_group = ?;';
        $stmt = DBConnection::getInstance()->prepare($MySQLQuery);
        $stmt->execute([$id_group]);
    }

    public function readGroupName(int $id_group): string
    {
        $MySQLQuery = 'SELECT name FROM `group` WHERE id_group = ?;';
        $stmt = DBConnection::getInstance()->prepare($MySQLQuery);
        $stmt->execute([$id_group]);
        $groupData = $stmt->fetch(PDO::FETCH_ASSOC);
        return $groupData['name'];
    }
}
