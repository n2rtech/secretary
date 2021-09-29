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
						<a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Edit Details</a>
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

									<div id="profile-draft--message" style="display:none;" class="alert alert-success"></div>

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
											<button type="submit" id="profile-draft" class="btn btn-primary">Save</button>
										</div>

									</form>
								</div>
								<div class="tab-pane fade" id="profile-draft-save" role="tabpanel" aria-labelledby="profile-tab3">

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
											<textarea name="body" class="form-control" placeholder="Message" cols="3" rows="3"></textarea>
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
											<button type="submit" id="profile-draft-save-btn" class="btn btn-primary">Save</button>
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

								<div id="event-form-message" style="display:none;" class="alert alert-success"></div>

								<form class="create" method="POST" id="event-form">
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
										<button type="submit" id="event-form-btn" class="btn btn-primary">Send</button>
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