<div class="editprofile">
	<div class="row">
		<div class="col-sm-4 col-xs-12">
			<div class="profileinfo">
				<div class="proimg"> 
					<i class="fa fa-users"></i>
					<img src="{{asset('img/proimage.png')}}" alt="Profile" class="img-fluid">
					<i class="fa fa-check"></i> 
				</div>
				<div class="text-center"> 
					<div class="profiledisc">
						<div class="protitle">{{ $employee->NameFirst.' '.$employee->NamesMiddle.' '.$employee->NameLast }}</div>
						<div class="propost">{{ $employee->Description }}</div>
						<div class="propost">{{ $employee->Department }}</div>
						<div class="posttag">{{ $employee->Manager }}</div>
					</div>
					<div class="editbtn">
						<a href="#" data-toggle="modal" data-target="#myModal" id="edit-profile" data-id="{{ $employee->ID }}" class="btn btn-primary">Edit Details</a>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-8 col-xs-12">
			<div id="myChart">
				<div id="calendarLoad"></div> 
				{{-- <img src="{{asset('img/graph.png')}}" alt="Graph" class="img-fluid"> --}}
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
								<div class="form-group position">
									<input type="hidden" name="id" value="{{ $id }}" name="">
									<input class="form-control form-control-lg inputstyle" type="name" required name="name" placeholder="*Name" />
									<a href="javascript:void(0)" class="copytext">Copy</a>
								</div>
								<div class="form-group position">
									<input class="form-control form-control-lg inputstyle" type="email" required name="email" placeholder="*Email Address" />
									<a href="javascript:void(0)" class="copytext">Copy</a>
								</div>								
								<div class="form-group position">
									<input class="form-control form-control-lg inputstyle" type="number" required name="mobile" placeholder="*Mobile Number" />
									<a href="javascript:void(0)" class="copytext">Copy</a>
								</div>

								<div class="form-group position">
									<textarea name="body" required class="form-control" placeholder="Message" cols="3" rows="3"></textarea>
									<a href="javascript:void(0)" class="copytextarea">Copy</a>
								</div>

								<div class="form-group">
									<div class="form-check">
										<input class="form-check-input" name="message_type[]" value="HASTER" type="checkbox">
										<label class="form-check-label" for="checkbox">
											HASTER
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" name="message_type[]" value="Venligst vend tilbage til kunden" type="checkbox" checked>
										<label class="form-check-label" for="Checkbox">
											Venligst vend tilbage til kunden
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" name="message_type[]" value="Kunden vender tilbage til dig" type="checkbox">
										<label class="form-check-label" for="Checkbox">
											Kunden vender tilbage til dig
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" name="message_type[]" value="Yderst presserende" type="checkbox">
										<label class="form-check-label" for="Checkbox">
											Yderst presserende
										</label>
									</div>
									<div style="display:none;" id="send-message-form-checkbox"><p style="color:red;">You must check at least one checkbox.</p></div>
								</div>

								<div class="savebtn">
									<button type="submit" @if($employee->busy_status) disabled @endif id="send-message-form-btn" class="btn btn-primary">Send</button>
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
										<div class="form-group position">
											<input type="hidden" name="reciver_id" value="{{ $id }}">
											<input class="form-control form-control-lg inputstyle" required type="name" name="name" placeholder="Name">
											<a href="javascript:void(0)" class="copytext">Copy</a>
										</div>
										<div class="form-group position">
											<input class="form-control form-control-lg inputstyle" required type="number" name="mobile" placeholder="Mobile Number">
											<a href="javascript:void(0)" class="copytext">Copy</a>
										</div>
										<div class="form-group position">
											<input class="form-control form-control-lg inputstyle" required type="email" name="email" placeholder="Email Address">
											<a href="javascript:void(0)" class="copytext">Copy</a>
										</div>
										<div class="form-group position" style="display:none;">
								 			<input class="form-control form-control-lg inputstyle" type="message-subject" name="subject" placeholder="Message Subject">
								 			<a href="javascript:void(0)" class="copytext">Copy</a>
										</div>
										<div class="form-group position">
											<textarea class="form-control" name="body" placeholder="Message" required cols="3" rows="3"></textarea>
											<a href="javascript:void(0)" class="copytextarea">Copy</a>
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
											<button type="submit" data-id="{{ $id }}" id="profile-draft" class="btn btn-primary">Send</button>
										</div>

									</form>
								</div>
								<div class="tab-pane fade" id="profile-draft-save" role="tabpanel" aria-labelledby="profile-tab3">

									<div id="profile-draft-save-message" style="display:none;" class="alert alert-success"></div>

									<form class="create" id="profile-draft-save-form">
										<div class="form-group position">
											<input required class="form-control form-control-lg inputstyle" type="name" name="name" placeholder="Name">
											<a href="javascript:void(0)" class="copytext">Copy</a>
										</div>
										<div class="form-group position">
											<input required class="form-control form-control-lg inputstyle" type="number" name="mobile" placeholder="Mobile Number">
											<a href="javascript:void(0)" class="copytext">Copy</a>
										</div>
										<div class="form-group position">
											<input required class="form-control form-control-lg inputstyle" type="email" name="email" placeholder="Email Address">
											<a href="javascript:void(0)" class="copytext">Copy</a>
										</div>
										<div class="form-group position" style="display:none;">
											<input class="form-control form-control-lg inputstyle" type="text" name="subject" placeholder="Message Subject">
											<a href="javascript:void(0)" class="copytext">Copy</a>
										</div>
										<div class="form-group position">
											<textarea name="body" required class="form-control" placeholder="Message" cols="3" rows="3"></textarea>
											<a href="javascript:void(0)" class="copytextarea">Copy</a>
										</div>
										<input type="hidden" name="reciver_id" value="{{ $id }}">

										<div class="savebtn">
											<button type="submit" data-id="{{ $id }}" id="profile-draft-save-btn" class="btn btn-primary">Save</button>
										</div>

									</form>
								</div>
								<div class="tab-pane fade" id="profile-draft-get" role="tabpanel" aria-labelledby="profile-tabdraft">

									<div class="editprofiledraft" style="display: none;">
											<div class="row">
												<div class="col-sm-12">
													<div class="panel panel-default">
														<div class="panel-heading"><br><span></span> <a href="javascript:void(0)" class="close-div">&times;</a></div>
														<div class="panel-body">
															<form class="create" id="contactForm">
													<div class="form-group">
														<input class="form-control form-control-lg inputstyle" type="name" name="name" id="name" placeholder="" disabled>
													</div>
													<div class="form-group">
														<input class="form-control form-control-lg inputstyle" type="email" name="email" id="email" placeholder="" disabled>
													</div>
													<div class="form-group">
														<input class="form-control form-control-lg inputstyle" type="number" name="mobile" id="mobile" placeholder="" disabled>
													</div>
													
													<div class="form-group">
														<textarea name="body" id="body" class="form-control" placeholder="" cols="3" rows="3" disabled></textarea>
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
												@if(count($employee_drafts) > 0)
												@foreach($employee_drafts as $draft)
													<tr class="editshowhideempdraft" data-id="{{ $draft->id }}">
														<td class="title">{{ $draft->name }}</td>
														<td class="comment">{{ \Illuminate\Support\Str::limit($draft->body, 25, $end='...') }}</td>
														<td class="time">{{ $draft->created_at }}</td>
													</tr>
													@endforeach
													@else
													<div class="col-md-12" style="color:red;"><center>No drafts...</center></div>
													@endif
											</tbody>
										</table>
									</div>
									<div id="loading" class="loading-draft" style="display:none;"></div>
									<div class="showmorebtn text-center">
										<p class="invisible-draft invisible">No more posts...</p>
										<button type="button" @if($employee_drafts->total() <= 10) style="display: none;" @endif id="load-more-draft" data-paginate="2" data-draft-reciver_id="{{ $id }}" class="btn btn-light"> Show More</button>
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

									<div class="form-group" style="position: relative">
											<input  title="Select From Date" placeholder="Select From Date" required class="form-control form-control-lg inputstyle"
											type="text" id="datedate" autocomplete="off" name="from_date" />
										</div>

										<div class="form-group" style="position: relative">
											<input  title="Select To Date" placeholder="Select To Date" required class="form-control form-control-lg inputstyle"
											type="text" id="datedateto" autocomplete="off" name="to_date" />
										</div>										

										<div class="form-group" style="position: relative">
											<input  title="Select From Time" placeholder="Select From Time" required class="form-control form-control-lg inputstyle"
											type="text" id="datetimeto" autocomplete="off" name="from_time" />
										</div>

										<div class="form-group" style="position: relative">
											<input  placeholder="Select To Time" required title="Select To Time" class="form-control form-control-lg inputstyle"
											type="text" id="datetime" autocomplete="off" name="to_time" />
										</div>

										<input type="hidden" name="employee_id" value="{{ $id }}">										
									{{-- <div class="form-group">
										<input title="Select From Date" placeholder="Slect Date" id="datetime" required class="form-control form-control-lg inputstyle" type="date" name="from_date" />
									</div>
									<div class="form-group">
										<input title="Select To Date" required class="form-control form-control-lg inputstyle" type="date" name="to_date" />
									</div>
									<div class="form-group">
										<input title="Select From Time" required class="form-control form-control-lg inputstyle" name="from_time" type="time" />
									</div>
									<div class="form-group">
										<input title="Select To Time" required name="to_time" class="form-control form-control-lg inputstyle" type="time" />
									</div> --}}

									<div class="form-group">
										<select name="event_type" required class="form-control form-select">
											<option value="" selected>Events</option>
											<option value="Busy">Busy</option>
											<option value="Leave">On Leave</option>
											<option value="Working">Working</option>
										</select>
									</div>

									<div class="form-group">
										<textarea required class="form-control" name="event_activity" placeholder="Enter Activity" cols="3" rows="3"></textarea>
									</div>

									<div class="form-group">
										<div class="form-check">
											<input name="message_status" class="form-check-input" type="radio" value="1" checked>
											<label class="form-check-label" for="checkbox">
												Message ON
											</label>
										</div>

									</div>

									<div class="form-group">
										<div class="form-check">
											<input name="message_status" class="form-check-input" type="radio" value="0" >
											<label class="form-check-label" for="checkbox">
												Message OFF
											</label>
										</div>

									</div>

									<div class="savebtn">
										<button type="submit" id="calendar-info-form-btn" class="btn btn-primary">Send</button>
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


<script>
	$(document).ready(function(){
		/*$(".editshowhideempdraft").click(function(){
			$(".editprofiledraft").css("display","block");
		});*/
		$(".close-div").click(function(){
			alert('d');
			$(".editprofiledraft").css("display","none");
			$(".editprofiledraft").hide();
		});
	});
</script>
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
			loadMoreDataDraftReset(1,'','','','',id);
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


	$(document).on('submit','#profile-draft-save-form',function(event) {
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
			loadMoreDataDraftReset(1,'','','','',id);
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
		$("#send-message-form-checkbox").hide();

		$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });

		checked = $(this).find("input[type=checkbox]:checked").length;

      if(!checked) {
      	$("#send-message-form-checkbox").show();
        return false;
      }


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
			$("#send-message-form-btn").text('Send');
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
				$('.loading-draft').show();
				$('#load-more-draft').text('Loading...');
			}
		})
		.done(function(data) {
			$('.loading-draft').hide();
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

    		var calendar = $('#calendarLoad').fullCalendar({

    			header: {
    				left: 'prev,next today',
    				center: 'title',
    				right:''
    			},

    			eventLimit: true,

    			selectable: true,

    			selectHelper: true,

    			events: SITEURL+"?emp_id={{ $id }}",

    			// allDay: false,

    			displayEventTime : false,

    			// timeFormat: 'h(:mm)T',


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
    			},
    		});
    	});

var dateNow = new Date();
    	$('#datetime').datetimepicker({
    		defaultDate:dateNow,
    		format: 'HH:mm:ss',
    		icons: {
    			time: "fa fa-clock-o",
    			up: "fa fa-arrow-up",
    			down: "fa fa-arrow-down",
    			previous: "fa fa-chevron-left",
    			next: "fa fa-chevron-right",
    		}
    	});

/*var date = new Date();
date.setDate(date.getDate() - 1);*/
    	$('#datedate').datetimepicker({
    		minDate:new Date(),
    		format: 'YYYY-MM-DD',
    		icons: {
    			date: "fa fa-calendar",
    			previous: "fa fa-chevron-left",
    			next: "fa fa-chevron-right",
    		}
    	});


    	$('#datetimeto').datetimepicker({
    		defaultDate:dateNow,
    		format: 'HH:mm:ss',
    		icons: {
    			time: "fa fa-clock-o",
    			up: "fa fa-arrow-up",
    			down: "fa fa-arrow-down"
    		}
    	});


    	$('#datedateto').datetimepicker({
    		minDate:new Date(),
    		format: 'YYYY-MM-DD',
    		icons: {
    			date: "fa fa-calendar",
    			previous: "fa fa-chevron-left",
    			next: "fa fa-chevron-right",
    		}
    	});

$(".copytext").click(function(){
	var copyText = $(this).siblings('input').val();
	  var $temp = $("<input>");
    $("body").append($temp);
    $temp.val($(this).siblings('input').val()).select();
    document.execCommand("copy");
    $temp.remove();
});
$(".copytextarea").click(function(){
	var copyText = $(this).siblings('textarea').val();
	  var $temp = $("<textarea></textarea>");
    $("body").append($temp);
    $temp.val($(this).siblings('textarea').val()).select();
    document.execCommand("copy");
    $temp.remove();
})
    </script>

