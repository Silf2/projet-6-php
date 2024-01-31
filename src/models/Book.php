<?php

class Book extends AbstractEntity
{
    private ?int $idUser = -1;
    private ?string $picture = null;
    private ?string $title = null;
    private ?string $autor = null;
    private ?string $comment = null;
    private ?string $disponibility = null;
    private ?string $username = null;

        /**
     * Get the value of IdUser
     */ 
    public function getIdUser(): ?int
    {
        return $this->idUser;
    }

    /**
     * Set the value of IdUser
     *
     * @return  self
     */ 
    public function setIdUser(?int $idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get the value of picture
     */ 
    public function getPicture(): ?string
    {
        return $this->picture;
    }

    /**
     * Set the value of picture
     *
     * @return  self
     */ 
    public function setPicture(?string $picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get the value of title
     */ 
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle(?string $title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of autor
     */ 
    public function getAutor(): ?string
    {
        return $this->autor;
    }

    /**
     * Set the value of autor
     *
     * @return  self
     */ 
    public function setAutor(?string $autor)
    {
        $this->autor = $autor;

        return $this;
    }

    /**
     * Get the value of comment
     */ 
    public function getComment(): ?string
    {
        return $this->comment;
    }

    /**
     * Set the value of comment
     *
     * @return  self
     */ 
    public function setComment(?string $comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get the value of disponibility
     */ 
    public function getDisponibility(): ?string
    {
        return $this->disponibility;
    }

    /**
     * Set the value of disponibility
     *
     * @return  self
     */ 
    public function setDisponibility(?string $disponibility)
    {
        $this->disponibility = $disponibility;

        return $this;
    }

    /**
     * Get the value of username
     */ 
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */ 
    public function setUsername(?string $username)
    {
        $this->username = $username;

        return $this;
    }
}