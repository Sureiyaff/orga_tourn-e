<?php

class Artist
{
    private int $id_artist;
    private int $id_group;
    private string $name;
    
    public function __construct(int $id_group, string $name, int $id_artist = -1)
    {
        $this->id_artist = $id_artist;
        $this->id_group = $id_group;
        $this->name = $name;
    }

    public function getIdArtist(): int
    {
        return $this->id_artist;
    }

    public function getIdGroup(): int
    {
        return $this->id_group;
    }

    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name 
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param string $id_group 
     * @return self
     */
    public function setId_Group(string $id_group): self
    {
        $this->id_group = $id_group;
        return $this;
    }

    /**
     * @param int $id_artist 
     * @return self
     */
    public function setId_Artist(int $id_artist): self
    {
        $this->id_artist = $id_artist;
        return $this;
    }
}
