<div class="editprofile">
	<div class="row">
		<div class="col-sm-4">
			<div class="profileinfo">
				<div class="proimg"> 
					<i class="fa fa-users"></i>
					<img src="{{asset('img/proimage.png')}}" alt="Profile" class="img-fluid">
					<i class="fa fa-check"></i> 
				</div>
				<div class="text-center"> 
					<div class="profiledisc">
						<div class="protitle">{{ $employee->NameFirst.' '.$employee->NamesMiddle.' '.$employee->NameLast }}</div>
						<div class="propost">{{ $employee->Department }}</div>
						<div class="posttag">Sales, Management</div>
					</div>
					<div class="editbtn">
						<a href="#" data-toggle="modal" data-target="#myModal" id="edit-profile" data-id="{{ $employee->ID }}" class="btn btn-primary">Edit Details</a>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-8">
			<div id="myChart">
				{{-- <div id="calendar"></div>  --}}
				<img src="{{asset('img/graph.png')}}" alt="Graph" class="img-fluid">
			</div>
		</div>
	</div>
	<div class="profilemessage">
		<div class="row">
			<div class="col-sm-7 paddingright border-right">
				<div class="messagetab">
					<ul class="nav nav-tabs" id="messagetab1" role="tablist">
						<li class="nav-item"> <a class="nav-link active" id="home-tab" data-toggle="tab" href="#homesend-profile" role="tab" aria-controls="home" aria-selected="true"><span>Send a Message</span></a>
						</li>
						<li class="nav-item"> <a class="nav-link" id="profile-tab1" data-toggle="tab" href="#employee-profile" role="tab" aria-controls="profile" aria-selected="false"><span>Employee Draft</span></a>
						</li>
					</ul>
					<div class="tab-content" id="myTabContent2">
						<div class="tab-pane fade show active" id="homesend-profile" role="tabpanel" aria-labelledby="home-tab">
							<div id="success-msg-send-message" style="display:none;" class="alert alert-success"></div>
							<form class="create" method="POST" id="send-message-form">
								<div class="form-group">
									<input type="hidden" name="id" value="{{ $id }}" name="">
									<input class="form-control form-control-lg inputstyle" type="name" required name="name" placeholder="*Name" />
								</div>
								<div class="form-group">
									<input class="form-control form-control-lg inputstyle" type="email" required name="email" placeholder="*Email Address" />
								</div>								
								<div class="form-group">
									<input class="form-control form-control-lg inputstyle" type="number" required name="mobile" placeholder="*Mobile Number" />
								</div>

								<div class="form-group">
									<textarea name="body" required class="form-control" placeholder="Message" cols="3" rows="3"></textarea>
								</div>

								<div class="form-group">
									<div class="form-check">
										<input class="form-check-input" name="message_type[]" value="URGENT" type="checkbox" checked>
										<label class="form-check-label" for="checkbox">
											URGENT
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" name="message_type[]" value="Please get back to the customer" type="checkbox">
										<label class="form-check-label" for="Checkbox">
											Please get back to the customer
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" name="message_type[]" value="The customer gets back to you" type="checkbox">
										<label class="form-check-label" for="Checkbox">
											The customer gets back to you
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" name="message_type[]" value="Extremely urgent" type="checkbox">
										<label class="form-check-label" for="Checkbox">
											Extremely urgent
										</label>
									</div>

								</div>

								<div class="savebtn">
									<button type="submit" id="send-message-form-btn" class="btn btn-primary">Send</button>
								</div>

							</form>
						</div>
						<div class="tab-pane fade" id="employee-profile" role="tabpanel" aria-labelledby="profile-tab">
							<ul class="nav nav-tabs" id="myTabdraft" role="tablist">
								<li class="nav-item"> <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#home-profile" role="tab" aria-controls="home" aria-selected="true">Send Draft</a>
								</li>
								<li class="nav-item"> <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile-draft-save" role="tab" aria-controls="profile" aria-selected="false">Save Draft</a>
								</li>
								<li class="nav-item"> <a class="nav-link" id="profile-tabdraft" data-toggle="tab" href="#profile-draft-get" role="tab" aria-controls="profile" aria-selected="false">Get Draft</a>
								</li>

							</ul>
							<div class="tab-content" id="myTabContent3">
								<div class="tab-pane fade show active" id="home-profile" role="tabpanel" aria-labelledby="home-tab3">

									<div id="profile-draft-message" style="display:none;" class="alert alert-success"></div>

									<form class="create" id="profile-draft-form">
										<div class="form-group">
											<input type="hidden" name="reciver_id" value="{{ $id }}">
											<input class="form-control form-control-lg inputstyle" required type="name" name="name" placeholder="Name">
										</div>
										<div class="form-group">
											<input class="form-control form-control-lg inputstyle" required type="number" name="mobile" placeholder="Mobile Number">
										</div>
										<div class="form-group">
											<input class="form-control form-control-lg inputstyle" required type="email" name="email" placeholder="Email Address">
										</div>
										<div class="form-group">
											<input class="form-control form-control-lg inputstyle" required type="message-subject" name="subject" placeholder="Message Subject">
										</div>
										<div class="form-group">
											<textarea class="form-control" name="body" placeholder="Message" required cols="3" rows="3"></textarea>
										</div>
										<div class="form-group" style="display:none;">
											<select class="form-control form-select">
												<option selected="">Assign To Employee</option>
												<option value="1">One</option>
												<option value="2">Two</option>
												<option value="3">Three</option>
											</select>
										</div>

										<div class="savebtn">
											<button type="submit" data-id="{{ $id }}" id="profile-draft" class="btn btn-primary">Save</button>
										</div>

									</form>
								</div>
								<div class="tab-pane fade" id="profile-draft-save" role="tabpanel" aria-labelledby="profile-tab3">

									<div id="profile-draft-save-message" style="display:none;" class="alert alert-success"></div>

									<form class="create" id="profile-draft-save-form">
										<div class="form-group">
											<input required class="form-control form-control-lg inputstyle" type="name" name="name" placeholder="Name">
										</div>
										<div class="form-group">
											<input required class="form-control form-control-lg inputstyle" type="number" name="mobile" placeholder="Mobile Number">
										</div>
										<div class="form-group">
											<input required class="form-control form-control-lg inputstyle" type="email" name="email" placeholder="Email Address">
										</div>
										<div class="form-group">
											<input required class="form-control form-control-lg inputstyle" type="text" name="subject" placeholder="Message Subject">
										</div>
										<div class="form-group">
											<textarea name="body" required class="form-control" placeholder="Message" cols="3" rows="3"></textarea>
										</div>
										<div class="form-group">
											<select name="reciver_id" class="form-control form-select">
												<option selected value="">Assign To Employee</option>
												@foreach($employee_list as $key => $employee)
												<option value="{{ $key}}">{{ $employee}}</option>
												@endforeach
											</select>
										</div>

										<div class="savebtn">
											<button type="button" data-id="{{ $id }}" id="profile-draft-save-btn" class="btn btn-primary">Save</button>
										</div>

									</form>
								</div>
								<div class="tab-pane fade" id="profile-draft-get" role="tabpanel" aria-labelledby="profile-tabdraft">

									<div class="editmessagedraft" style="display: none;">
											<div class="row">
												<div class="col-sm-12">
													<div class="panel panel-default">
														<div class="panel-heading">Paige Turner<br><span>11:45 AM</span> <a href="javascript:void(0)" class="close-div">&times;</a></div>
														<div class="panel-body">
															<form class="create" id="contactForm">
													<div class="form-group">
														<input class="form-control form-control-lg inputstyle" type="name" name="name" id="name" placeholder="Paige Turner" disabled>
													</div>
													<div class="form-group">
														<input class="form-control form-control-lg inputstyle" type="email" name="email" id="email" placeholder="paigeturner@gmail.com" disabled>
													</div>
													<div class="form-group">
														<input class="form-control form-control-lg inputstyle" type="number" name="mobile" id="mobile" placeholder="9999998888" disabled>
													</div>
													
													<div class="form-group">
														<textarea name="body" id="body" class="form-control" placeholder="Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been" cols="3" rows="3" disabled></textarea>
													</div>
													<div class="form-group">
														<select class="form-control form-select" disabled>
															<option selected="">Assign To Employee</option>
															<option value="1">One</option>
															<option value="2">Two</option>
															<option value="3">Three</option>
														</select>
													</div>

													<div class="savebtn editmessbtn">
														<a href="javascript:void(0)" class="btn btn-primary" id="edit-modal">Send Message With Corrections</a>
													</div>
													<div class="savebtn editmessbtn">
														<button type="button" class="btn btn-primary">Send Message Without Corrections</button>
													</div>

												</form>
														</div>
													</div>
												</div>
											</div>
										</div>
									<div class="getdraft">
										<table class="table table-striped">
											<tbody id="post-draft">
												@foreach($employee_drafts as $draft)
													<tr class="editshowhidedraft">
														<td class="title">{{ $draft->subject }}</td>
														<td class="comment">{{ $draft->body }}</td>
														<td class="time">{{ $draft->created_at }}</td>
													</tr>
													@endforeach
											</tbody>
										</table>
									</div>

									<div class="showmorebtn text-center">
										<p class="invisible-draft invisible">No more posts...</p>
										<button type="button" id="load-more-draft" data-paginate="2" data-draft-reciver_id="{{ $id }}" class="btn btn-light"> Show More</button>
									</div>
								</div>


							</div>
						</div>

					</div>
				</div>
			</div>
			<div class="col-sm-5 paddingleft">
				<div class="calendarpanel">
					<div class="panel panel-default">
						<div class="panel-heading">Calendar Information</div>
						<div class="panel-body">
							<div class="calendarform">

								<div id="calendar-info-form-message" style="display:none;" class="alert alert-success"></div>

								<form class="create" method="POST" id="calendar-info-form">
									<div class="form-group">
										<input type="hidden" name="employee_id" value="{{ $id }}">
										<input title="Select From Date" required class="form-control form-control-lg inputstyle" type="date" name="from_date" />
									</div>
									<div class="form-group">
										<input title="Select To Date" required class="form-control form-control-lg inputstyle" type="date" name="to_date" />
									</div>
									<div class="form-group">
										<input title="Select From Time" required class="form-control form-control-lg inputstyle" name="from_time" type="time" />

									</div>
									<div class="form-group">
										<input title="Select To Time" required name="to_time" class="form-control form-control-lg inputstyle" type="time" />
									</div>

									<div class="form-group">
										<select name="event_type" required class="form-control form-select">
											<option value="" selected>Events</option>
											<option value="One">One</option>
											<option value="Two">Two</option>
											<option value="Three">Three</option>
										</select>
									</div>

									<div class="form-group">
										<textarea required class="form-control" name="event_activity" placeholder="Enter Activity" cols="3" rows="3"></textarea>
									</div>

									<div class="form-group">
										<div class="form-check">
											<input name="message_status" class="form-check-input" type="checkbox" checked>
											<label class="form-check-label" for="checkbox">
												Message On/off
											</label>
										</div>

									</div>

									<div class="savebtn">
										<button type="button" id="calendar-info-form-btn" class="btn btn-primary">Send</button>
									</div>

								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">

	$(document).on('submit','#profile-draft-form',function(event) {
		event.preventDefault();

		var id = $("#profile-draft").attr('data-id');

		$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });

		var $form = $(this),
		url = $form.attr('action');

		$.ajax({
			url: '{{ route('admin.save-send-draft') }}',
			type: 'POST',
			data: $form.serialize() + "&_token={{ csrf_token() }}",
			beforeSend: function() {
				$("#profile-draft").text('Loading...');
			}
		}).done(function(data) {
			// loadMoreDataDraftReset(1,'','','','',id);
			$("#profile-draft-form")[0].reset();
			$("#profile-draft").text('Save');
			$("#profile-draft-message").show().html(data.message);
			setTimeout(function() {
				$("#profile-draft-message").show().fadeOut('fast');
			}, 5000);
		}).fail(function() {
			$("#profile-draft-message").text('failed');
		});

	});


	$(document).on('submit','#profile-draft-save-form1',function(event) {
		event.preventDefault();

		var id = $("#profile-draft-save-btn").attr('data-id');

		$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });

		var $form = $(this),
		url = $form.attr('action');

		$.ajax({
			url: '{{ route('admin.save-draft') }}',
			type: 'POST',
			data: $form.serialize() + "&_token={{ csrf_token() }}",
			beforeSend: function() {
				$("#profile-draft-save-btn").text('Loading...');
			}
		}).done(function(data) {
			// loadMoreDataDraftReset(1,'','','','',id);
			$("#profile-draft-save-form")[0].reset();
			$("#profile-draft-save-btn").text('Save');
			$("#profile-draft-save-message").show().html(data.message);
			setTimeout(function() {
				$("#profile-draft-save-message").show().fadeOut('fast');
			}, 5000);
		}).fail(function() {
			$("#profile-draft-save-message").text('failed');
		});
	});

	$(document).on('submit','#send-message-form',function(event) {
		event.preventDefault();

		$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });

		var $form = $(this),
		url = $form.attr('action');

		$.ajax({
			url: '{{ route('admin.send-message-emp') }}',
			type: 'POST',
			data: $form.serialize() + "&_token={{ csrf_token() }}",
			beforeSend: function() {
				$("#send-message-form-btn").text('Loading...');
			}
		}).done(function(data) {
			$("#send-message-form")[0].reset();
			$("#send-message-form-btn").text('Save');
			$("#success-msg-send-message").show().html(data.message);
			setTimeout(function() {
				$("#success-msg-send-message").show().fadeOut('fast');
			}, 5000);
		}).fail(function() {
			$("#success-msg-send-message").text('failed');
		});
	});
</script>


<script type="text/javascript">
	$('#load-more-draft').click(function() {
		var page = $(this).data('paginate');
		var draft_name = $(this).attr('data-draft-name');
		var draft_mobile = $(this).attr('data-draft-mobile');
		var draft_email = $(this).attr('data-draft-email');
		var draft_subject = $(this).attr('data-draft-subject');
		var draft_reciver_id = $(this).attr('data-draft-reciver_id');

		loadMoreDataDraft(page,draft_name,draft_mobile,draft_email,draft_subject,draft_reciver_id);
		$(this).data('paginate', page+1);
	});

        function loadMoreDataDraftReset(paginate,draft_name,draft_mobile,draft_email,draft_subject,draft_reciver_id) {
        	$('#post-draft').empty();
        	var url = '{{ route('admin.get-draft-emp') }}?page=' + paginate;

        	if (draft_name) {
        		url += '&draft-name='+ draft_name;
        	}

        	if (draft_email) {
        		url += '&draft-email='+ draft_email;
        	}

        	if (draft_mobile) {
        		url += '&draft-mobile='+ draft_mobile;
        	}

        	if (draft_subject) {
        		url += '&draft-subject='+ draft_subject;
        	}

        	if (draft_reciver_id) {
        		url += '&draft-reciver_id='+ draft_reciver_id;
        	}

        	$.ajax({
        		url: url,
        		type: 'get',
        		datatype: 'html',
        		beforeSend: function() {
        			$('#load-more-draft').text('Loading...');
        		}
        	})
        	.done(function(data) {
        		if(data.length == 0) {
        			$('.invisible-draft').removeClass('invisible');
        			$('#load-more-draft').text('Show More');
        			return;
        		} else {                  	
        			$('#load-more-draft').text('Load more...');
        			$('#post-draft').append(data);
        		}
        	})
        	.fail(function(jqXHR, ajaxOptions, thrownError) {
        		alert('Something went wrong.');
        	});
        }

        function loadMoreDataDraft(paginate,draft_name,draft_mobile,draft_email,draft_subject,draft_reciver_id) {

        	var url = '{{ route('admin.get-draft-emp') }}?page=' + paginate;

        	if (draft_name) {
        		url += '&draft-name='+ draft_name;
        	}

        	if (draft_email) {
        		url += '&draft-email='+ draft_email;
        	}

        	if (draft_mobile) {
        		url += '&draft-mobile='+ draft_mobile;
        	}

        	if (draft_subject) {
        		url += '&draft-subject='+ draft_subject;
        	}

        	if (draft_reciver_id) {
        		url += '&draft-reciver_id='+ draft_reciver_id;
        	}

        	$.ajax({
        		url: url,
        		type: 'get',
        		datatype: 'html',
        		beforeSend: function() {
        			$('#load-more-draft').text('Loading...');
        		}
        	})
        	.done(function(data) {
        		if(data.length == 0) {
        			$('.invisible-draft').removeClass('invisible');
        			$('#load-more-draft').text('Show More');
        			return;
        		} else {
        			$('#load-more-draft').text('Load more...');
        			$('#post-draft').append(data);
        		}
        	})
        	.fail(function(jqXHR, ajaxOptions, thrownError) {
        		alert('Something went wrong.');
        	});
        }
    </script>

    <script type="text/javascript">
    	
    	$(document).ready(function () {

    		var SITEURL = "{{ route('admin.calendar-info')}}"+location.search;

    		$.ajaxSetup({

    			headers: {

    				'X-CSRF-TOKEN': '{{ csrf_token() }}'

    			}

    		});

    		var calendar = $('#calendar').fullCalendar({

    			header: {
    				left: 'prev,next today',
    				center: 'title',
    				right:''
    			},

    			eventLimit: true,

    			selectable: true,

    			selectHelper: true,

    			events: SITEURL+"?emp_id={{ $id }}",

    			displayEventTime: true,

    			eventColor: 'yellow',

    			eventRender: function(event, element){

    				if (event.allDay === 'true') {
    					event.allDay = true;
    				} else {
    					event.allDay = false;
    				}

    				element.popover({
    					html:true,
    					animation:true,
    					delay: 300,
    					content: "<b>Employee Name(Id)</b> : "+event.emp_name+" (#"+event.employee_id+")"+"</br><b>From Date </b> : "+event.from_date+"</br><b>From Time </b> : "+event.from_time+"</br><b>To Date </b> : "+event.to_date+"</br><b>To Time </b> : "+event.to_time+"</br><b>Event Type </b> : "+event.event_type+"</br><b>Event Activity </b> : "+event.event_activity+"</br><b>Message Status </b> : "+event.message_status+"</br>",
    					trigger: 'hover'
    				});
    				console.log('sss');
    			},
    		});
    	});


    </script>

    <script type="text/javascript">

    	$(document).on('click', '#edit-profile' , function() {

    		var id = $(this).attr('data-id');
    		var options = {
    			'backdrop': 'static'
    		};
    		$('#myModal').modal(options);

    		var ajaxurl = '{{route('admin.edit-profile')}}';
    		$.ajaxSetup({
    			headers: {
    				'X-CSRF-TOKEN': "{{ csrf_token() }}",
    			}
    		});
    		$.ajax({
    			url: ajaxurl,
    			data : {id:id},
    			type: "post",
    			success: function(data){
    				$data = $(data); 
    				$("#edit-profile-html").show().html($data);
    			}
    		});

    	});
  </script>