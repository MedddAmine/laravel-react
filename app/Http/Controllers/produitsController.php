<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Produits;

class produitsController extends Controller
{
    //
    function addProduct(Request $req)
    {
        $produit= new Produits;
        $produit->reference=$req->input('reference');
        $produit->libelle=$req->input('libelle');
        $produit->prix_achat=$req->input('prix_a');
        $produit->prix_vente=$req->input('prix_v');
        $produit->qte_stock=$req->input('quantite');
        $produit->image=$req->file('file')->store('products');
        $produit->cat_id=$req->input('categorie');
        $produit->save();

        return $produit;
    }
    function list(){
        return Produits::all();
    }
    function delete($id){
        $result= Produits::where('id',$id)->delete();
        if($result){
            return ["result"=>"deleted"];
        }
        return $id;
    }
    function getProd($id){
        $result= Produits::find($id);
        if(!$result){
            return ["result"=>"doesnt exist"];
        }
        return $result;
    }
    function update(Request $req){
        $produits= Produits::find($req->id);
        $produits->reference = $req -> reference;
        $produit->libelle=$req->libelle;
        $produit->prix_achat=$req->prix_achat;
        $produit->prix_vente=$req->prix_vente;
        $produit->qte_stock=$req->quantite;
        $produit->cat_id=$req->categorie;
        if($req->hasFile('image')){
            $produit->image = $req->file('image')->store('products');
        }
        $produit->save();
        return $produit;

    }
}
