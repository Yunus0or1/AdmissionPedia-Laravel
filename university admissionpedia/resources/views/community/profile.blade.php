
@extends('community.base_profile')

@section('css')

@endsection

@section('details')
				<div class="page-wrapper">
				
					<div class="container-fluid">

						<div class="row">
							<!-- Column -->
							<div class="col-lg-4 col-xlg-3 col-md-5">
								<div class="card">
									<div class="card-block">
									
									{{-- 
									This is comment
									When rendering from storage it is bit tough. Cause {{asset()}} works from public folder
									but storage works from storage folder. So in config/filesystem.php it has been written 
									that uld is localhost/storage. So this url will access storage_path('app/public'),
									so default absolute url is localhost/storage/app/public . Now enter your folder name 
									.In my case it it upload.
									This is comment  
									--}}
									
										<center class="m-t-30"> <img src="{{ url('storage/upload/'.$user->imagepath) }}" class="img-circle" width="150" />
											<h4 class="card-title m-t-10">Name : {{$user->user_name}}</h4>
											<h6 class="card-subtitle">Email : {{$user->email}}</h6>
											<div class="row text-center justify-content-md-center">
												<div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-people"></i> <font class="font-medium">254</font></a></div>
												<div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-picture"></i> <font class="font-medium">54</font></a></div>
											</div>
										</center>
									</div>
								</div>
							</div>
							<!-- Column -->
							<!-- Column -->
							<div class="col-lg-8 col-xlg-9 col-md-7">
								<div class="card">
									<div class="card-block">
										<form class="form-horizontal form-material" method="post" action="/profile">
										{{ csrf_field() }}
											<div class="form-group">
												<label class="col-md-12">Full Name</label>
												<div class="col-md-12">
													<input type="text" name="full_name" placeholder="{{$user->full_name}}" class="form-control form-control-line" />
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-12">User Name</label>
												<div class="col-md-12">
													<input type="text" name="user_name" placeholder="{{$user->user_name}}" class="form-control form-control-line" />
												</div>
											</div>
											<div class="form-group">
												<label for="example-email" class="col-md-12">Email</label>
												<div class="col-md-12">
													<input type="text" name="email" placeholder="{{$user->email}}" class="form-control form-control-line" />
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-12">Password</label>
												<div class="col-md-12">
													<input type="text" name="password" placeholder="{{$user->password}}" class="form-control form-control-line" />
												</div>
											</div>
											



										<p> Click and write to edit </p>

											<div class="form-group">
												<div class="col-sm-12">
													<button class="btn btn-success">Update Profile</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
							<!-- Column -->
						</div>

					</div>
				</div>
		</div>
	</div>
	

@endsection











