<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;

class CatController extends Controller
{
    //
    function addCat(Request $req)
    {
        $cat= new Categories;
        $cat->nom=$req->input('nom');
        $cat->image=$req->file('file')->store('products');
        $cat->save();

        return $cat;
    }
    function list(){
        return Categories::all();
    }
    function delete($id){
        $result= Categories::where('id',$id)->delete();
        if($result){
            return ["result"=>"deleted"];
        }
        return $id;
    }

    function getCat($id){
        $result= Categories::find($id);
        if(!$result){
            return ["result"=>"doesnt exist"];
        }
        return $result;
    }

    function update(Request $req){
        $cate= Categories::find($req->id);
        $cate->nom = $req -> nom;
        if($req->hasFile('image')){
            $cate->image = $req->file('image')->store('products');
        }
        $cate->save();
        return $req->nom;

    }
}
