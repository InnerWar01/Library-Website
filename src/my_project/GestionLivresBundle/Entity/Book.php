<?php

namespace my_project\GestionLivresBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="my_project\GestionLivresBundle\Repository\BookRepository")
 * @ORM\Table(name="book")
 */

class Book
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     */
    private $isbn;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $title;

    /**
     * @ORM\Column(type="float")
     * @Assert\NotBlank()
     */
    private $price;

    /**
     * @return mixed
     */
    public function getIsbn()
    {
        return $this->isbn;
    }

    /**
     * @param mixed $isbn
     */
    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }
}