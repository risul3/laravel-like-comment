<?php
	$data = \risul\LaravelLikeComment\Controllers\LikeController::getLikeViewData($like_item_id);
?>
<div class="laravel-like">
	<i id="{{ $like_item_id }}-like"
	   class="icon {{ $data[$like_item_id.'likeDisabled'] }} {{ $data[$like_item_id.'likeIconOutlined'] }} laravelLike-icon thumbs up"
	   data-item-id="{{ $like_item_id }}"
	   data-vote="1">
    </i>
	<span id="{{ $like_item_id }}-total-like">{{ $data[$like_item_id.'total_like'] }}</span>
	<i id="{{ $like_item_id }}-dislike"
	   class="icon {{ $data[$like_item_id.'likeDisabled'] }} {{ $data[$like_item_id.'dislikeIconOutlined'] }} laravelLike-icon thumbs down"
	   data-item-id="{{ $like_item_id }}"
	   data-vote="-1">
   </i>
   <span id="{{ $like_item_id }}-total-dislike">{{ $data[$like_item_id.'total_dislike'] }}</span>
</div>
