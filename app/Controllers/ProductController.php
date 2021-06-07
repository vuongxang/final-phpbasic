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

        $error = [];
        $pro = Product::where("name","=",$name)[0];
        if(isset($pro)) {
            $error['name_error'] = "Product name already exist";
        }
        if(empty($price)) {
            $error['price_error'] = "Price is required";
        }
        if(empty($image)){
            $error['image_error'] = "Image is required";
        }
        if(empty($cate_id)){
            $error['cate_id'] = "Category is not checked";
        }
        if(empty($color_id)){
            $error['$color_id'] = "Color is not checked";
        }

        if($error){
            $products = Product::all();
            $categories = Category::all();
            $colors = Color::all();
            $title = "PRODUCT LIST";
            $this->folder = 'page';

            if(isset($_GET['cate_id'])){
                $cate_id = $_GET['cate_id'];
                $products = Product::findProductByCateId($cate_id);
                $title = Category::getById($cate_id)->getName();
            }

            $this->render('home',[
                'products'=> $products,
                'categories'=>$categories,
                'colors'=>$colors,
                'title'=>$title,
                'error'=>$error,
            ]);
            die;
        }
        $model = new Product([
            'id'=>null,
            'name'=>$name,
            'description'=>$description,
            'image' => $image,
            'price'=>$price
        ]);

        if($model){
            $model->save();
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
