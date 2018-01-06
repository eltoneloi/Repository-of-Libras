<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Context;

class categoryController extends Controller
{
    
	//Retorna todas as categorias que pertencem ao contexto
    public function show(Request $resquest, $id){

    	$categories = Context::find($id)->category;
    	return view('/listCategory', ['categories' => $categories]);
   
    }

    //Retorna todas as categorias que pertencem a mesmo contexto, base de busca é o codigo de uma categoria
    public function showById(Request $request,$id){
    	$context = Category::find($id)->context;
    	$categories = Context::find($context->id)->category;

    	return view('/listCategory', ['categories' => $categories]);
    }
}
