<?php

namespace risul\LaravelLikeComment\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use risul\LaravelLikeComment\Models\Like;
use risul\LaravelLikeComment\Models\TotalLike;
use Auth;

class LikeController extends Controller
{
    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
    public function index(){
    	return "YESSS! It works!";
    }

    /**
     * Update vote
     *
     * @return json array
     * @author Risul Islam - risul321@gmail.com
     **/
    public function vote(Request $request){
    	/* Check if user is loged in*/
    	if(!Auth::check())
    		return response()->json(['flag' => 0]);

    	/* Prepare data */
    	$userId = Auth::user()->id;
    	$itemId = $request->item_id;
    	$vote = $request->vote;

    	/* Get item's current like, dislike total */
    	$totalLike = TotalLike::where('item_id', $itemId)->first();

    	/* Get user's vote on this item */
		$like = Like::where(['user_id' => $userId, 'item_id' => $itemId])->first();

		/* Check if users vote on this item exists */
		if($like != null){
			if($like->vote == 1){	// if previous vote was like
				$totalLike->total_like--;	// decrease item's total like by 1
				$totalLike->total_like = $totalLike->total_like == null ? 0 : $totalLike->total_like;	// set 0 if total like is null
				if($vote == 1)	// if current vote is like
					$vote = 0;	// previous vote and current vote is same so discarde vote
			}
			else if($like->vote == -1){	// if previous vote was dislike
				$totalLike->total_disLike--;	// decrease item's total like by 1
				$totalLike->total_disLike = $totalLike->total_disLike == null ? 0 : $totalLike->total_disLike;	// set 0 if total dislike is null
				if($vote == -1)	// if current vote is dislike
					$vote = 0;	// previous vote and current vote is same so discarde vote
			}
		}
		else{
			$like = new Like;	// create new like object if previous vote not exists
		}

		/* Update vote data */
		$like->user_id = $userId;
		$like->item_id = $itemId;
		$like->vote = $vote;

		if($vote == 1)
			$totalLike->total_like++;	// increase total like if vote is like
		else if($vote == -1)
			$totalLike->total_disLike++;	// increase total dislike if vote is dislike

		$like->save();		// save like
		$totalLike->save();	//save total like,dislike

    	return response()->json(['flag' => 1, 'vote' => $vote, 'totalLike' => $totalLike->total_like, 'totalDislike' => $totalLike->total_disLike]);
    }
}
