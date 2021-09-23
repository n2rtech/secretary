@extends('layouts.master')
@section('title','Dashboard')
@section('content')
<div class="container-fluid p-3">
	<div class="row">
		<div class="col-sm-6 border-right">
			<div class="dashboard-left">
				<!--Search Keyword-->
				<h2>Most Searched Keyword</h2>
				<div class="searchkeyword">
					<ul class="list-inline">
						<li>
							<div class="radio">
								<label>
									<input type="radio" class="btn-check" name="btnradio" autocomplete="off">        
									<span class="forcustom">Daniel Ollson</span>
									<span class="counter">5</span>
								</label>
							</div>
						</li>
						<li>
							<div class="radio">
								<label>
									<input type="radio" class="btn-check" name="btnradio" autocomplete="off">        
									<span class="forcustom">Paddy O'Furniture.</span>
									<span class="counter">5</span>
								</label>
							</div>
						</li>
						<li>
							<div class="radio">
								<label>
									<input type="radio" class="btn-check" name="btnradio" autocomplete="off">        
									<span class="forcustom">olive@gmail.com</span>
									<span class="counter">5</span>
								</label>
							</div>
						</li>
						<li>
							<div class="radio">
								<label>
									<input type="radio" class="btn-check" name="btnradio" autocomplete="off">        
									<span class="forcustom">hugo@gmail.com</span>
									<span class="counter">5</span>
								</label>
							</div>
						</li>
						<li>
							<div class="radio">
								<label>
									<input type="radio" class="btn-check" name="btnradio" autocomplete="off">        
									<span class="forcustom">999888666</span>
									<span class="counter">5</span>
								</label>
							</div>
						</li>
						<li>
							<div class="radio">
								<label>
									<input type="radio" class="btn-check" name="btnradio" autocomplete="off">        
									<span class="forcustom">frank@gmail.com</span>
									<span class="counter">5</span>
								</label>
							</div>
						</li>
						<li>
							<div class="radio">
								<label>
									<input type="radio" class="btn-check" name="btnradio" autocomplete="off">        
									<span class="forcustom">cherry@gmail.com</span>
									<span class="counter">5</span>
								</label>
							</div>
						</li>
						<li>
							<div class="radio">
								<label>
									<input type="radio" class="btn-check" name="btnradio" autocomplete="off">        
									<span class="forcustom">John Quil</span>
									<span class="counter">5</span>
								</label>
							</div>
						</li>
						<li>
							<div class="radio">
								<label>
									<input type="radio" class="btn-check" name="btnradio" autocomplete="off">        
									<span class="forcustom">Aida Bugg</span>
									<span class="counter">5</span>
								</label>
							</div>
						</li>
						<li>
							<div class="radio">
								<label>
									<input type="radio" class="btn-check" name="btnradio" autocomplete="off">        
									<span class="forcustom">Daniel Ollson</span>
									<span class="counter">5</span>
								</label>
							</div>
						</li>
						<li>
							<div class="radio">
								<label>
									<input type="radio" class="btn-check" name="btnradio" autocomplete="off">        
									<span class="forcustom">Paddy O'Furniture.</span>
									<span class="counter">5</span>
								</label>
							</div>
						</li>
						<li>
							<div class="radio">
								<label>
									<input type="radio" class="btn-check" name="btnradio" autocomplete="off">        
									<span class="forcustom">olive@gmail.com</span>
									<span class="counter">5</span>
								</label>
							</div>
						</li>
						<li>
							<div class="radio">
								<label>
									<input type="radio" class="btn-check" name="btnradio" autocomplete="off">        
									<span class="forcustom">hugo@gmail.com</span>
									<span class="counter">5</span>
								</label>
							</div>
						</li>
						<li>
							<div class="radio">
								<label>
									<input type="radio" class="btn-check" name="btnradio" autocomplete="off">        
									<span class="forcustom">999888666</span>
									<span class="counter">5</span>
								</label>
							</div>
						</li>
						<li>
							<div class="radio">
								<label>
									<input type="radio" class="btn-check" name="btnradio" autocomplete="off">        
									<span class="forcustom">frank@gmail.com</span>
									<span class="counter">5</span>
								</label>
							</div>
						</li>
						<li>
							<div class="radio">
								<label>
									<input type="radio" class="btn-check" name="btnradio" autocomplete="off">        
									<span class="forcustom">cherry@gmail.com</span>
									<span class="counter">5</span>
								</label>
							</div>
						</li>
						<li>
							<div class="radio">
								<label>
									<input type="radio" class="btn-check" name="btnradio" autocomplete="off">        
									<span class="forcustom">John Quil</span>
									<span class="counter">5</span>
								</label>
							</div>
						</li>
						<li>
							<div class="radio">
								<label>
									<input type="radio" class="btn-check" name="btnradio" autocomplete="off">        
									<span class="forcustom">Aida Bugg</span>
									<span class="counter">5</span>
								</label>
							</div>
						</li>

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
					<li><a data-toggle="tab" href="#menu6">All</a></li>
					<li><a class="active" data-toggle="tab" href="#menu1">Sales</a></li>
					<li><a data-toggle="tab" href="#menu2">HR</a></li>
					<li><a data-toggle="tab" href="#menu3">Management</a></li>
					<li><a data-toggle="tab" href="#menu4">TL</a></li>
					<li><a data-toggle="tab" href="#menu5">Notes</a></li>
				</ul>
				<div class="tab-content">
					<div id="menu6" class="tab-pane fade">
						<div class="searchmember">
							<div class="row">
								<div class="col-sm-4">
									<div class="messagebtn">
										<button type="button" class="btn btn-primary">Send Message To All</button>
									</div>
								</div>
								<div class="col-sm-8">
									<div id="searchinput" class="input-group">
										<input type="text" name="search" placeholder="Search Members" class="form-control inputstyle">
										<span class="input-group-btn">
											<i class="fa fa-search"></i>
										</span>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
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
												<div class="protitle"><a href="#">Daniel Ollson</a></div>
												<div class="propost">Senior Manager</div>
												<div class="posttag">Sales, Management</div>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="contactno">
												<span>9998887776</span>
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
							<div class="col-sm-4">
								<div class="profile-grid">
									<div class="row">
										<div class="col-sm-4">
											<div class="profileimg">
												<img src="{{asset('img/proimage2.png')}}" alt="Profile" class="img-fluid">
												<i class="fa fa-times"></i>
											</div>
										</div>
										<div class="col-sm-8">
											<div class="profiledisc">
												<div class="protitle"><a href="#">Paige Turner</a></div>
												<div class="propost">Senior Manager</div>
												<div class="posttag">Sales, Management</div>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="contactno">
												<span class="busy">Busy</span>
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
							<div class="col-sm-4">
								<div class="profile-grid">
									<div class="row">
										<div class="col-sm-4">
											<div class="profileimg">
												<img src="{{asset('img/proimage3.png')}}" alt="Profile" class="img-fluid">
												<i class="fa fa-check"></i>
											</div>
										</div>
										<div class="col-sm-8">
											<div class="profiledisc">
												<div class="protitle"><a href="#">Rhoda Report</a></div>
												<div class="propost">Senior Manager</div>
												<div class="posttag">Sales, Management</div>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="contactno">
												<span>9998887776</span>
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
						</div>

						<div class="row">
							<div class="col-sm-4">
								<div class="profile-grid">
									<div class="row">
										<div class="col-sm-4">
											<div class="profileimg">
												<img src="{{asset('img/proimage3.png')}}" alt="Profile" class="img-fluid">
												<i class="fa fa-times"></i>
											</div>
										</div>
										<div class="col-sm-8">
											<div class="profiledisc">
												<div class="protitle"><a href="#">Rhoda Report</a></div>
												<div class="propost">Senior Manager</div>
												<div class="posttag">Sales, Management</div>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="contactno">
												<span class="busy">Busy</span>
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
												<div class="protitle"><a href="#">Rhoda Report</a></div>
												<div class="propost">Senior Manager</div>
												<div class="posttag">Sales, Management</div>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="contactno">
												<span>9998887776</span>
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
							<div class="col-sm-4">
								<div class="profile-grid">
									<div class="row">
										<div class="col-sm-4">
											<div class="profileimg">
												<img src="{{asset('img/proimage2.png')}}" alt="Profile" class="img-fluid">
												<i class="fa fa-check"></i>
											</div>
										</div>
										<div class="col-sm-8">
											<div class="profiledisc">
												<div class="protitle"><a href="#">Paige Turner</a></div>
												<div class="propost">Senior Manager</div>
												<div class="posttag">Sales, Management</div>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="contactno">
												<span>9998887776</span>
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
							
						</div>
						<div class="row">
							<div class="col-sm-4">
								<div class="profile-grid">
									<div class="row">
										<div class="col-sm-4">
											<div class="profileimg">
												<img src="{{asset('img/proimage3.png')}}" alt="Profile" class="img-fluid">
												<i class="fa fa-check"></i>
											</div>
										</div>
										<div class="col-sm-8">
											<div class="profiledisc">
												<div class="protitle"><a href="#">Daniel Ollson</a></div>
												<div class="propost">Senior Manager</div>
												<div class="posttag">Sales, Management</div>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="contactno">
												<span>9998887776</span>
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
							<div class="col-sm-4">
								<div class="profile-grid">
									<div class="row">
										<div class="col-sm-4">
											<div class="profileimg">
												<img src="{{asset('img/proimage2.png')}}" alt="Profile" class="img-fluid">
												<i class="fa fa-times"></i>
											</div>
										</div>
										<div class="col-sm-8">
											<div class="profiledisc">
												<div class="protitle"><a href="#">Paige Turner</a></div>
												<div class="propost">Senior Manager</div>
												<div class="posttag">Sales, Management</div>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="contactno">
												<span class="busy">Busy</span>
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
							<div class="col-sm-4">
								<div class="profile-grid">
									<div class="row">
										<div class="col-sm-4">
											<div class="profileimg">
												<img src="{{asset('img/proimage3.png')}}" alt="Profile" class="img-fluid">
												<i class="fa fa-check"></i>
											</div>
										</div>
										<div class="col-sm-8">
											<div class="profiledisc">
												<div class="protitle"><a href="#">Rhoda Report</a></div>
												<div class="propost">Senior Manager</div>
												<div class="posttag">Sales, Management</div>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="contactno">
												<span>9998887776</span>
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
						</div>
						<div class="row">
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
												<div class="protitle"><a href="#">Daniel Ollson</a></div>
												<div class="propost">Senior Manager</div>
												<div class="posttag">Sales, Management</div>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="contactno">
												<span>9998887776</span>
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
							<div class="col-sm-4">
								<div class="profile-grid">
									<div class="row">
										<div class="col-sm-4">
											<div class="profileimg">
												<img src="{{asset('img/proimage2.png')}}" alt="Profile" class="img-fluid">
												<i class="fa fa-times"></i>
											</div>
										</div>
										<div class="col-sm-8">
											<div class="profiledisc">
												<div class="protitle"><a href="#">Paige Turner</a></div>
												<div class="propost">Senior Manager</div>
												<div class="posttag">Sales, Management</div>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="contactno">
												<span class="busy">Busy</span>
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
							<div class="col-sm-4">
								<div class="profile-grid">
									<div class="row">
										<div class="col-sm-4">
											<div class="profileimg">
												<img src="{{asset('img/proimage3.png')}}" alt="Profile" class="img-fluid">
												<i class="fa fa-check"></i>
											</div>
										</div>
										<div class="col-sm-8">
											<div class="profiledisc">
												<div class="protitle"><a href="#">Rhoda Report</a></div>
												<div class="propost">Senior Manager</div>
												<div class="posttag">Sales, Management</div>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="contactno">
												<span>9998887776</span>
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
						</div>
					</div>
					<div id="menu1" class="tab-pane active">
						<div class="searchmember">
							<div class="row">
								<div class="col-sm-5">
									<div class="messagebtn">
										<button type="button" class="btn btn-primary messbtn">Send Message To Sales</button>
									</div>
								</div>
								<div class="col-sm-7">
									<div id="searchinput" class="input-group">
										<input type="text" name="search" placeholder="Search Members" class="form-control inputstyle">
										<span class="input-group-btn">
											<i class="fa fa-search"></i>
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
						<div class="row">
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
												<div class="protitle"><a href="javascript:void(0)" id="profiletoggle">Daniel Ollson</a></div>
												<div class="propost">Senior Manager</div>
												<div class="posttag">Sales, Management</div>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="contactno">
												<span>9998887776</span>
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
							<div class="col-sm-4">
								<div class="profile-grid">
									<div class="row">
										<div class="col-sm-4">
											<div class="profileimg">
												<img src="{{asset('img/proimage2.png')}}" alt="Profile" class="img-fluid">
												<i class="fa fa-times"></i>
											</div>
										</div>
										<div class="col-sm-8">
											<div class="profiledisc">
												<div class="protitle"><a href="#">Paige Turner</a></div>
												<div class="propost">Senior Manager</div>
												<div class="posttag">Sales, Management</div>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="contactno">
												<span class="busy">Busy</span>
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
							<div class="col-sm-4">
								<div class="profile-grid">
									<div class="row">
										<div class="col-sm-4">
											<div class="profileimg">
												<img src="{{asset('img/proimage3.png')}}" alt="Profile" class="img-fluid">
												<i class="fa fa-check"></i>
											</div>
										</div>
										<div class="col-sm-8">
											<div class="profiledisc">
												<div class="protitle"><a href="#">Rhoda Report</a></div>
												<div class="propost">Senior Manager</div>
												<div class="posttag">Sales, Management</div>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="contactno">
												<span>9998887776</span>
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
						</div>
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
						<div class="row">
							<div class="col-sm-4">
								<div class="profile-grid">
									<div class="row">
										<div class="col-sm-4">
											<div class="profileimg">
												<img src="{{asset('img/proimage3.png')}}" alt="Profile" class="img-fluid">
												<i class="fa fa-times"></i>
											</div>
										</div>
										<div class="col-sm-8">
											<div class="profiledisc">
												<div class="protitle"><a href="#">Rhoda Report</a></div>
												<div class="propost">Senior Manager</div>
												<div class="posttag">Sales, Management</div>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="contactno">
												<span class="busy">Busy</span>
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
												<div class="protitle"><a href="#">Rhoda Report</a></div>
												<div class="propost">Senior Manager</div>
												<div class="posttag">Sales, Management</div>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="contactno">
												<span>9998887776</span>
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
							<div class="col-sm-4">
								<div class="profile-grid">
									<div class="row">
										<div class="col-sm-4">
											<div class="profileimg">
												<img src="{{asset('img/proimage2.png')}}" alt="Profile" class="img-fluid">
												<i class="fa fa-check"></i>
											</div>
										</div>
										<div class="col-sm-8">
											<div class="profiledisc">
												<div class="protitle"><a href="#">Paige Turner</a></div>
												<div class="propost">Senior Manager</div>
												<div class="posttag">Sales, Management</div>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="contactno">
												<span>9998887776</span>
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
							
						</div>
					</div>
					<div id="menu2" class="tab-pane fade">
						<div class="searchmember">
							<div class="row">
								<div class="col-sm-5">
									<div class="messagebtn">
										<button type="button" class="btn btn-primary">Send Message To HR</button>
									</div>
								</div>
								<div class="col-sm-7">
									<div id="searchinput" class="input-group">
										<input type="text" name="search" placeholder="Search Members" class="form-control inputstyle">
										<span class="input-group-btn">
											<i class="fa fa-search"></i>
										</span>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
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
												<div class="protitle"><a href="#" onclick="yourFunction()">Daniel Ollson</a></div>
												<div class="propost">Senior Manager</div>
												<div class="posttag">Sales, Management</div>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="contactno">
												<span>9998887776</span>
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
							<div class="col-sm-4">
								<div class="profile-grid">
									<div class="row">
										<div class="col-sm-4">
											<div class="profileimg">
												<img src="{{asset('img/proimage2.png')}}" alt="Profile" class="img-fluid">
												<i class="fa fa-times"></i>
											</div>
										</div>
										<div class="col-sm-8">
											<div class="profiledisc">
												<div class="protitle"><a href="#">Paige Turner</a></div>
												<div class="propost">Senior Manager</div>
												<div class="posttag">Sales, Management</div>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="contactno">
												<span class="busy">Busy</span>
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
							<div class="col-sm-4">
								<div class="profile-grid">
									<div class="row">
										<div class="col-sm-4">
											<div class="profileimg">
												<img src="{{asset('img/proimage3.png')}}" alt="Profile" class="img-fluid">
												<i class="fa fa-check"></i>
											</div>
										</div>
										<div class="col-sm-8">
											<div class="profiledisc">
												<div class="protitle"><a href="#">Rhoda Report</a></div>
												<div class="propost">Senior Manager</div>
												<div class="posttag">Sales, Management</div>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="contactno">
												<span>9998887776</span>
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
						</div>
						<div class="row">
							<div class="col-sm-4">
								<div class="profile-grid">
									<div class="row">
										<div class="col-sm-4">
											<div class="profileimg">
												<img src="{{asset('img/proimage3.png')}}" alt="Profile" class="img-fluid">
												<i class="fa fa-times"></i>
											</div>
										</div>
										<div class="col-sm-8">
											<div class="profiledisc">
												<div class="protitle"><a href="#">Rhoda Report</a></div>
												<div class="propost">Senior Manager</div>
												<div class="posttag">Sales, Management</div>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="contactno">
												<span class="busy">Busy</span>
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
												<div class="protitle"><a href="#">Rhoda Report</a></div>
												<div class="propost">Senior Manager</div>
												<div class="posttag">Sales, Management</div>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="contactno">
												<span>9998887776</span>
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
							<div class="col-sm-4">
								<div class="profile-grid">
									<div class="row">
										<div class="col-sm-4">
											<div class="profileimg">
												<img src="{{asset('img/proimage2.png')}}" alt="Profile" class="img-fluid">
												<i class="fa fa-check"></i>
											</div>
										</div>
										<div class="col-sm-8">
											<div class="profiledisc">
												<div class="protitle"><a href="#">Paige Turner</a></div>
												<div class="propost">Senior Manager</div>
												<div class="posttag">Sales, Management</div>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="contactno">
												<span>9998887776</span>
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
							
						</div>
						
					</div>
					<div id="menu3" class="tab-pane fade">
						
						<div class="searchmember">
							<div class="row">
								<div class="col-sm-6">
									<div class="messagebtn">
										<button type="button" class="btn btn-primary">Send Message To Management</button>
									</div>
								</div>
								<div class="col-sm-6">
									<div id="searchinput" class="input-group">
										<input type="text" name="search" placeholder="Search Members" class="form-control inputstyle">
										<span class="input-group-btn">
											<i class="fa fa-search"></i>
										</span>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
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
												<div class="protitle"><a href="#" onclick="yourFunction()">Daniel Ollson</a></div>
												<div class="propost">Senior Manager</div>
												<div class="posttag">Sales, Management</div>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="contactno">
												<span>9998887776</span>
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
							<div class="col-sm-4">
								<div class="profile-grid">
									<div class="row">
										<div class="col-sm-4">
											<div class="profileimg">
												<img src="{{asset('img/proimage2.png')}}" alt="Profile" class="img-fluid">
												<i class="fa fa-times"></i>
											</div>
										</div>
										<div class="col-sm-8">
											<div class="profiledisc">
												<div class="protitle"><a href="#">Paige Turner</a></div>
												<div class="propost">Senior Manager</div>
												<div class="posttag">Sales, Management</div>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="contactno">
												<span class="busy">Busy</span>
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
							<div class="col-sm-4">
								<div class="profile-grid">
									<div class="row">
										<div class="col-sm-4">
											<div class="profileimg">
												<img src="{{asset('img/proimage3.png')}}" alt="Profile" class="img-fluid">
												<i class="fa fa-check"></i>
											</div>
										</div>
										<div class="col-sm-8">
											<div class="profiledisc">
												<div class="protitle"><a href="#">Rhoda Report</a></div>
												<div class="propost">Senior Manager</div>
												<div class="posttag">Sales, Management</div>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="contactno">
												<span>9998887776</span>
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
						</div>
						<div class="row">
							<div class="col-sm-4">
								<div class="profile-grid">
									<div class="row">
										<div class="col-sm-4">
											<div class="profileimg">
												<img src="{{asset('img/proimage3.png')}}" alt="Profile" class="img-fluid">
												<i class="fa fa-times"></i>
											</div>
										</div>
										<div class="col-sm-8">
											<div class="profiledisc">
												<div class="protitle"><a href="#">Rhoda Report</a></div>
												<div class="propost">Senior Manager</div>
												<div class="posttag">Sales, Management</div>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="contactno">
												<span class="busy">Busy</span>
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
												<div class="protitle"><a href="#">Rhoda Report</a></div>
												<div class="propost">Senior Manager</div>
												<div class="posttag">Sales, Management</div>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="contactno">
												<span>9998887776</span>
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
							<div class="col-sm-4">
								<div class="profile-grid">
									<div class="row">
										<div class="col-sm-4">
											<div class="profileimg">
												<img src="{{asset('img/proimage2.png')}}" alt="Profile" class="img-fluid">
												<i class="fa fa-check"></i>
											</div>
										</div>
										<div class="col-sm-8">
											<div class="profiledisc">
												<div class="protitle"><a href="#">Paige Turner</a></div>
												<div class="propost">Senior Manager</div>
												<div class="posttag">Sales, Management</div>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="contactno">
												<span>9998887776</span>
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
							
						</div>
					</div>
					<div id="menu4" class="tab-pane fade">
						<div class="searchmember">
							<div class="row">
								<div class="col-sm-5">
									<div class="messagebtn">
										<button type="button" class="btn btn-primary">Send Message To TL</button>
									</div>
								</div>
								<div class="col-sm-7">
									<div id="searchinput" class="input-group">
										<input type="text" name="search" placeholder="Search Members" class="form-control inputstyle">
										<span class="input-group-btn">
											<i class="fa fa-search"></i>
										</span>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
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
												<div class="protitle"><a href="#" onclick="yourFunction()">Daniel Ollson</a></div>
												<div class="propost">Senior Manager</div>
												<div class="posttag">Sales, Management</div>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="contactno">
												<span>9998887776</span>
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
							<div class="col-sm-4">
								<div class="profile-grid">
									<div class="row">
										<div class="col-sm-4">
											<div class="profileimg">
												<img src="{{asset('img/proimage2.png')}}" alt="Profile" class="img-fluid">
												<i class="fa fa-times"></i>
											</div>
										</div>
										<div class="col-sm-8">
											<div class="profiledisc">
												<div class="protitle"><a href="#">Paige Turner</a></div>
												<div class="propost">Senior Manager</div>
												<div class="posttag">Sales, Management</div>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="contactno">
												<span class="busy">Busy</span>
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
							<div class="col-sm-4">
								<div class="profile-grid">
									<div class="row">
										<div class="col-sm-4">
											<div class="profileimg">
												<img src="{{asset('img/proimage3.png')}}" alt="Profile" class="img-fluid">
												<i class="fa fa-check"></i>
											</div>
										</div>
										<div class="col-sm-8">
											<div class="profiledisc">
												<div class="protitle"><a href="#">Rhoda Report</a></div>
												<div class="propost">Senior Manager</div>
												<div class="posttag">Sales, Management</div>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="contactno">
												<span>9998887776</span>
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
						</div>
						<div class="row">
							<div class="col-sm-4">
								<div class="profile-grid">
									<div class="row">
										<div class="col-sm-4">
											<div class="profileimg">
												<img src="{{asset('img/proimage3.png')}}" alt="Profile" class="img-fluid">
												<i class="fa fa-times"></i>
											</div>
										</div>
										<div class="col-sm-8">
											<div class="profiledisc">
												<div class="protitle"><a href="#">Rhoda Report</a></div>
												<div class="propost">Senior Manager</div>
												<div class="posttag">Sales, Management</div>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="contactno">
												<span class="busy">Busy</span>
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
												<div class="protitle"><a href="#">Rhoda Report</a></div>
												<div class="propost">Senior Manager</div>
												<div class="posttag">Sales, Management</div>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="contactno">
												<span>9998887776</span>
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
							<div class="col-sm-4">
								<div class="profile-grid">
									<div class="row">
										<div class="col-sm-4">
											<div class="profileimg">
												<img src="{{asset('img/proimage2.png')}}" alt="Profile" class="img-fluid">
												<i class="fa fa-check"></i>
											</div>
										</div>
										<div class="col-sm-8">
											<div class="profiledisc">
												<div class="protitle"><a href="#">Paige Turner</a></div>
												<div class="propost">Senior Manager</div>
												<div class="posttag">Sales, Management</div>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="contactno">
												<span>9998887776</span>
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
							
						</div>
					</div>
					<div id="menu5" class="tab-pane fade">
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

@endsection