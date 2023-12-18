<?php

class Cart
{
  public function add(Product $product)
  {
    $inCart = false;
    $this->setTotal($product);
    if (count($this->getCart()) > 0) {
      foreach ($this->getCart() as $productInCart) {
        if ($productInCart->getId() === $product->getId()) {
          $quantity = $productInCart->getQuantity() + $product->getQuantity();
          $productInCart->setQuantity($quantity);
          $inCart = true;
          break;
        }
      }
    }

    if (!$inCart) {
      $this->setProductInCart($product);
    }
  }

  private function setProductInCart(Product $product): void
  {
    $_SESSION['cart']['products'][] = $product;
  }

  private function setTotal(Product $product): void
  {
    $_SESSION['cart']['total'] += $product->getPrice() * $product->getQuantity();
  }

  public function remove(int $id): void
  {
    if (isset($_SESSION['cart']['products'])) {
      foreach ($this->getCart() as $index => $product) {
        if ($product->getId() === $id) {
          unset($_SESSION['cart']['products'][$index]);
          $_SESSION['cart']['total'] -= $product->getPrice() * $product->getQuantity();
        }
      }
    }
  }

  public function getCart()
  {
    return $_SESSION['cart']['products'] ?? [];
  }

  public function getTotal()
  {
    return $_SESSION['cart']['total'] ?? [];
  }
}
