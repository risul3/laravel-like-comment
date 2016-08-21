<?php
	$totalCount = \risul\LaravelLikeComment\Models\TotalLike::where('item_id', $item_id)->first();
	if($totalCount == NULL){
		$totalCount = new \risul\LaravelLikeComment\Models\TotalLike;
		$totalCount->item_id = $item_id;
		$totalCount->total_like = 0;
		$totalCount->total_dislike = 0;

		$totalCount->save();
	}

	$yourVote = 0; // 0 = Not voted, 1 = Liked, -1 = Disliked
	if(Auth::check()){
		$checkYourVote = \risul\LaravelLikeComment\Models\Like::where([
																'user_id' => Auth::user()->id,
																'item_id' => $item_id
																])->first();
		if($checkYourVote != NULL){
			$yourVote = $checkYourVote->vote;
		}
	}

	$LikeDisabled = "";
	if(!Auth::check()){
		$LikeDisabled = "disabled";
	}

	$likeIconOutlined = $yourVote == 1 ? "" : "outline";
	$dislikeIconOutlined = $yourVote == -1 ? "" : "outline";
?>
<div class="laravel-like">
	<i id="{{ $item_id }}-like" class="icon {{ $LikeDisabled }} {{ $likeIconOutlined }} laravelLike-icon thumbs up" data-item-id="{{ $item_id }}" data-vote="1"></i><span id="{{ $item_id }}-total-like">{{ $totalCount->total_like }}</span>
	<i id="{{ $item_id }}-dislike" class="icon {{ $LikeDisabled }} {{ $dislikeIconOutlined }} laravelLike-icon thumbs down" data-item-id="{{ $item_id }}" data-vote="-1"></i><span id="{{ $item_id }}-total-dislike">{{ $totalCount->total_dislike }}</span>
</div>
