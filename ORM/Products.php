<?php
class Products Extends ORM
{
    public function __construct()
    {
        parent::__construct();
        $this->setTable('products');
    }
}