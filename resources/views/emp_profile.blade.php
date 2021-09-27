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
				<img src="{{asset('img/graph.png')}}" alt="Graph" class="img-fluid">
			</div>
		</div>
	</div>
	<div class="profilemessage">
		<div class="row">
			<div class="col-sm-7 paddingright border-right">
				<div class="messagetab">
					<ul class="nav nav-tabs" id="messagetab1" role="tablist">
						<li class="nav-item"> <a class="nav-link active" id="home-tab" data-toggle="tab" href="#homesend" role="tab" aria-controls="home" aria-selected="true"><span>Send a Message</span></a>
						</li>
						<li class="nav-item"> <a class="nav-link" id="profile-tab1" data-toggle="tab" href="#employee" role="tab" aria-controls="profile" aria-selected="false"><span>Employee Draft</span></a>
						</li>
					</ul>
					<div class="tab-content" id="myTabContent2">
						<div class="tab-pane fade show active" id="homesend" role="tabpanel" aria-labelledby="home-tab">
							<form class="create">
								<div class="form-group">
									<input class="form-control form-control-lg inputstyle" type="email" name="email" placeholder="*Email Address" />
								</div>
								<div class="form-group">
									<input class="form-control form-control-lg inputstyle" type="name" name="name" placeholder="*Name" />
								</div>
								<div class="form-group">
									<input class="form-control form-control-lg inputstyle" type="number" name="mobilenumber" placeholder="*Mobile Number" />
								</div>

								<div class="form-group">
									<textarea class="form-control" placeholder="Message" cols="3" rows="3"></textarea>
								</div>

								<div class="form-group">
									<div class="form-check">
										<input class="form-check-input" type="checkbox" checked>
										<label class="form-check-label" for="checkbox">
											URGENT
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="checkbox">
										<label class="form-check-label" for="Checkbox">
											Please get back to the customer
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="checkbox">
										<label class="form-check-label" for="Checkbox">
											The customer gets back to you
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="checkbox">
										<label class="form-check-label" for="Checkbox">
											Extremely urgent
										</label>
									</div>

								</div>

								<div class="savebtn">
									<button type="button" class="btn btn-primary">Send</button>
								</div>

							</form>
						</div>
						<div class="tab-pane fade" id="employee" role="tabpanel" aria-labelledby="profile-tab">
							<ul class="nav nav-tabs" id="myTabdraft" role="tablist">
								<li class="nav-item"> <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="true">Send Draft</a>
								</li>
								<li class="nav-item"> <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile3" role="tab" aria-controls="profile" aria-selected="false">Save Draft</a>
								</li>
								<li class="nav-item"> <a class="nav-link" id="profile-tabdraft" data-toggle="tab" href="#profiledraft" role="tab" aria-controls="profile" aria-selected="false">Get Draft</a>
								</li>

							</ul>
							<div class="tab-content" id="myTabContent3">
								<div class="tab-pane fade show active" id="home3" role="tabpanel" aria-labelledby="home-tab3">

									<form class="create">
										<div class="form-group">
											<input class="form-control form-control-lg inputstyle" type="name" name="name" placeholder="Name">
										</div>
										<div class="form-group">
											<input class="form-control form-control-lg inputstyle" type="number" name="mobilenumber" placeholder="Mobile Number">
										</div>
										<div class="form-group">
											<input class="form-control form-control-lg inputstyle" type="email" name="email" placeholder="Email Address">
										</div>
										<div class="form-group">
											<input class="form-control form-control-lg inputstyle" type="message-subject" name="message-subject" placeholder="Message Subject">
										</div>
										<div class="form-group">
											<textarea class="form-control" placeholder="Message" cols="3" rows="3"></textarea>
										</div>
										<div class="form-group">
											<select class="form-control form-select">
												<option selected="">Assign To Employee</option>
												<option value="1">One</option>
												<option value="2">Two</option>
												<option value="3">Three</option>
											</select>
										</div>

										<div class="savebtn">
											<button type="button" class="btn btn-primary">Save</button>
										</div>

									</form>
								</div>
								<div class="tab-pane fade" id="profile3" role="tabpanel" aria-labelledby="profile-tab3">

									<form class="create">
										<div class="form-group">
											<input class="form-control form-control-lg inputstyle" type="name" name="name" placeholder="Name">
										</div>
										<div class="form-group">
											<input class="form-control form-control-lg inputstyle" type="number" name="mobilenumber" placeholder="Mobile Number">
										</div>
										<div class="form-group">
											<input class="form-control form-control-lg inputstyle" type="email" name="email" placeholder="Email Address">
										</div>
										<div class="form-group">
											<input class="form-control form-control-lg inputstyle" type="message-subject" name="message-subject" placeholder="Message Subject">
										</div>
										<div class="form-group">
											<textarea class="form-control" placeholder="Message" cols="3" rows="3"></textarea>
										</div>
										<div class="form-group">
											<select class="form-control form-select">
												<option selected="">Assign To Employee</option>
												<option value="1">One</option>
												<option value="2">Two</option>
												<option value="3">Three</option>
											</select>
										</div>

										<div class="savebtn">
											<button type="button" class="btn btn-primary">Save</button>
										</div>

									</form>
								</div>
								<div class="tab-pane fade" id="profiledraft" role="tabpanel" aria-labelledby="profile-tabdraft">
									<div class="getdraft">
										<table class="table table-striped">
											<tbody>
												@foreach($employee->drafts as $draft)
													<tr>
														<td class="title">{{ $draft->subject }}</td>
														<td class="comment">{{ $draft->body }}</td>
														<td class="time">{{ $draft->created_at }}</td>
													</tr>
													@endforeach
											</tbody>
										</table>
									</div>

									<div class="showmorebtn text-center">
										<button type="button" class="btn btn-light"> Show More</button>
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
								<form class="create">
									<div class="form-group">
										<input class="form-control form-control-lg inputstyle" type="date" name="Select From Date" />

									</div>
									<div class="form-group">
										<input class="form-control form-control-lg inputstyle" type="date" name="Select To Date" />
									</div>
									<div class="form-group">
										<input class="form-control form-control-lg inputstyle" type="time" name="Select From Time" />

									</div>
									<div class="form-group">
										<input class="form-control form-control-lg inputstyle" type="time" name="Select To Time" />
									</div>

									<div class="form-group">
										<select class="form-control form-select">
											<option selected="">Events</option>
											<option value="1">One</option>
											<option value="2">Two</option>
											<option value="3">Three</option>
										</select>
									</div>

									<div class="form-group">
										<textarea class="form-control" placeholder="Enter Activity" cols="3" rows="3"></textarea>
									</div>

									<div class="form-group">
										<div class="form-check">
											<input class="form-check-input" type="checkbox" checked>
											<label class="form-check-label" for="checkbox">
												Message On/off
											</label>
										</div>

									</div>

									<div class="savebtn">
										<button type="button" class="btn btn-primary">Send</button>
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