<?php

class Book extends AbstractEntity
{
    private ?int $id_user = null;
    private ?string $picture = null;
    private ?string $title = null;
    private ?string $autor = null;
    private ?string $comment = null;
    private ?bool $disponibility = false;

        /**
     * Get the value of id_user
     */ 
    public function getId_user(): ?int
    {
        return $this->id_user;
    }

    /**
     * Set the value of id_user
     *
     * @return  self
     */ 
    public function setId_user(?int $id_user)
    {
        $this->id_user = $id_user;

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
    public function getDisponibility(): ?bool
    {
        return $this->disponibility;
    }

    /**
     * Set the value of disponibility
     *
     * @return  self
     */ 
    public function setDisponibility(?bool $disponibility)
    {
        $this->disponibility = $disponibility;

        return $this;
    }
}