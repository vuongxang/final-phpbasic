<?php

namespace Mvc\Controllers;

use Mvc\Models\Category;
use Mvc\Models\Color;
use Mvc\Models\Product;
use Mvc\Models\ProCate;
use Mvc\Models\ProColor;

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

        $this->render('list', [
            'title' => 'product listing',
            'products' => $products
        ]);

        # $title = 'abc'
        # $products
    }

    public function store()
    {

        extract($_REQUEST);

        if ($_FILES['image']['size'] > 0) {
            $image = $_FILES['image']['name'];
        } else {
            $image = "";
        }

        if (!empty($image)) {
            move_uploaded_file($_FILES['image']['tmp_name'], "./public/images/" . $image);
        }
        
        $image = "./public/images/" . $image;

        $model = new Product([
            'id'=>null,
            'name'=>$name,
            'description'=>$description,
            'image' => $image,
            'price'=>$price
        ]);

        if($model){
            $model->create();
        }

        //Luu danh sach category pro_cate
        //Lay san pham vua tao
        $pro = Product::where("name","=",$name)[0];
        //Luu danh muc da chon vao pro_cate
        if($cate_id){
            foreach($cate_id as $value){
                $pro_cate = new ProCate([
                    'id'=>null,
                    'pro_id'=>$pro->id,
                    'cate_id'=>$value
                ]);
                $pro_cate->store();
            }
        }
        //Luu mau da chon vao pro_color
        if($color_id){
            foreach($color_id as $value){
                $pro_color = new ProColor([
                    'id'=>null,
                    'pro_id'=>$pro->id,
                    'color_id'=>$value
                ]);
                $pro_color->store();
            }
        }

        if($pro){
            header("location:?scope=page&action=home&message=Create Succesfuly!");
        }
    }
}
