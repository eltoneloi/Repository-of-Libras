<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Support\Facades\Auth;
use App\Context;
use App\Word;
use App\Gesture;
use App\Category;
use App\User;

class contributeController extends Controller
{

	public function __construct(){

		$this->middleware('auth');
	}


    public function searchContexts(Request $request,$contributionSuccess){
    	$contexts = Context::all();
    	return view('contribute',['contexts' => $contexts, 'contributionSuccess' => $contributionSuccess]);
    }


    public function searchCategories($context_id){
        $categories = Context::find($context_id)->category;
        return response()->json($categories);
    }


    public function store(Request $request){
        $user = User::find(Auth::id());
        if($user->typeAccount == 'common')
            return redirect('contribute/error');

    		$data =[
            'youtubeEmbed' =>'required|string',
            'word' => 'required|string|max:50',
            'category' => 'required|min:1',];

    		$validator = $request->validate($data);
        DB::beginTransaction();
    		$word = Word::create(['word' => $request->word,
    						'creator_id' => Auth::id(),
    						'category_id' => $request->category,]);

        if(!$word)
            DB::rollBack();

        $changelink = array("watch?v=");
        $newLinkEmbed = str_replace($changelink, "embed/", $request->youtubeEmbed);
    		$gesture = Gesture::create(['gestFile' =>$newLinkEmbed,
    							'word_id' => $word->id,]);
        if($gesture)
                DB::commit();

    		return redirect('contribute/ok');
    }
}
