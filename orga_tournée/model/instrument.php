<?php

class Instrument
{
    private int $id_instrument;
    private int $id_artist;
    private string $name;
    private int $weight;
    private int $volume;
    
    public function __construct(int $id_artist, string $name, int $weight, int $volume, int $id_instrument = -1)
    {
        $this->id_instrument = $id_instrument;
        $this->id_artist = $id_artist;
        $this->name = $name;
        $this->weight = $weight;
        $this->volume = $volume;
    }

    public function getIdInstrument(): int
    {
        return $this->id_instrument;
    }

    public function getIdArtist(): int
    {
        return $this->id_artist;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getWeight(): string
    {
        return $this->weight;
    }

    public function getVolume(): string
    {
        return $this->volume;
    }

    /**
     * @param int $id_artist 
     * @return self
     */
    public function setIdArtist(int $id_artist): self
    {
        $this->id_artist = $id_artist;
        return $this;
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
     * @param int $weight
     * @return self
     */
    public function setWeight(int $weight): self
    {
        $this->weight= $weight;
        return $this;
    }

        /**
     * @param int $volume
     * @return self
     */

    public function setVolume(int $volume): self
    {
        $this->volume= $volume;
        return $this;
    }

    /**
     * @param int $id_instrument 
     * @return self
     */
    public function setId_Instrument(int $id_instrument): self
    {
        $this->id_instrument = $id_instrument;
        return $this;
    }
}
