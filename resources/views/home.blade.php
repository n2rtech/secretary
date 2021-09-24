@extends('layouts.master')
@section('title','Dashboard')
@section('content')
<style>
   .ajax-loading{
     text-align: center;
   }
</style>
<div class="container-fluid p-3">
	<div class="row">
		<div class="col-sm-6 border-right">
			<div class="dashboard-left">
				<!--Search Keyword-->
				<h2>Most Searched Keyword</h2>
				<div class="searchkeyword">
					<ul class="list-inline">
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
															<form class="create">
													<div class="form-group">
														<input class="form-control form-control-lg inputstyle" type="name" name="name" placeholder="Paige Turner" disabled>
													</div>
													<div class="form-group">
														<input class="form-control form-control-lg inputstyle" type="email" name="email" placeholder="paigeturner@gmail.com" disabled>
													</div>
													<div class="form-group">
														<input class="form-control form-control-lg inputstyle" type="number" name="mobilenumber" placeholder="9999998888" disabled>
													</div>
													
													<div class="form-group">
														<textarea class="form-control" placeholder="Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been" cols="3" rows="3" disabled></textarea>
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
														<a href="javascript:void(0)" class="btn btn-primary" data-toggle="modal" data-target="#myModal2">Send Message With Corrections</a>
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
										<div class="messagetable">
											<table class="table table-striped">
												<tbody>
													<tr class="editshowhide">
														<td class="title">Paige Turner</td>
														<td class="comment">Lorem Ipsum is simply dumm…</td>
														<td class="time">11:45 AM</td>
													</tr>
													@foreach($messages as $message)
													<tr>
														<td class="title">{{ $message->subject }}</td>
														<td class="comment">{{ $message->body }}</td>
														<td class="time">{{ $message->created_at }}</td>
													</tr>
													@endforeach
												</tbody>
											</table>
										</div>
										
									</div>
									<div class="showmorebtn text-center">
										<button type="button" class="btn btn-light"> Show More</button>
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
												<form class="create">
													<div class="form-group">
														<input class="form-control form-control-lg inputstyle" type="name" name="name" placeholder="Name" />
													</div>
													<div class="form-group">
														<input class="form-control form-control-lg inputstyle" type="number" name="mobilenumber" placeholder="Mobile Number" />
													</div>
													<div class="form-group">
														<input class="form-control form-control-lg inputstyle" type="email" name="email" placeholder="Email Address" />
													</div>
													<div class="form-group">
														<input class="form-control form-control-lg inputstyle" type="message-subject" name="message-subject" placeholder="Message Subject" />
													</div>
													<div class="form-group">
														<textarea class="form-control" placeholder="Message" cols="3" rows="3"></textarea>
													</div>
													<div class="form-group">
														<select class="form-control form-select">
															<option selected>Assign To Employee</option>
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
											<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
												<form class="create filter">
													<div class="form-group">
														<input class="form-control form-control-lg inputstyle" type="name" name="name" placeholder="Name" />
													</div>
													<div class="form-group">
														<input class="form-control form-control-lg inputstyle" type="number" name="mobilenumber" placeholder="Mobile Number" />
													</div>
													<div class="form-group">
														<input class="form-control form-control-lg inputstyle" type="email" name="email" placeholder="Email Address" />
													</div>
													<div class="form-group">
														<input class="form-control form-control-lg inputstyle" type="message-subject" name="message-subject" placeholder="Message Subject" />
													</div>
													<div class="form-group">
														<select class="form-control form-select">
															<option selected>Assign To Employee</option>
															<option value="1">One</option>
															<option value="2">Two</option>
															<option value="3">Three</option>
														</select>
													</div>

													<div class="savebtn">
														<button type="button" class="btn btn-primary">Filter</button>
														<button type="button" class="btn btn-secondary">Reset Filter</button>
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
								<div class="col-sm-4">
									<div class="messagebtn">
										<button type="button" class="btn btn-primary">Send Message To All</button>
									</div>
								</div>
								<div class="col-sm-8">
									<div id="searchinput" class="input-group">
										<input type="text" name="keyword" id="keyword" placeholder="Search Members" class="form-control inputstyle">
										<span class="input-group-btn">
											<i class="button-filter fa fa-search"></i>
										</span>
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
							@if($loop->iteration % 3 == 0) 
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
								<div class="col-sm-5">
									<div class="messagebtn">
										<button type="button" class="btn btn-primary messbtn">Send Message To Sales</button>
									</div>
								</div>
								<div class="col-sm-7">
									<div id="searchinput" class="input-group">
										<input type="text" name="keyword" id="keyword" placeholder="Search Members" class="form-control inputstyle">
										<span class="input-group-btn">
											<i class="button-filter fa fa-search"></i>
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
											<form class="create">
												<div class="form-group">
													<input class="form-control form-control-lg inputstyle" type="message-subject" name="message-subject" placeholder="Message Subject">
												</div>

												<div class="form-group">
													<textarea class="form-control" placeholder="Message" cols="3" rows="3"></textarea>
												</div>

												<div class="form-group">
													<div class="form-check">
														<input class="form-check-input" type="checkbox" checked="">
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
							@if($loop->iteration % 3 == 0) 
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
						<h3>Notes</h3>
						<p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
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
			<div class="modal-body">
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
					<div class="col-sm-6 col-xs-12 m-auto">
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
								<button type="button" class="btn btn-primary">Send</button>
							</div>

						</form>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>


@endsection
@section('scripts')
@parent
<script>
	$(document).ready(function(){
		$("#profiletoggle").click(function(){
			$(".editprofile").toggle();
		});
		$(".messbtn").click(function(){
			$(".sendmessage").toggle();
		});

		$(".editshowhide").click(function(){
			$(".editmessage").css("display","block");
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
            $('.ajax-loading-'+activeTab).html("No more records!");
            return;
          }
          $('.ajax-loading-'+activeTab).hide();
          $("#results-"+activeTab).append(data);         
       })
       .fail(function(jqXHR, ajaxOptions, thrownError)
       {
          alert('No response from server');
       });
    }

    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
    	localStorage.setItem('activeTab', $(e.target).html());
    	page = $(e.target).attr('data-paginate');
    	load_more(page);
    	page++;
    	$(e.target).attr('data-paginate',page);
    });

</script>
<script type="text/javascript">
	$("document").on('click', '.click-profile' , function() {
		$('.profile-info').hide();
		var obj = $(this).parents('.profile-grid').parent().nextAll('#profile-info').first();

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
</script>
<script type="text/javascript">
	$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>
@endsection