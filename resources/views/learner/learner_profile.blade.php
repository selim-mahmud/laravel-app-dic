
@extends('layouts.main')

@section('meta')
	<title>Australian Driving Instructors Directory</title>
	<meta name="description" content="Free Web tutorials">
	<meta name="keywords" content="HTML,CSS,XML,JavaScript">
@stop


@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ol class="breadcrumb">
					  <li><a href="/">Home</a></li>
					  <li class="active">Learner profile</li>
				</ol>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<h1>My Profile Section</h1>
				<div class="profile_box">
					<h3 class="box_title"><i class="fa fa-user" aria-hidden="true"></i> {{$user->display_name}}'s profile</h3>
					<div class="box_content">
						<div class="row">
							<div class="col-md-3 col-sm-3">
							      <img class="thumbnail" width="130" height="110" src="{{App\Media::getAvatar($user_medias)}}" alt="{{$user->display_name}} profile image">
							      <p class="display_name">{{$user->display_name}}</p>
							</div>
							<div class="col-md-9 col-sm-9">
								<div class="profile_item_block">
									<div class="row">
										<div class="col-sm-3">
											<p class="title">Name:</p>
										</div>
										<div class="col-sm-9">
											<p class="desc">{{$user->name}}</p>
										</div>
									</div>
								</div>
								<div class="profile_item_block">
									<div class="row">
										<div class="col-sm-3">
											<p class="title">Display Name: <a data-toggle="tooltip" data-placement="top" title="This is name that will be displayed in public." href="#"><i class="fa fa-question-circle" aria-hidden="true"></i></a></p>
										</div>
										<div class="col-sm-9">
											<p class="desc">{{$user->display_name}}</p>
										</div>
									</div>
								</div>
								<div class="profile_item_block">
									<div class="row">
										<div class="col-sm-3">
											<p class="title">Contact Email: <a data-toggle="tooltip" data-placement="top" title="This is the email address at which you will get email from your instructor." href="#"><i class="fa fa-question-circle" aria-hidden="true"></i></a></p>
										</div>
										<div class="col-sm-9">
											@if(App\ContactEmail::getEmails($user_emails))
											<p class="desc">{{App\ContactEmail::getEmails($user_emails)}}</p>
											@else
											<p class="desc">No email found. <a href="{{url('learner-profile-edit')}}" class="btn btn-default">Set it here</a></p>
											@endif
										</div>
									</div>
								</div>
								<div class="profile_item_block">
									<div class="row">
										<div class="col-sm-3">
											<p class="title">Phone Number: <a data-toggle="tooltip" data-placement="top" title="This phone number will only be accessible by your instructor." href="#"><i class="fa fa-question-circle" aria-hidden="true"></i></a></p>
										</div>
										<div class="col-sm-9">
											@if(App\ContactNumber::getPhones($user_phones))
											<p class="desc">{{App\ContactNumber::getPhones($user_phones)}}</p>
											@else
											<p class="desc">No phone number found. <a href="{{url('learner-profile-edit')}}" class="btn btn-default">Set it here</a></p>
											@endif
										</div>
									</div>
								</div>
								<div class="profile_item_block">
									<div class="row">
										<div class="col-sm-3">
											<p class="title">Address: <a data-toggle="tooltip" data-placement="top" title="This is the address from where you want your instructor to pick you." href="#"><i class="fa fa-question-circle" aria-hidden="true"></i></a></p>
										</div>
										<div class="col-sm-9">
											@if(App\ContactAddress::getAddresses($user_addresses))
											<p class="desc">{!!App\ContactAddress::getAddresses($user_addresses)!!}</p>
											@else
											<p class="desc">No address found. <a href="{{url('learner-profile-edit')}}" class="btn btn-default">Set it here</a></p>
											@endif
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div><!-- end of .container -->

	<br />
@stop