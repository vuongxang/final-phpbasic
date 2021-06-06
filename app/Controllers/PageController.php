<?php

namespace Mvc\Controllers;
use Mvc\Models\Product;
use Mvc\Models\Category;
use Mvc\Models\Color;

class PageController extends BaseController
{
    public $folder = 'page';

    public function home()
    {
        $products = Product::all();
        $categories = Category::all();
        $colors = Color::all();
        $cate = Category::where('parent','=',0);


        $this->render('home',[
            'products'=> $products,
            'categories'=>$categories,
            'colors'=>$colors,
        ]);
    }

    public function contact()
    {
        // $product = \Mvc\Models\Product::getById(3);
        $this->render('contact',
            [
                'title' => 'Thanks you',
                'email' => 'kienpt2@smartosc.com',
                'skype' => 'live:phamkienct',
            ]);
    }

    public function page404()
    {
        echo "Page khong ton tai";
    }
    public function demo(){
        echo  "page demo";
    }
}
