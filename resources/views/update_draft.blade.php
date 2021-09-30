<form class="create" id="edit-draft-form">
	<div class="form-group">
		<input class="form-control form-control-lg inputstyle" type="name" required name="name" id="name" value="{{ $message->name }}">
	</div>
	<input type="hidden" required name="id" id="id" value="{{ $message->id }}">
	<div class="form-group">
		<input class="form-control form-control-lg inputstyle" type="email" required name="email" id="email" value="{{ $message->email }}">
	</div>
	<div class="form-group">
		<input class="form-control form-control-lg inputstyle" type="number" required name="mobile" id="mobile" value="{{ $message->mobile }}">
	</div>

	<div class="form-group">
		<input class="form-control form-control-lg inputstyle" type="text" required name="subject" id="subject" value="{{ $message->subject }}">
	</div>

	<div class="form-group">
		<textarea required name="body" id="body" class="form-control" cols="3" rows="3">{{ $message->body }}</textarea>
	</div>
	<div class="form-group">
		<select class="form-control form-select" required name="reciver_id" id="reciver_id">
			<option selected value="">Assign To Employee</option>
			@foreach($employee_list as $key => $employee)
			<option @if($message->reciver_id == $key) selected @endif value="{{ $key}}">{{ $employee}}</option>
			@endforeach
		</select>
	</div>
	<div class="savebtn">
		<button type="submit" id="submit-btn-edit" class="btn btn-primary">Send</button>
	</div>

</form>