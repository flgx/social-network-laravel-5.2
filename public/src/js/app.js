var postId = 0;
var postContentElement = null;
$('.edit').on('click',function(e){
	e.preventDefault();
	postContentElement = e.target.parentNode.parentNode.childNodes['1'];
	var postContent = postContentElement.textContent;
	postId = e.target.parentNode.parentNode.dataset['postid'];
	$('#edit-modal').modal();
	$('#edit-post-content').val(postContent);
});
$('#modal-save').on('click',function(){
	console.log('modal save');
	console.log(postId);
	$.ajax({
		method:'POST',
		url:urlEdit,
	 	data:{content: $('#edit-post-content').val(), postId: postId,_token:token}
	})
	.done(function(msg){
		$(postContentElement).text(msg['new_content']);
		$('#edit-modal').modal('hide');
		
	});
});

$('.like').on('click',function(e){
	e.preventDefault();
	var isLike = e.target.previousElementSibling == null;
	postId = e.target.parentNode.parentNode.dataset['postid'];
	$.ajax({
		method: 'POST',
		url: urlLike,
		data:{isLike : isLike, postId: postId,_token:token}

	})
	.done(function(msg){
		e.target.innerText = isLike ? e.target.innerText == 'Like' ? 'You like this post' : 'Like' : e.target.innerText == 'Dislike' ? 'You dont like this post' : 'Dislike';
		if(isLike){
			e.target.nextElementSibling.innerText = 'Dislike';
		}else{

			e.target.previousElementSibling.innerText = 'Like';
		}
	});

});	