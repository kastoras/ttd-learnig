<?php 

class Product{

    protected $addLoggerCallable = [Logger::class, 'log'];

    public function setLoggerCallable(callable $callable)
    {
        $this->addLoggerCallable = $callable;
    }

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    public function fetchProductById($id)
    {
        $product = 'product 1';

        $this->session->write($product);

        //Logger::log($product);
        call_user_func($this->addLoggerCallable, $product);

        return $product;
    }
}