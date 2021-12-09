<form class="create" id="edit-draft-form">
	<div class="form-group position">
		<input class="form-control form-control-lg inputstyle" type="name" required name="name" id="name" value="{{ $message->name }}" placeholder="Name">
		<a href="javascript:void(0)" class="copytext">Copy</a>
	</div>
	<input type="hidden" required name="id" id="id" value="{{ $message->id }}">
	<div class="form-group">
		<input class="form-control form-control-lg inputstyle" type="email" required name="email" id="email" value="{{ $message->email }}" placeholder="Email Address"><a href="javascript:void(0)" class="copytext">Copy</a>
	</div>
	<div class="form-group">
		<input class="form-control form-control-lg inputstyle" type="number" required name="mobile" id="mobile" value="{{ $message->mobile }}" placeholder="Mobile Number"><a href="javascript:void(0)" class="copytext">Copy</a>
	</div>

	<div class="form-group" style="display:none">
		<input class="form-control form-control-lg inputstyle" type="text" name="subject" id="subject" value="{{ $message->subject }}">
	</div>

	<div class="form-group">
		<textarea required name="body" id="body" class="form-control" cols="3" rows="3" placeholder="Message">{{ $message->body }}</textarea>
		<a href="javascript:void(0)" class="copytextarea">Copy</a>
	</div>
	<div class="form-group">
		<input type="hidden" name="reciver_id" id="reciver_id" value="{{ $message->reciver_id }}">
	</div>
	<div class="savebtn">
		<button type="submit" id="submit-btn-edit" class="btn btn-primary">Send</button>
	</div>

</form>

<script type="text/javascript">
	$(document).ready(function() {
		$(".select-with-search-option").select2();
	});


$(document).on('click', '.copytext', function(event) {
	var copyText = $(this).siblings('input').val();
	  var $temp = $("<input>");
    $("body").append($temp);
    $temp.val($(this).siblings('input').val()).select();
    document.execCommand("copy");
    $temp.remove();
});



$(document).on('click', '.copytextarea', function(event) {
	var copyText = $(this).siblings('textarea').val();
	  var $temp = $("<textarea></textarea>");
    $("body").append($temp);
    $temp.val($(this).siblings('textarea').val()).select();
    document.execCommand("copy");
    $temp.remove();
})

</script>