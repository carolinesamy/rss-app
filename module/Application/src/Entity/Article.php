<?php
namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * This class represents a single article in a rss.
 * @ORM\Entity
 * @ORM\Table(name="article")
 */
class Article
{
  /**
   * @ORM\Id
   * @ORM\GeneratedValue
   * @ORM\Column(name="id")
   */
  protected $id;

  /**
   * @ORM\Column(name="name")
   */
  protected $name;

  /**
   * @ORM\Column(name="description")
   */
  protected $description;

  /**
   * @ORM\Column(name="link")
   */
  protected $link;

  /**
   * @ORM\Column(name="date")
   */
  protected $date;

  // Returns ID of this article.
  public function getId()
  {
    return $this->id;
  }

  // Sets ID of this article.
  public function setId($id)
  {
    $this->id = $id;
  }

  // Returns name.
  public function getName()
  {
    return $this->name;
  }

  // Sets name.
  public function setName($name)
  {
    $this->name = $name;
  }

  // Returns link.
  public function getLink()
  {
    return $this->link;
  }

  // Sets link.
  public function setLink($link)
  {
    $this->link = $link;
  }

  // Returns article description.
  public function getDescription()
  {
    return $this->description;
  }

  // Sets article description.
  public function setDescription($description)
  {
    $this->description = $description;
  }

  // Returns the date when this article was created.
  public function getDate()
  {
    return $this->date;
  }

  // Sets the date when this article was created.
  public function setDate($date)
  {
    $this->date = $date;
  }
}
