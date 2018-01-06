<?php 
namespace App\Service;

use Illuminate\Support\Facades\DB;
use App\Category;
use App\Gesture;
use App\Evaluation;
use App\Word;
use App\Context;

define('PATH' , dirname((dirname(__DIR__))));
require_once(PATH.'/vendor/easyrdf/easyrdf/lib/EasyRdf.php');


Class RdfService  {
	protected $rdfPath;

	public function __construct($rdfPath){
		$this.$rdfPath = $rdfPath;
	}

	//Todos os métodos retornam todas as linha da tabela especificada. 
	public function getUsers(){

	}

	public function getContexts(){

	}

	public function getCategories(){

	}

	public function getWords(){

	}

	public function getGesture(){

	}

	public function getEvaluation(){

	}

	public function updateOntology($contexts, $categories, $words, $gestures){

	}
}

