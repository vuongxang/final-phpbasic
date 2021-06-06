<?php

namespace Mvc\Controllers;

class ProductController extends BaseController
{
    public $folder = 'product';

    public function view($id = null)
    {
        $product = \Mvc\Models\Product::getById($id);
        $this->render('view', [
            'product' => $product
        ]);
    }

    public function listing()
    {
        $products = \Mvc\Models\Product::all();
        // $model = new \Mvc\Models\Product([
        //     'id'=>null,'name'=>'ccc','description'=>'ccccccccccc'
        // ]);
        // $model->create();
        // die;

        $this->render('list', [
            'title' => 'product listing',
            'products' => $products
        ]);

        # $title = 'abc'
        # $products
    }
}
