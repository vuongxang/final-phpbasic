<?php

namespace Mvc\Controllers;
use Mvc\Models\Product;
use Mvc\Models\Category;
use Mvc\Models\Color;
use Mvc\Models\ProCate;

class PageController extends BaseController
{
    public $folder = 'page';

    public function home()
    {

        $products = Product::paginator();
        echo "<pre>";
        var_dump($products); 
        echo "</pre>";
        die;

        $products = Product::all();
        $categories = Category::all();
        $colors = Color::all();
        $title = "PRODUCT LIST";

        if(isset($_GET['cate_id'])){
            $cate_id = $_GET['cate_id'];
            $products = Product::findProductByCateId($cate_id);
            $title = Category::getById($cate_id)->getName();
        }

        $this->render('home',[
            'products'=> $products,
            'categories'=>$categories,
            'colors'=>$colors,
            'title'=>$title
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
    public function searchProduct(){
        $keyword = $_POST['keyword'];

        $products = Product::search($keyword);
        echo json_encode($products);
        die;
    }

    public function filterByColor(){
        $colors = $_POST['colors'];
        $products = Product::filterByColor($colors);
        echo json_encode($products);
        die;
    }
}
