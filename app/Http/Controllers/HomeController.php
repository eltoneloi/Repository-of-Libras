<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Context;
define("PATH",dirname(dirname((dirname(__DIR__)))));
require_once(PATH.'/vendor/easyrdf/easyrdf/lib/EasyRdf.php');

use EasyRdf_Graph; 
use EasyRdf_Resource;
use EasyRdf_Sparql_Client;
use EasyRdf_Parser_RdfPhp;
use EasyRdf_Namespace;

class HomeController extends Controller
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contexts = Context::all();
            return view('/home',["contexts" => $contexts]);

    }
}
