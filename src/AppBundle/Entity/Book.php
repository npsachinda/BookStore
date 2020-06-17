<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="books")
 */

class Book
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\Column(type = "text") 
     */
    private $description;

        /**
     * @ORM\Column(type="string", length=30)
     */
    private $isbn;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $language;

    /**
    * @ORM\Column(type="decimal", precision=7, scale=2)
    */
    private $unit_price;

      /**
     * @ORM\Column(type = "text") 
     */
    private $preview_img_path;

        /**
     * @ORM\Column(type="integer")
     */
    private $stock;

    /**
     * @ORM\Column(type="string", length=30)
    */
    private $created_by;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\OneToOne(targetEntity=Category::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    /**
     * @ORM\ManyToOne(targetEntity=Author::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $author;

    /**
     * @ORM\ManyToOne(targetEntity=Publication::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $publication;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(Category $category): self
    {
        $this->category = $category;

        return $this;
    }


    /**
     * Get name
     *
     * @return name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get ipreview_img_pathd
     *
     * @return preview_img_path
     */
    public function getPreview_img_path()
    {
        return $this->preview_img_path;
    }

    /**
     * Get unit_price
     *
     * @return unit_price
     */
    public function getUnit_price()
    {
        return $this->unit_price;
    }

    /**
     * Get language
     *
     * @return language
     */
    public function getLanguage()
    {
        return $this->language;
    }

     /**
     * Get description
     *
     * @return description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get isbn
     *
     * @return isbn
     */
    public function getIsbn()
    {
        return $this->isbn;
    }

    public function getAuthor(): ?Author
    {
        return $this->author;
    }

    public function setAuthor(?Author $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getPublication(): ?Publication
    {
        return $this->publication;
    }

    public function setPublication(?Publication $publication): self
    {
        $this->publication = $publication;

        return $this;
    }


}

