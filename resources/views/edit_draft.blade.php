<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading">{{ $message->name }}<br><span>{{ date('h:i A',strtotime($message->created_at)) }}</span> <a href="javascript:void(0)" class="close-div">&times;</a></div>
			<div class="panel-body">
				<form class="create" id="contactForm">
					<div class="form-group">
						<input class="form-control form-control-lg inputstyle" type="name" name="name" id="name" placeholder="{{ $message->name }}" disabled>
					</div>
					<div class="form-group">
						<input class="form-control form-control-lg inputstyle" type="email" name="email" id="email" placeholder="{{ $message->email }}" disabled>
					</div>
					<div class="form-group">
						<input class="form-control form-control-lg inputstyle" type="number" name="mobile" id="mobile" placeholder="{{ $message->mobile }}" disabled>
					</div>

					<div class="form-group">
						<input class="form-control form-control-lg inputstyle" type="number" name="subject" id="subject" placeholder="{{ $message->subject }}" disabled>
					</div>

					<div class="form-group">
						<textarea name="body" id="body" class="form-control" placeholder="{{ $message->body }}" cols="3" rows="3" disabled></textarea>
					</div>
					<div class="form-group">
						<select class="form-control form-select" disabled>
							<option selected value="">Assign To Employee</option>
							@foreach($employee_list as $key => $employee)
							<option @if($message->reciver_id == $key) selected @endif value="{{ $key}}">{{ $employee}}</option>
							@endforeach
						</select>
					</div>

					<div class="savebtn editmessbtn">
						<a href="javascript:void(0)" class="btn btn-primary" data-id="{{ $message->id }}" id="edit-item" data-toggle="modal" data-target="#myModal2">Send Message With Corrections</a>
					</div>
					<div class="savebtn editmessbtn">
						<button type="button" data-id="{{ $message->id }}" id="send-message-wc" class="btn btn-primary">Send Message Without Corrections</button>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>