<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\Gesture;
use App\Evaluation;
use App\Word;

class wordController extends Controller
{
    //Exibição da lista de words
    public function show(Request $request, $id){
    	$words = Category::find($id)->word;
    	
    	return view('/listWord', ['words' => $words, 'category_id' => $id]);
    }

    //Retorno do gesto relacionado a palavra. Requisição com ajax
    public function searchGesture($word_id){
    	$gesture = Word::find($word_id)->gesture;
   		return response()->json($gesture);
    }

    public function checkAuthenticationToEvaluate(){
        return response()->json(Auth::check());
    }

    //Para alterar oa avaliação anterior
    public function alterEvaluation($evaluation_id,$evaluation){
        $evaluationResult = Evaluation::find($evaluation_id);

        $evaluationResult->liked_it = $evaluation;
        $evaluationResult->save();
    }

    //Para scriar uma nova avaliação de gesto
    public function createEvaluation($gesture_id, $evaluation){
        $evaluationResult = DB::table('evaluations')->where([['gesture_id','=',$gesture_id],['user_id','=',Auth::id()]])->get();
        if(count($evaluationResult) == 0){
        	$evaluationResult = Evaluation::create([
        		'liked_it' => $evaluation,
        		'gesture_id' => $gesture_id,
        		'user_id' => Auth::id(),
        	]);
        }
        else
            $this->alterEvaluation($evaluationResult[0]->id,$evaluation);
    	return response()->json("ok");
    }

    
    //Retorna o total de avaliações
    public function getDataEvaluation($gesture_id){
        $yes = DB::table('evaluations')->where([['liked_it','=','y'],['gesture_id','=',$gesture_id]])->get();
        $no = DB::table('evaluations')->where([['liked_it','=','n'],['gesture_id','=',$gesture_id]])->get();
        $total = $this->calcEvaluationPercent($yes , $no);
        return response()->json($total);

    }

    //Calcula a porcentagem de aprovação
    public function calcEvaluationPercent($yes , $no){
        $countYes = count($yes);
        $countNo = count($no);
        if( $countYes == 0 && $countNo==0){
            return -1;
        }
        else if( $countYes == 0 && $countNo > 0){
            return 0;
        }
        else if( $countYes > 0 && $countNo == 0){
            return 100;
        }
        else if($countYes == $countNo){
            return 50;
        }
        
            $total = $countYes + $countNo;
            $total = round(($countYes/$total)*100);
            return $total;
    }

    //Verifica se um usuario já avaliou com gostei ou não gostei e dá resposta para bloqueio de uma das opções
    public function blockButtonEvaluation($gesture_id){
        $evaluation = DB::table('evaluations')->where([['gesture_id','=',$gesture_id],['user_id','=',Auth::id()]])->get();
        return response()->json($evaluation[0]);
    }
}
