<?php

class Message extends AbstractEntity{
    private ?string $content = null;
    private ?int $idAutor = -1;
    private ?int $idRecipient = -1;
    private ?DateTime $date = null;


    /**
     * Get the value of content
     */ 
    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * Set the value of content
     *
     * @return  self
     */ 
    public function setContent(?string $content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get the value of idAutor
     */ 
    public function getIdAutor(): ?int
    {
        return $this->idAutor;
    }

    /**
     * Set the value of idAutor
     *
     * @return  self
     */ 
    public function setIdAutor(?int $idAutor)
    {
        $this->idAutor = $idAutor;

        return $this;
    }

    /**
     * Get the value of idRecipient
     */ 
    public function getIdRecipient(): ?int
    {
        return $this->idRecipient;
    }

    /**
     * Set the value of idRecipient
     *
     * @return  self
     */ 
    public function setIdRecipient(?int $idRecipient)
    {
        $this->idRecipient = $idRecipient;

        return $this;
    }

    /**
     * Get the value of date
     */ 
    public function getDate(): ?DateTime
    {
        var_dump($this->date);
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */ 
    public function setDateCreation(string|DateTime $date, string $format = 'Y-m-d H:i:s') : void 
    {
        if (is_string($date)) {
            $date = DateTime::createFromFormat($format, $date);
        }
        $this->date = $date;
    }

    public function getOnlyDate() 
    {
        $dateTime = $this->getDate();
        var_dump($dateTime);
        return $dateTime->format('d/m/Y');
    }

    public function getOnlyTime()
    {
        return $this->date->format('H:i:s');
    }
}