<div id="edit-profile-message" style="display:none;" class="alert alert-success"></div>
<div class="row">
	<div class="col-sm-6 col-xs-6 border-right">
		<div class="changeprofile">
			<div class="proimg"> 
				<a href="#"><span class="remove">&times;</span> Remove</a>
				<img src="{{asset('img/proimage.png')}}" alt="Profile" class="img-fluid">
				<a href="#"><span class="change">Change Picture</span></a>
			</div>
		</div>
	</div>
	<div class="col-sm-6 col-xs-6">
		<form class="create" id="edit-profile-form">
			<div class="form-group">
				<input type="hidden" value="{{ $id }}" name="id">
				<input class="form-control form-control-lg inputstyle" type="name" name="NameFirst" required value="{{ $employee->NameFirst }}" placeholder="Name First">
			</div>
			<div class="form-group">
				<input class="form-control form-control-lg inputstyle" type="name" name="NamesMiddle" value="{{ $employee->NamesMiddle }}" placeholder="Name Middle">
			</div>
			<div class="form-group">
				<input class="form-control form-control-lg inputstyle" type="name" name="NameLast" value="{{ $employee->NameLast }}" placeholder="Name Last">
			</div>
			<div class="form-group">
				<input class="form-control form-control-lg inputstyle" type="number" name="Mobilephone" required value="{{ $employee->Mobilephone }}" placeholder="Mobile Number">
			</div>
			<div class="form-group">
				<input class="form-control form-control-lg inputstyle" type="email" name="PersonalEmail" required="" value="{{ $employee->PersonalEmail }}" placeholder="Email Address">
			</div>
			<div class="form-group">
				<input class="form-control form-control-lg inputstyle" type="text" value="{{ $employee->GroupEmail }}" name="GroupEmail" placeholder="Group Email">
			</div>
			<div class="form-group">
				<select required name="Department" class="form-control form-select">
					<option value="" selected="">Group</option>
					@foreach($departments as $department)
					<option @if($employee->Department == $department) selected @endif value="{{ $department }}">{{ $department }}</option>
					@endforeach
				</select>
			</div>

			<div class="savebtn">
				<button type="submit" id="edit-profile-btn" class="btn btn-primary">Save</button>
			</div>

		</form>
	</div>
</div>
<script type="text/javascript">
	$(document).on('submit','#edit-profile-form',function(event) {
		event.preventDefault();

		$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });

		var $form = $(this),
		url = $form.attr('action');

		$.ajax({
			url: '{{ route('admin.update-profile') }}',
			type: 'POST',
			data: $form.serialize() + "&_token={{ csrf_token() }}",
			beforeSend: function() {
				$("#edit-profile-btn").text('Loading...');
			}
		}).done(function(data) {
			$("#edit-profile-form")[0].reset();
			$("#edit-profile-btn").text('Save');
			$("#edit-profile-message").show().html(data.message);
			setTimeout(function() {
				$("#edit-profile-message").show().fadeOut('fast');
			}, 5000);
		}).fail(function() {
			$("#edit-profile-message").text('failed');
		});

	});
</script>