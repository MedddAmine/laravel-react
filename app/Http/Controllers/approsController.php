<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appro;
use PDF;


class approsController extends Controller
{
    //
    function getApp($id){
        $result= Appro::where('Reference',$id)->exists();
        if(Appro::where('Reference',$id)->exists()){
            return 0;
        }
        return 1;
    }

    function addApp(Request $req){
        $appro = new Appro;
        $appro->reference = $req->reference;
        $appro->date = $req->date;
        $appro->fournisseur= $req->fournisseur;
        $appro->save();
        $pdf = PDF::loadView('pdf',);

        return $pdf->download('Facturat');

    }
    

}
