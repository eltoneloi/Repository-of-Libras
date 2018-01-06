<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DownloadsController extends Controller
{
    
    public function getDownloadOntologyRDF(){
    	$file = public_path().'/Ontology/RDFSchemaInstances';

    	return response()->download($file);
    }
}
