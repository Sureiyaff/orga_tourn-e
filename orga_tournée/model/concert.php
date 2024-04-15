<?php

class Concert
{
    private int $id_concert;
    private int $id_group;
    private string $place;
    private string $date;
    
    public function __construct(int $id_group, string $place, string $date, int $id_concert = -1)
    {
        $this->id_concert = $id_concert;
        $this->id_group = $id_group;
        $this->place = $place;
        $this->date = $date;
    }

    public function getIdConcert(): int
    {
        return $this->id_concert;
    }

    public function getIdGroup(): int
    {
        return $this->id_group;
    }

    public function getPlace(): string
    {
        return $this->place;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @param int $id_group 
     * @return self
     */
    public function setId_Group(int $id_group): self
    {
        $this->id_group = $id_group;
        return $this;
    }

    /**
     * @param string $place 
     * @return self
     */
    public function setPlace(string $place): self
    {
        $this->place = $place;
        return $this;
    }

    /**
     * @param string $date
     * @return self
     */
    public function setDate(int $date): self
    {
        $this->date= $date;
        return $this;
    }

    /**
     * @param int $id_concert 
     * @return self
     */
    public function setId_Concert(int $id_concert): self
    {
        $this->id_concert = $id_concert;
        return $this;
    }
}
