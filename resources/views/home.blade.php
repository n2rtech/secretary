@extends('layouts.master')
@section('title','Dashboard')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.css" /> 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css">

<style>
   .ajax-loading{
     text-align: center;
   }
   .popover{ pointer-events:none; }

   .error{ color:red; } 

   .alert {
   	padding: 11px !important;
   	margin: 8px !important;
   	text-align: center !important;
   }
</style>
<div class="container-fluid p-3">
	<div class="row">
		<div class="col-sm-6 border-right">
			<div class="dashboard-left">
				<!--Search Keyword-->
				<h2>Most Searched Keyword</h2>
				<div class="searchkeyword">
					<ul class="list-inline" id="search-keywords">
            			@foreach($searched_data as $most_searched)
            			<li>
            			<div class="radio">
		                    <label>
		                        <input type="radio" class="btn-check" name="btnradio" autocomplete="off">        
		                        <span class="forcustom">{{ $most_searched->keyword }}</span>
		                        <span class="counter">{{ $most_searched->keyword_count }}</span>
		                    </label>
		                </div>
		                </li>
		                @endforeach
            		</ul>
				</div>
				<!--End-->
				<!--Message-->
				<div class="messagewithform">
					<div class="row">
						<div class="col-sm-6 paddingleft paddingright border-right">
							<div class="messagebox">
								<div class="panel panel-default">
									<div class="panel-heading">Messages in Draft</div>
									
									<div class="panel-body">
										<div class="editmessage" style="display: none;">
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
										<div class="messagetable" id="scrollcl">
											<table class="table table-striped">
												<tbody id="post">
													@foreach($messages as $message)
													<tr class="editshowhide" data-id="{{ $message->id }}">
														<td class="title">{{ $message->name }}</td>
														<td class="comment">{{ $message->body }}</td>
														<td class="time">{{ date('h:i A',strtotime($message->created_at)) }}</td>
													</tr>
													@endforeach
												</tbody>
											</table>
										</div>
										
									</div>
									<div class="showmorebtn text-center">
										 <p class="invisible">No more posts...</p>
										<button type="button" class="btn btn-light set-filter-data" id="load-more" data-paginate="2" data-draft-name="" data-draft-mobile="" data-draft-email="" data-draft-subject="" data-draft-reciver_id="">Show More</button>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 paddingright paddingleft">
							<div class="formtab">
								<div class="panel panel-default">
									<div class="panel-heading">Draft</div>
									<div class="panel-body">
										<ul class="nav nav-tabs" id="myTab" role="tablist">
											<li class="nav-item"> <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Create</a>
											</li>
											<li class="nav-item"> <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Search</a>
											</li>
										</ul>
										<div class="tab-content" id="myTabContent">
											<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
												<div id="success-msg" style="display:none;" class="alert alert-success"></div>
												<form class="create" id="draft-form">
													<div class="form-group">
														<input required class="form-control form-control-lg inputstyle" type="name" name="name" id="name"  placeholder="Name" />
														 <span class="text-danger error-name"></span>
													</div>
													<div class="form-group">
														<input class="form-control form-control-lg inputstyle" type="number" name="mobile" id="mobile"required  placeholder="Mobile Number" />
														<span class="text-danger error-mobile"></span>
													</div>
													<div class="form-group">
														<input class="form-control form-control-lg inputstyle" type="email" name="email" id="email" required placeholder="Email Address" />
														<span class="text-danger error-email"></span>
													</div>
													<div class="form-group" style="display:none;">
														<input class="form-control form-control-lg inputstyle" type="text" id="subject" name="subject" placeholder="Message Subject" />
														<span class="text-danger error-subject"></span>
													</div>
													<div class="form-group">
														<textarea class="form-control" required name="body" id="body" placeholder="Message" cols="3" rows="3"></textarea>
														<span class="text-danger error-body"></span>
													</div>
													<div class="form-group">
														<select name="reciver_id" id="reciver_id" class="form-control form-select">
															<option selected value="">Assign To Employee</option>
															@foreach($employee_list as $key => $employee)
														  <option value="{{ $key}}">{{ $employee}}</option>
														  @endforeach
														</select>
													</div>
													<div class="savebtn">
														<button type="submit" id="submit-btn" class="btn btn-primary">Save</button>
													</div>
												</form>
											</div>
											<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
												<form class="create filter" id="draft-search">
													<div class="form-group">
														<input class="form-control form-control-lg inputstyle" type="name" name="draft-name" id="draft-name" placeholder="Name" />
													</div>
													<div class="form-group">
														<input class="form-control form-control-lg inputstyle" type="number" name="draft-mobile" id="draft-mobile" placeholder="Mobile Number" />
													</div>
													<div class="form-group">
														<input class="form-control form-control-lg inputstyle" type="email" name="draft-email" id="draft-email" placeholder="Email Address" />
													</div>
													<div class="form-group" style="display:none;">
														<input class="form-control form-control-lg inputstyle" type="text" name="draft-subject" id="draft-subject" placeholder="Message Subject" />
													</div>
													<div class="form-group">
														<select name="draft-reciver_id" id="draft-reciver_id" class="form-control form-select">
															<option value="" selected>Assign To Employee</option>
															@foreach($employee_list as $key => $employee)
														  <option value="{{ $key}}">{{ $employee}}</option>
														  @endforeach
														</select>
													</div>

													<div class="savebtn">
														<button type="submit" class="btn btn-primary">Filter</button>
														<button type="button" class="reset-filter btn btn-secondary">Reset Filter</button>
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
				<!--End-->

			</div>
		</div>

		<div class="col-sm-6">
			<div class="dashboard-right"> 
				<ul class="nav nav-tabs">
					<li><a data-toggle="tab" data-paginate="2" href="#menua6">All</a></li>
					@foreach($group_employees as $key => $group_employee)
					<li><a data-toggle="tab"  data-paginate="2"  class="@if($key == 0) active @endif" href="#menu{{ $key }}">{{ $group_employee->Department }}</a></li>
					@endforeach
					<li><a data-toggle="tab" href="#menua5">Notes</a></li>
				</ul>
				<div class="tab-content">
					<div id="menua6" class="tab-pane fade">
						<div class="searchmember">
							<div class="row">
								<div class="col-sm-6">
									<div class="messagebtn">
										<button type="button" class="btn btn-primary messbtn">Send Message To All</button>
									</div>
								</div>
								<div class="col-sm-6">
									<div id="searchinput" class="input-group">
										<input type="text" name="keyword" id="keyword" placeholder="Search Members" class="text-search form-control inputstyle">
										<span class="input-group-btn">
											{{-- <i class="button-filter fa fa-search"></i> --}}
										</span>
									</div>
								</div>
							</div>
						</div>
						<div class="sendmessage" style="display: none;">
							<div class="row">
								<div class="col-sm-12">
									<div class="panel panel-default">
										<div class="panel-heading">Send a Message <a href="javascript:void(0)" class="messclose">&times;</a></div>
										<div class="panel-body">
											<div id="success-msg-send-allall" style="display:none;" class="alert alert-success"></div>
											<form class="create" method="POST" id="send-msg-to-all-all">
												<div class="form-group">
													<input type="hidden" name="department" value="all">
													<input style="display:none;" class="form-control form-control-lg inputstyle" type="text" name="subject" placeholder="Message Subject">
												</div>

												<div class="form-group">
													<textarea class="form-control" required name="message" placeholder="Message" cols="3" rows="3"></textarea>
												</div>

												<div class="form-group">
													<div class="form-check">
														<input class="form-check-input" value="URGENT" name="message_type[]" type="checkbox" checked="">
														<label class="form-check-label" for="checkbox">
															URGENT
														</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" value="Please get back to the customer" name="message_type[]" type="checkbox">
														<label class="form-check-label" for="Checkbox">
															Please get back to the customer
														</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" value="The customer gets back to you" name="message_type[]" type="checkbox">
														<label class="form-check-label" for="Checkbox">
															The customer gets back to you
														</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" value="Extremely urgent" name="message_type[]" type="checkbox">
														<label class="form-check-label" for="Checkbox">
															Extremely urgent
														</label>
													</div>

													<div style="display:none;" id="show-checkbox-error-all"><p style="color:red;">You must check at least one checkbox.</p></div>

												</div>

												<div class="savebtn">
													<button type="submit" id="send-msg-all-all" class="btn btn-primary">Send</button>
												</div>

											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row" id="results-All">
							@foreach($all_employees as $all_employee)
							<div class="col-sm-4">
								<div class="profile-grid">
									<div class="row">
										<div class="col-sm-4">
											<div class="profileimg">
												<img src="{{asset('img/proimage.png')}}" alt="Profile" class="img-fluid">
												<i class="fa fa-check"></i>
											</div>
										</div>
										<div class="col-sm-8">
											<div class="profiledisc">
												<div class="protitle"><a class="click-profile" data-id="{{ $all_employee->ID }}" >{{ $all_employee->NameFirst.' '.$all_employee->NamesMiddle.' '.$all_employee->NameLast }}</a></div>
												<div class="propost">{{ $all_employee->Department }}</div>
												<div class="posttag">Sales, Management</div>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="contactno">
												<span>{{ $all_employee->Mobilephone }}</span>
											</div>
										</div>
										<div class="col-sm-6 calendarpadding">
											<div class="calendarinfo">
												Calendar Info
											</div>
										</div>
									</div>
								</div>
							</div>
							@if(($loop->iteration % 3 == 0) || $loop->last) 
							<div class="profile-info" style="display:none;">My Profile</div>
							@endif
							@endforeach
						</div>
						<!-- Data Loader -->
						<div class="ajax-loading-All text-center">
							<svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
							x="0px" y="0px" height="60" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
							<path fill="#000"
							d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
							<animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s"
							from="0 50 50" to="360 50 50" repeatCount="indefinite" />
						</path>
					</svg>
				</div>
						{{-- <div class="ajax-loading-All"><img src="{{ asset('img/icons/loading.gif') }}" /></div> --}}
					</div>
					@foreach($group_employees as $key => $group_employee)
					<div id="menu{{ $key }}" class="tab-pane @if($key == 0) active @endif">
						<div class="searchmember">
							<div class="row">
								<div class="col-sm-6">
									<div class="messagebtn">
										<button type="button" class="btn btn-primary messbtn">Send Message To {{ $group_employee->Department }}</button>
									</div>
								</div>
								<div class="col-sm-6">
									<div id="searchinput" class="input-group">
										<input type="text" name="keyword" id="keyword" placeholder="Search Members" class="text-search form-control inputstyle">
										<span class="input-group-btn">
										</span>
									</div>
								</div>
							</div>
						</div>
						<div class="sendmessage" style="display: none;">
							<div class="row">
								<div class="col-sm-12">
									<div class="panel panel-default">
										<div class="panel-heading">Send a Message</div>
										<div class="panel-body">
											<div id="success-msg-send-all{{ $key }}" style="display:none;" class="alert alert-success"></div>
											<form class="create" method="POST" id="send-msg-to-all-{{ $key }}">
												<div class="form-group">
													<input type="hidden" name="department" value="{{ $group_employee->Department }}">
													<input style="display:none;" class="form-control form-control-lg inputstyle" type="text" name="subject" placeholder="Message Subject">
												</div>

												<div class="form-group">
													<textarea class="form-control" required name="message" placeholder="Message" cols="3" rows="3"></textarea>
												</div>

												<div class="form-group">
													<div class="form-check">
														<input class="form-check-input" value="URGENT" name="message_type[]" type="checkbox" checked="">
														<label class="form-check-label" for="checkbox">
															URGENT
														</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" value="Please get back to the customer" name="message_type[]" type="checkbox">
														<label class="form-check-label" for="Checkbox">
															Please get back to the customer
														</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" value="The customer gets back to you" name="message_type[]" type="checkbox">
														<label class="form-check-label" for="Checkbox">
															The customer gets back to you
														</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" value="Extremely urgent" name="message_type[]" type="checkbox">
														<label class="form-check-label" for="Checkbox">
															Extremely urgent
														</label>
													</div>

													<div style="display:none;" id="show-checkbox-error-{{$key}}"><p style="color:red;">You must check at least one checkbox.</p></div>

												</div>

												<div class="savebtn">
													<button type="submit" id="send-msg-all-{{ $key }}" class="btn btn-primary">Send</button>
												</div>

											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row" id="results-{{ str_replace(' ', '-', $group_employee->Department) }}">
							@foreach($group_employee->employees as $employee)
							<div class="col-sm-4">
								<div class="profile-grid">
									<div class="row">
										<div class="col-sm-4">
											<div class="profileimg">
												<img src="{{asset('img/proimage.png')}}" alt="Profile" class="img-fluid">
												<i class="fa fa-check"></i>
											</div>
										</div>
										<div class="col-sm-8">
											<div class="profiledisc">
												<div class="protitle"><a class="click-profile" data-id="{{ $employee->ID }}">{{ $employee->NameFirst.' '.$employee->NamesMiddle.' '.$employee->NameLast }}</a></div>
												<div class="propost">{{ $employee->Department }}</div>
												<div class="posttag">Sales, Management</div>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="contactno">
												<span>{{ $employee->Mobilephone }}</span>
											</div>
										</div>
										<div class="col-sm-6 calendarpadding">
											<div class="calendarinfo">
												Calendar Info
											</div>
										</div>
									</div>
								</div>
							</div>
							@if(($loop->iteration % 3 == 0) || $loop->last) 
							<div class="profile-info" style="display:none;">My Profile</div>
							@endif
							@endforeach
						</div>
						<div class="ajax-loading-{{ str_replace(' ', '-', $group_employee->Department) }} text-center">
							<svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
							x="0px" y="0px" height="60" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
							<path fill="#000"
							d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
							<animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s"
							from="0 50 50" to="360 50 50" repeatCount="indefinite" />
						</path>
					</svg>
				</div>
						{{-- <div class="ajax-loading-{{ str_replace(' ', '-', $group_employee->Department) }}"><img src="{{ asset('img/icons/loading.gif') }}" /></div> --}}
						<div class="editprofile" style="display: none;">
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
												<div class="protitle">Daniel Ollson</div>
												<div class="propost">Senior Manager</div>
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
														<li class="nav-item"> <a class="nav-link" id="profile-tabdraft" data-toggle="tab" href="#profiledraft" role="tab" aria-controls="profile" aria-selected="false">Save Draft</a>
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
																		<tr>
																			<td class="title">Paige Turner</td>
																			<td class="comment">Lorem Ipsum is simply dumm…</td>
																			<td class="time">11:45 AM</td>
																		</tr>
																		<tr>
																			<td class="title">Harriet Upp</td>
																			<td class="comment">Lorem Ipsum is simply dumm…</td>
																			<td class="time">11:45 AM</td>
																		</tr>
																		<tr>
																			<td class="title">Rhoda Report</td>
																			<td class="comment">Lorem Ipsum is simply dumm…</td>
																			<td class="time">11:45 AM</td>
																		</tr>
																		<tr>
																			<td class="title">Anne Teak</td>
																			<td class="comment">Lorem Ipsum is simply dumm…</td>
																			<td class="time">11:45 AM</td>
																		</tr>
																		<tr>
																			<td class="title">Colin Sik</td>
																			<td class="comment">Lorem Ipsum is simply dumm…</td>
																			<td class="time">11:45 AM</td>
																		</tr>
																		<tr>
																			<td class="title">Paige Turner</td>
																			<td class="comment">Lorem Ipsum is simply dumm…</td>
																			<td class="time">11:45 AM</td>
																		</tr>
																		<tr>
																			<td class="title">Harriet Upp</td>
																			<td class="comment">Lorem Ipsum is simply dumm…</td>
																			<td class="time">11:45 AM</td>
																		</tr>
																		<tr>
																			<td class="title">Anne Teak</td>
																			<td class="comment">Lorem Ipsum is simply dumm…</td>
																			<td class="time">11:45 AM</td>
																		</tr>
																		<tr>
																			<td class="title">Colin Sik</td>
																			<td class="comment">Lorem Ipsum is simply dumm…</td>
																			<td class="time">11:45 AM</td>
																		</tr>
																		<tr>
																			<td class="title">Paige Turner</td>
																			<td class="comment">Lorem Ipsum is simply dumm…</td>
																			<td class="time">11:45 AM</td>
																		</tr>
																		<tr>
																			<td class="title">Harriet Upp</td>
																			<td class="comment">Lorem Ipsum is simply dumm…</td>
																			<td class="time">11:45 AM</td>
																		</tr>
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
					</div>
					@endforeach
					<div id="menua5" class="tab-pane fade">
						<div class="searchmember">
							<div class="row">
								<div class="col-sm-12 col-xs-12">
									<div class="createbtn messagebtn">
										<a data-toggle="modal" data-target="#myModal3" class="btn btn-primary messbtn">Create a Note</a>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12 col-xs-12">
								<div class="notes">
									<div class="notestitle">Notes</div>
									<div class="table-responsive">
										<table class="table notetable">
										  <tbody>
										  @foreach($notes as $note)
										    <tr>
										      <td class="notedisc">{!! \Illuminate\Support\Str::limit($note->note, 126, $end='...') !!}</td>
										      <td class="noteedit" data-toggle="modal" data-target="#myModal3" data-id="{{ $note->id }}"><a href="#"><i class="fa fa-edit"></i></a></td>
										      <td class="notetrash"><a href="{{ route('admin.notes.delete', $note->id) }}" ><i class="fa fa-trash-alt"></i></a></td>
										    </tr>
										    @endforeach
										  </tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal-1 -->
<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body" id="edit-profile-html">
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
								<input class="form-control form-control-lg inputstyle" type="message-subject" name="message-subject" placeholder="Profile">
							</div>
							<div class="form-group">
								<select class="form-control form-select">
									<option selected="">Group</option>
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
				</div>
			</div>
		</div>

	</div>
</div>

<!-- Modal-2 -->
<div class="modal fade" id="myModal2" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<div class="row">
						<div id="success-msg-update" style="display:none;" class="alert alert-success"></div>
						<div class="col-sm-6 col-xs-12 m-auto" id="update-draft-html">

							
						</div>
				</div>
			</div>
		</div>

	</div>
</div>

<!-- Modal-3 -->
<div class="modal fade" id="myModal3" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-xl">

		<!-- Modal content-->
		<div class="modal-content">
			<button type="button" class="close" data-dismiss="modal">&times;</button>

			<div id="success-notes-form" style="display:none;" class="alert alert-success"></div>
			<form id="notes-form" method="POST">
			<div class="modal-body">
			<input type="hidden" name="id" id="notes-id">
			<textarea id="summernote" required name="note"></textarea>					
				</div>
				<div class="savebtn text-center">
					<button type="button" id="notes-form-btn" class="btn btn-primary">Save</button>
				</div>
			</div>
			</form>
		</div>

	</div>
</div>


@endsection
@section('scripts')
@parent

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.js"></script>
<script>
	$(document).ready(function() {
    $('#summernote').summernote({
        lang: 'fr-FR',
        imageTitle: {
          specificAltField: true,
        },
        popover: {
            image: [
                ['imagesize', ['imageSize100', 'imageSize50', 'imageSize25']],
                ['float', ['floatLeft', 'floatRight', 'floatNone']],
                ['remove', ['removeMedia']],
                ['custom', ['imageTitle']],
            ],
        },
    });
});
</script>
<script>
	$(document).ready(function(){
		$(".messclose").click(function(){
			$(".sendmessage").css('display','none');
		});
	});
</script>
<script>
	$(document).ready(function(){
		$("#profiletoggle").click(function(){
			$(".editprofile").toggle();
		});
		$(".messbtn").click(function(){
			$(".sendmessage").toggle();
		});


		$(document).on('click', '.editshowhidedraft', function(event) {
			event.preventDefault();

			var id = $(this).attr('data-id');

		var ajaxurl = '{{route('admin.edit-draft')}}';
        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': "{{ csrf_token() }}",
          }
      });
        $.ajax({
            url: ajaxurl,
            data : {id:$(this).attr('data-id')},
            type: "post",
            success: function(data){
                $data = $(data); 
                $(".editmessagedraft").show().html($data);
            }
        });
		});


		$(document).on('click', '.editshowhide', function(event) {
			event.preventDefault();

			var id = $(this).attr('data-id');

		var ajaxurl = '{{route('admin.edit-draft')}}';
        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': "{{ csrf_token() }}",
          }
      });
        $.ajax({
            url: ajaxurl,
            data : {id:$(this).attr('data-id')},
            type: "post",
            success: function(data){
                $data = $(data); 
                $(".editmessage").show().html($data);
            }
        });


			$(".editmessage").css("display","block");
		});

		$(document).on('click', '.close-div', function(event) {
			event.preventDefault();
			$(".editmessage").css("display","none");
		});

		$(".close-div").click(function(){
			$(".editmessage").css("display","none");
		});
	});

</script>



<script>
	localStorage.setItem('activeTab', 'Freelancer');

	var activeTab = localStorage.getItem('activeTab');

	page = $('.dashboard-right .nav-tabs li a.active').attr('data-paginate');
   var SITEURL = "{{ route('admin.home') }}";
   load_more(page); //initial content load
    $('.dashboard-right .nav-tabs li a.active').attr('data-paginate',page);
   $(window).scroll(function() { //detect page scroll
      if($(window).scrollTop() + $(window).height() >= $(document).height()) {  
      	page = $('.dashboard-right .nav-tabs li a.active').attr('data-paginate');
      load_more(page); 
       page++;
       $('.dashboard-right .nav-tabs li a.active').attr('data-paginate',page);
      }
    });     
    function load_more(page){

    	var keyword = $('.dashboard-right .nav-tabs li a.active').attr('href');
    	var keyword_val = $(keyword).find('input').val();

    	var activeTab = localStorage.getItem('activeTab');
     if ((activeTab != "All") || (activeTab != 'Notes') || activeTab != "data.length") {
     	var url = SITEURL  + "?page=" + page + "&department=" + activeTab;
     }else{
     	var url = SITEURL + "?page=" + page;
     }

     if (keyword_val != '') {
     	url = url + "&keyword=" + keyword_val;
     }

     activeTab = activeTab.replace(/ /g, "-");

        $.ajax({
           url: url,
           type: "get",
           datatype: "html",
           beforeSend: function()
           {
              $('.ajax-loading-'+activeTab).show();
            }
        })
        .done(function(data)
        {
            if(data.length == 0){
            //notify user if nothing to load
            $('.ajax-loading-'+activeTab).html("");
            // $('.ajax-loading-'+activeTab).html("No more records!");
            return;
          }
          $('.ajax-loading-'+activeTab).hide();
          $("#results-"+activeTab).append(data);         
       })
       .fail(function(jqXHR, ajaxOptions, thrownError)
       {
          // alert('No response from server');
       });
    }

    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
    	$('.profile-info').empty();
    	localStorage.setItem('activeTab', $(e.target).html());
    	page = $(e.target).attr('data-paginate');
    	load_more(page);
    	page++;
    	$(e.target).attr('data-paginate',page);
    });
	$('.text-search').on('keyup', function() {
		var activeTab = localStorage.getItem('activeTab');
		$value=$(this).parent().parent().find('input[name=\'keyword\']').val();
		$.ajax({
			type : 'get',
			url : '{{ route('admin.home') }}',
			data:{'keyword':$value,'department':activeTab},
			success:function(data){
				var active_tab = activeTab.replace(/ /g, "-");
				$("#results-"+active_tab).empty();
				$("#results-"+active_tab).append(data);
				 $('.dashboard-right .nav-tabs li a.active').attr('data-paginate',2);
			}
		});
	})
</script>
<script type="text/javascript">


	$(document).on('click', '.click-profile' , function() {
		if ($(this).attr('is_close') == 'no') {
			$(this).parents('.profile-grid').parent().nextAll('.profile-info').first().hide();
			$(this).attr('is_close','yes');
			return;
		}else{
			$(this).attr('is_close','no');
		}

		$('.profile-info').hide();
		$('.profile-info').empty();
		var obj = $(this).parents('.profile-grid').parent().nextAll('.profile-info').first();

		var ajaxurl = '{{route('admin.emp-info')}}';
        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': "{{ csrf_token() }}",
          }
      });
        $.ajax({
            url: ajaxurl,
            data : {id:$(this).data('id')},
            type: "post",
            success: function(data){
                $data = $(data); 
                obj.show().html($data).fadeIn();
            }
        });

	});

	$("#draft-search").submit(function(event) {

		event.preventDefault();

		$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });

		var $form = $(this),
		url = $form.attr('action');

		$.each($form.serialize().split('&'), function (index, elem) {
			var vals = elem.split('=');
			$(".set-filter-data").attr('data-'+vals[0],decodeURIComponent((vals[1]+'').replace(/\+/g, '%20')))
		});

		var posting = $.post("{{ route('admin.filter.draft')}}", $form.serialize() + "&_token={{ csrf_token() }}");

		posting.done(function(data) {
			if(data.length == 0) {
				$('#post').empty();
				$('#post').append('<tr>No data...</tr>');
				return;
			} else {
				$('#post').empty();
				$('#post').append(data);
				$('#load-more').show();
			}
		})
		.fail(function(jqXHR, ajaxOptions, thrownError) {
			alert('Something went wrong.');
		});
	});
  </script>


<script type="text/javascript">

	$("#send-msg-to-all-all").submit(function(event) {
		$("#show-checkbox-error-all").hide();
		event.preventDefault();

		checked = $(this).find("input[type=checkbox]:checked").length;

      if(!checked) {
      	$("#show-checkbox-error-all").show();
        return false;
      }

		$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });

		var $form = $(this);

		$.ajax({
			url: '{{ route('admin.send-message') }}',
			type: 'POST',
			data: $form.serialize() + "&_token={{ csrf_token() }}",
			beforeSend: function() {
				$("#send-msg-all-all").text('Loading...');
			}
		}).done(function(data) {
			$("#send-msg-to-all-all")[0].reset();
			$("#send-msg-all-all").text('Save');
			$("#success-msg-send-allall").show().html(data.message);
			setTimeout(function() {
				$("#success-msg-send-allall").show().fadeOut('fast');
			}, 5000);
		}).fail(function() {
			$("#success-msg-send-allall").text('failed');
		});

	});


@foreach($group_employees as $key => $group_employee)

$("#send-msg-to-all-{{ $key }}").submit(function(event) {
	$("#show-checkbox-error-{{ $key }}").hide();
		event.preventDefault();

      checked = $(this).find("input[type=checkbox]:checked").length;

      if(!checked) {
      	$("#show-checkbox-error-{{ $key }}").show();
        return false;
      }

		$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });

		var $form = $(this),
		url = $form.attr('action');

		$.ajax({
			url: '{{ route('admin.send-message') }}',
			type: 'POST',
			data: $form.serialize() + "&_token={{ csrf_token() }}",
			beforeSend: function() {
				$("#send-msg-all-{{ $key }}").text('Loading...');
			}
		}).done(function(data) {
			$("#send-msg-to-all-{{ $key }}")[0].reset();
			$("#send-msg-all-{{ $key }}").text('Save');
			$("#success-msg-send-all{{ $key }}").show().html(data.message);
			setTimeout(function() {
				$("#success-msg-send-all{{ $key }}").show().fadeOut('fast');
			}, 5000);
		}).fail(function() {
			$("#success-msg-send-all{{ $key }}").text('failed');
		});

	});

@endforeach


	$("#draft-form").submit(function(event) {

		event.preventDefault();

		$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });

		var $form = $(this),
		url = $form.attr('action');

		// var posting = $.post("{{ route('admin.save-draft')}}", $form.serialize() + "&_token={{ csrf_token() }}");

		$.ajax({
			url: '{{ route('admin.save-draft') }}',
			type: 'POST',
			data: $form.serialize() + "&_token={{ csrf_token() }}",
			beforeSend: function() {
				$('#submit-btn-edit').text('Loading...');
			}
		}).done(function(data) {
			$("#draft-form")[0].reset();
			$("#draft-search").submit();
			$('#submit-btn').text('Save');
			$('#success-msg').show().html(data.message);
			setTimeout(function() {
				$('#success-msg').show().fadeOut('fast');
			}, 5000);
		}).fail(function() {
			$('#success-msg').text('failed');
		});

	});

$(document).on('submit', "#edit-draft-form", function(event) {
		event.preventDefault();

		$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });

		var $form = $(this);

		$.ajax({
			url: '{{ route('admin.update-draft-form') }}',
			type: 'POST',
			data: $form.serialize() + "&_token={{ csrf_token() }}",
			beforeSend: function() {
				$('#submit-btn-edit').text('Loading...');
			}
		}).done(function(data) {
			$("#draft-form")[0].reset();
			$('#submit-btn').text('Save');
			$('#success-msg-update').show().html(data.message);
			setTimeout(function() {
				$('#success-msg-update').show().fadeOut('fast');
				$('.close').trigger('click');
				 location.reload();
			}, 3000);
		}).fail(function() {
			$('#success-msg-update').text('failed');
		});

	});
  </script>

   <script type="text/javascript">
        $('#load-more').click(function() {
            var page = $(this).data('paginate');
            var draft_name = $(this).attr('data-draft-name');
            var draft_mobile = $(this).attr('data-draft-mobile');
            var draft_email = $(this).attr('data-draft-email');
            var draft_subject = $(this).attr('data-draft-subject');
            var draft_reciver_id = $(this).attr('data-draft-reciver_id');

            loadMoreData(page,draft_name,draft_mobile,draft_email,draft_subject,draft_reciver_id);
            $(this).data('paginate', page+1);
        });
        // run function when user click load more button
        function loadMoreData(paginate,draft_name,draft_mobile,draft_email,draft_subject,draft_reciver_id) {

        	var url = '{{ route('admin.get-draft') }}?page=' + paginate;

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
                    $('#load-more').text('Loading...');
                }
            })
            .done(function(data) {
                if(data.length == 0) {
                    $('.invisible').removeClass('invisible');
                    $('#load-more').text('Show More');
                    // $('#load-more').hide();
                    return;
                  } else {
                    $('#load-more').text('Load more...');
                    $('#post').append(data);
                    $("#div1").animate({ scrollTop: $('#scrollcl').prop("scrollHeight")}, 1000);
                  }
            })
               .fail(function(jqXHR, ajaxOptions, thrownError) {
                  alert('Something went wrong.');
               });
        }
    </script>
    <script type="text/javascript">
    	$(document).on('click', '.reset-filter', function(event) {
    		event.preventDefault(); 		
    		
    		$(".set-filter-data").attr({
    			'data-draft-name': '',
    			'data-draft-mobile': '',
    			'data-draft-email': '',
    			'data-draft-subject': '',
    			'data-draft-reciver_id': '',
    		});

    		var url = '{{ route('admin.get-draft') }}?page=1';

            $.ajax({
                url: url,
                type: 'get',
                datatype: 'html',
                beforeSend: function() {
                    $('#load-more').text('Loading...');
                }
            })
            .done(function(data) {
                if(data.length == 0) {
                    $('.invisible').removeClass('invisible');
                    $('#load-more').text('Show More');
                    // $('#load-more').hide();
                    return;
                  } else {
                    $('#load-more').text('Show More');
                    $('#post').empty();
                    $('#post').append(data);
                    $("#div1").animate({ scrollTop: $('#scrollcl').prop("scrollHeight")}, 1000);
                  }
            })
               .fail(function(jqXHR, ajaxOptions, thrownError) {
                  alert('Something went wrong.');
               });
    	});
    </script>

    <script type="text/javascript">
    	

  $(document).on('click', "#edit-item", function() {
     var id = $(this).attr('data-id');

    var options = {
      'backdrop': 'static'
    };
    $('#edit-modal').modal(options);

    var ajaxurl = '{{route('admin.update-draft')}}';
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
                $("#update-draft-html").show().html($data);
            }
        });


  });

  $(document).on('click', '.forcustom',function(){
  	var activeTab = $('.dashboard-right .nav-tabs li a.active').attr('href');
  	$(activeTab).find("input[name='keyword']").val($(this).html());
  	$(activeTab).find("input[name='keyword']").keyup();
  });

  $(document).on('click', '#send-message-wc',function(){
  	var id = $(this).attr('data-id');
  	var reciver_id = $(this).attr('data-reciver_id');
  	if (reciver_id == '') {
  		$("#messagebox-error").show();
  		return false;
  	}
  	var obj = $(this);

  	var ajaxurl = '{{route('admin.send-message-woc')}}';
  	$.ajaxSetup({
  		headers: {
  			'X-CSRF-TOKEN': "{{ csrf_token() }}",
  		}
  	});
  	$.ajax({
  		url: ajaxurl,
  		data : {id:$(this).attr('data-id')},
  		type: "post",
  		beforeSend: function()
  		{
  			obj.text('Sending...');
  		},
  		success: function(data){
  			obj.text('Sended');
  			setTimeout(function() {
  				location.reload();
  			}, 2000);
  		}
  	});
  });
  
  $(document).on('submit', "#notes-form", function(event) {
  	event.preventDefault();
  	var $form = $(this);
  	$.ajax({
  		url: '{{ route('admin.notes.store') }}',
  		type: 'POST',
  		data: $form.serialize() + "&_token={{ csrf_token() }}",
  		beforeSend: function() {
  			$('#notes-form-btn').text('Loading...');
  		}
  	}).done(function(data) {
  		$("#notes-form")[0].reset();
  		$('#notes-form-btn').text('Save');
  		$('#success-notes-form').show().html(data.message);
  		setTimeout(function() {
  			$('#success-notes-form').show().fadeOut('fast');
  			$('.close').trigger('click');
  			location.reload();
  		}, 3000);
  	}).fail(function() {
  		$('#success-notes-form').text('failed');
  	});

  });


  $(document).on('click', ".noteedit1", function() {
     var id = $(this).attr('data-id');

    var options = {
      'backdrop': 'static'
    };
    $('#myModal3').modal(options);

    var ajaxurl = '{{route('admin.notes.getData')}}';
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

            	$('#notes-id').val(id);
            	$('#summernote').summernote('editor.pasteHTML', data);

               
            }
        });


  });

    </script>

@endsection