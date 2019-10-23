@extends('layouts.backend.app')
@section('title', 'Setting')
@section('content')
@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('public/backend/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css')}}" />
<link href="{{asset('public/backend/assets/summernote/summernote.css')}}" rel="stylesheet" />
@endpush
	<div class="content">
		<div class="wraper container-fluid">
			<div class="row">
				<div class="col-sm-12">
					<div class="bg-picture text-center" style="background-image:url('{{url('public/backend/images/big/bg.jpg')}}')">
						<div class="bg-picture-overlay"></div>
						<div class="profile-info-name">
							<img src="{{url('storage/app/public/profile/',Auth::user()->image)}}" class="thumb-lg img-circle img-thumbnail" alt="profile-image">
							<h3 class="text-white">{{Auth::user()->name}}</h3>
						</div>
					</div>
					<!--/ meta -->
				</div>
			</div>
			<div class="row user-tabs">
				<div class="col-lg-6 col-md-9 col-sm-9">
					<ul class="nav nav-tabs tabs">
						<li class="active tab">
							<a href="#home-2" data-toggle="tab" aria-expanded="false" class="active"> 
								<span class="visible-xs"><i class="fa fa-home"></i></span> 
								<span class="hidden-xs">About Me</span> 
							</a> 
						</li> 

						<li class="tab"> 
							<a href="#messages-2" data-toggle="tab" aria-expanded="true"> 
								<span class="visible-xs"><i class="fa fa-envelope-o"></i></span> 
								<span class="hidden-xs">Profile Setting</span> 
							</a> 
						</li> 
						<li class="tab" > 
							<a href="#settings-2" data-toggle="tab" aria-expanded="false"> 
								<span class="visible-xs"><i class="fa fa-cog"></i></span> 
								<span class="hidden-xs">Password Settings</span> 
							</a> 
						</li> 
						<div class="indicator"></div></ul> 
					</div>

				</div>
				<div class="row">
					<div class="col-lg-12"> 

						<div class="tab-content profile-tab-content"> 
							<div class="tab-pane active" id="home-2"> 
								<div class="row">
									<div class="col-md-4">
										<!-- Personal-Information -->
										<div class="panel panel-default panel-fill">
											<div class="panel-heading"> 
												<h3 class="panel-title">Personal Information</h3> 
											</div> 
											<div class="panel-body"> 
												<div class="about-info-p">
													<strong>Name</strong>
													<br/>
													<p class="text-muted">{{Auth::user()->name}}</p>
												</div>

												<div class="about-info-p">
													<strong>Email</strong>
													<br/>
													<p class="text-muted">{{Auth::user()->email}}</p>
												</div>

											</div> 
										</div>
										<!-- Personal-Information -->

									</div>


									<div class="col-md-8">
										<!-- Personal-Information -->
										<div class="panel panel-default panel-fill">
											<div class="panel-heading"> 
												<h3 class="panel-title">About</h3> 
											</div> 
											<div class="panel-body"> 
												{!!Auth::user()->about!!}
											</div> 
										</div>
										<!-- Personal-Information -->
									</div>

								</div>
							</div> 

							<div class="tab-pane" id="messages-2">
								<!-- profile-Information -->
								<div class="panel panel-default panel-fill">
									<div class="panel-heading"> 
										<h3 class="panel-title">Profile Setting</h3> 
									</div> 
									<div class="panel-body"> 
										<form role="form" action="{{route('admin.update-profile')}}" method="POST" enctype="multipart/form-data">
											@csrf
											@method('PUT')
											<div class="form-group">
												<label for="FullName">Full Name</label>
												<input type="text" value="{{Auth::user()->name}}" id="FullName" name="name" class="form-control">
											</div>

											<div class="form-group">
												<label for="Username">Username</label>
												<input type="text" name="username" value="{{Auth::user()->username}}" id="Username" class="form-control">
											</div>

											<div class="form-group">
												<label for="Email">Email</label>
												<input type="email" name="email" value="{{Auth::user()->email}}" id="Email" class="form-control">
											</div>

											<div class="col-sm-12">
												<div class="panel panel-default">
													<div class="panel-heading"><h3 class="panel-title">About</h3></div>
													<div class="panel-body">
														<textarea name="about" class="wysihtml5 form-control" rows="9">{{Auth::user()->about}}</textarea>
													</div>
												</div>
											</div>

											<div class="form-group">
												<label for="Username">Image</label>
												<input type="file" name="image" value="{{Auth::user()->image}}" id="Username"  required="" aria-required="true">
											</div>

											<button class="btn btn-primary waves-effect waves-light w-md" type="submit">Update</button>
										</form>

									</div> 
								</div>
								<!-- profile-Information -->
							</div> 


							<div class="tab-pane" id="settings-2">
								<!-- Personal-Information -->
								<div class="panel panel-default panel-fill">
									<div class="panel-heading"> 
										<h3 class="panel-title">Password Setting</h3> 
									</div> 
									<div class="panel-body"> 
										<form role="form" action="{{route('admin.update-password')}}" method="POST">
											@csrf
											@method('PUT')
											<div class="form-group">
												<label for="Password">Old Password</label>
												<input type="password" placeholder="old password" id="Password" name="old_password" class="form-control">
											</div>
											<div class="form-group">
												<label for="RePassword">New Password</label>
												<input type="password" placeholder="new-password" name="password" id="RePassword" class="form-control">
											</div>

											<div class="form-group">
												<label for="RePassword">Confirm Password :</label>
												<input type="password" placeholder="confirm-password" name="password_confirmation" id="RePassword" class="form-control">
											</div>

											<button class="btn btn-primary waves-effect waves-light w-md" type="submit">Update</button>
										</form>

									</div> 
								</div>
								<!-- Personal-Information -->
							</div> 
						</div> 
					</div>
				</div>
			</div> <!-- container -->

		</div> <!-- content -->

	@endsection
	@push('js')
	<script type="text/javascript" src="{{asset('public/backend/assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js')}}"></script>
	<script type="text/javascript" src="{{asset('public/backend/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js')}}"></script>
	<script>

		jQuery(document).ready(function(){
			$('.wysihtml5').wysihtml5();

			$('.summernote').summernote({
                    height: 200,                 // set editor height

                    minHeight: null,             // set minimum height of editor
                    maxHeight: null,             // set maximum height of editor

                    focus: true                 // set focus to editable area after initializing summernote
                });

		});
	</script>
	@endpush