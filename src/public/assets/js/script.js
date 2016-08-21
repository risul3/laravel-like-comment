$('.laravelLike-icon').on('click', function(obj){
	if($(this).hasClass('disabled'))
		return false;

	var item_id = $(this).data('item-id');
	var vote = $(this).data('vote');

	$.ajax({
       method: "get",
       url: "/laravellikecomment/like/vote",
       data: {item_id: item_id, vote: vote},
       dataType: "json"
    })
    .done(function(msg){
      if(msg.flag == 1){
      	if(msg.vote == 1){
      		$('#'+item_id+'-like').removeClass('outline');
      		$('#'+item_id+'-dislike').addClass('outline');
      	}
      	else if(msg.vote == -1){
      		$('#'+item_id+'-dislike').removeClass('outline');
      		$('#'+item_id+'-like').addClass('outline');
      	}
      	else if(msg.vote == 0){
      		$('#'+item_id+'-like').addClass('outline');
      		$('#'+item_id+'-dislike').addClass('outline');
      	}
  		$('#'+item_id+'-total-like').text(msg.totalLike == null ? 0 : msg.totalLike);
  		$('#'+item_id+'-total-dislike').text(msg.totalDislike == null ? 0 : msg.totalDislike);
      }
   	})
   	.fail(function(msg){
      alert(msg);
   	});
});
