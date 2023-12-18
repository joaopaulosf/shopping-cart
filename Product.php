<?php

class Product
{
  public int $id;
  public string $name;
  public int $price;
  public int $quantity;

  public function setId(int $id)
  {
    $this->id = $id;
  }

  public function setName(string $name)
  {
    $this->name = $name;
  }

  public function setPrice(int $price)
  {
    $this->price = $price;
  }

  public function setQuantity(int $quantity)
  {
    $this->quantity = $quantity;
  }

  public function getId()
  {
    return $this->id;
  }

  public function getName()
  {
    return $this->name;
  }

  public function getPrice()
  {
    return $this->price;
  }

  public function getQuantity()
  {
    return $this->quantity;
  }
}
