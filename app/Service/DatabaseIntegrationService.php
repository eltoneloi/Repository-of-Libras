<?php

namespace App\Service;
required_once(__dir__.'RdfService.php');
use Illuminate\Support\Facades\DB;
use App\Category;
use App\Gesture;
use App\Evaluation;
use App\Word;
use App\Context;
use RdfService;

Class DatabaseIntegrationService{
	protected rdfService;

	public function __construct(RdfService $rdfService){
		$this.$rdfService = $rdfService;
	}
}
