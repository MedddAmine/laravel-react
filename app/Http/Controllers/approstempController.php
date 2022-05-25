<?php

namespace App\Http\Controllers;
use App\Models\Approstemp;
use App\Models\Produits;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


class approstempController extends Controller
{
    //
    function addprod($id){
        $produit= new Approstemp;
        $result= Produits::find($id);
        if(Approstemp::where('id', '=', $id)->exists()){
            return 3;
        }

        $produit->reference=$result->reference;
        $produit->Produit=$result->libelle;
        $produit->idprod=$result->id;
        $produit->save();


        return $produit;
    }
    function list(){
        return Approstemp::all();
    }
    function deleteall(){
        Approstemp::truncate();
        return 'all';


    }
    function delete($id){
        $result= Approstemp::where('id',$id)->delete();
        if($result){
            return ["result"=>"deleted"];
        }
        return $id;
    }

    function setQnt($id, $qnt){
        $result= Approstemp::find($id);
        $result->Quantite = $qnt;
        $result->save();
        
        
        return $id;
    }
}
