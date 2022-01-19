<?php
//builder design pattern

//product
class Product{
    public $name;
    public $description;
    public $price;
}

class Order extends Cookie{
    public function __toString(){
        return '<h1>//.</h1>'.'<pre>'. var_export($this, true).'</pre>';
    }
}

//builder interface
interface ProductBuilder{
    public function addName();
    public function addPrice();
    public function addQuantity();

    public function getProduct();
}

//concrete buiders
class OrderBuilder implements ProductBuilder{
    private $product;
    private $options;

    public function __construct(array $options){
        $this->options = $options;
        $this->product = new Order();
    }

    public function addName(){
        $this->product->name = $this->options['name'];
    }

    public function addPrice(){
        $this->product->price = $this->options['price'];
    }

    public function addQuantity(){
        $this->product->quantity = $this->options['quantity'];
    }

    public function getProduct(){
        return $this->product;
    }
}

//director
class ProductCreator{
    public function buildProduct(ProductBuilder $builder){
        $builder->addName();
        $builder->addPrice();
        $builder->addQuantity();

        return $builder->getProduct();
    }
}
