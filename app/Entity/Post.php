<?php

namespace App\Entity;

class Post
{
  /**
   * @var array
   */
  private $data;

  public function __construct (array $data)
  {
    $this->data = $data;
  }

  public function getId () {
    return $this->data['id'];
  }
}