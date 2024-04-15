<?php

class Group
{
    private int $id_group;
    private string $name;
    private string $description;
    private string $picture;
    
    public function __construct(string $name, string $description, string $picture, int $id_group = -1)
    {
        $this->id_group = $id_group;
        $this->name = $name;
        $this->description = $description;
        $this->picture = $picture;
    }

    public function getIdGroup(): int
    {
        return $this->id_group;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getPicture(): string
    {
        return $this->picture;
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
     * @param string $description
     * @return self
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @param string $picture
     * @return self
     */
    public function setPicture(int $picture): self
    {
        $this->picture = $picture;
        return $this;
    }

    /**
     * @param int $id_group 
     * @return self
     */
    public function setId_group(int $id_group): self
    {
        $this->id_group = $id_group;
        return $this;
    }
}
