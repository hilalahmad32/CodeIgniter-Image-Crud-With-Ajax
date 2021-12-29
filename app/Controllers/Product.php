<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Product as ModelsProduct;

class Product extends BaseController
{
    public function index()
    {
        return view('product/index');
    }


    public function store()
    {
        $product = new ModelsProduct();
        $file = $this->request->getFile('file');
        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move("uploads/", $newName);
        }
        $data = [
            'title' => $this->request->getVar('title'),
            'pro_image' => $newName,
        ];

        $result = $product->save($data);
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function getData()
    {
        $products = new ModelsProduct();
        $results = $products->orderBy('id', 'DESC')->findAll();
        $output = "";
        foreach ($results as $product) {
            $output .= "<tr>
            <td>{$product['id']}</td>
            <td>{$product['title']}</td>
            <td><img src='uploads/{$product['pro_image']}' alt='{$product['pro_image']}' style='width:70px;height:70px;'></td>
            <td><button class='btn btn-success' data-toggle='modal' data-id='{$product['id']}' id='edit-product' data-target='#update-product'>Edit</button></td>
            <td><button data-id='{$product['id']}' id='delete-product' class='btn btn-danger'>Delete</button></td>
        </tr>";
        }
        echo $output;
    }

    public function edit()
    {
        $id = $this->request->getVar('id');
        $products = new ModelsProduct();
        $product = $products->find($id);
        $output = "
        <div class='form-group'>
        <label for='title'>Title</label>
        <input type='text' class='form-control' name='title' value='{$product['title']}' placeholder='Enter Title' id='edit_title'>
        <input type='text' class='form-control' placeholder='Enter Title' value='{$product['id']}' id='id' name='id'>
    </div>
    <div class='form-group'>
        <label for='file'>Image:</label>
        <input type='file' class='form-control-file border' name='new_image' id='new_image'>
        <img src='uploads/{$product['pro_image']}' alt='{$product['pro_image']}' style='width:70px;height:70px;'>
        <input type='text' value='{$product['pro_image']}' class='form-control-file border' name='old_image' id='old_image'>
    </div>";

        echo $output;
    }

    public function update()
    {
        $products=new ModelsProduct();
       
        // $product=$products->find($id);
        $new_image = $this->request->getFile('new_image');
        $old_image = $this->request->getVar('old_image');
        $newImage="";
        if ($new_image != "") {
            $path = "uploads/" . $old_image;
            if (file_exists($path)) {
                unlink($path);
            }
            if($new_image->isValid() && ! $new_image->hasMoved()){  
                $newImage = $new_image->getRandomName();
                $new_image->move("uploads/", $newImage);
            }
        }else{  
            $newImage=$old_image;
        }

        $data=[  
            'id'=>$this->request->getVar('id'),
            'title'=>$this->request->getVar('title'),
            'pro_image'=>$newImage,
        ];
        $result=$products->save($data);
        if($result) {
            echo 1;
        }else{  
            echo 0;
        }
    }

    public function delete()
    {
        $id = $this->request->getVar('id');

        $products = new ModelsProduct();
        $get = $products->find($id);
        $path = "uploads/" . $get['pro_image'];
        if (file_exists($path)) {
            unlink($path);
        }
        $result = $products->delete($id);
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    }
}
