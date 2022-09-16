@extends('layouts.adminLayout')
@section('title','Settings')
@section('content')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-1 col-md-1">
				@include('admin.inc.push-menu')
			</div>
			<div class="col-md-9 col-sm-9 col-4">
				<h1 >Settings</h1>
			</div>
            <div class="col-md-2 col-sm-2 col-2">
                <a href="{{ url()->previous()}} " class="btn btn-danger">Go Back</a>
            </div>
		</div>
	</div>
</div>
<section class="content mb-3">
	<div class="container-fluid">
		<div class="row">
            <div class="col-md-10">
                <h3> <strong> Personal information</strong> </h3>
                <div class="about-admin">
                    <form action="{{ route('infoupdate',['locale' =>$locale, 'id' => $admin->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Your Name</label>
                            <input type="text" name="name" class="form-control" value="{{$admin['name']}}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label >Your Email</label>
                            <input type="email" class="form-control" value="{{$admin['email']}}" name="email">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success">
                            Save Info
                        </button>
                    </form>

                </div>
            </div>
			<div class="col-md-10 col-lg-10 col-10 mt-3">
                <h3> <strong>Change Password </strong></h3>
				 <form action="{{ route('updateSettings', $locale) }}" method="POST">
                        @csrf
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @elseif (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <div class="mb-3">
                                <label for="oldPasswordInput" class="form-label">Old Password</label>
                                <input name="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" id="oldPasswordInput"
                                    placeholder="Old Password">
                                @error('old_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="newPasswordInput" class="form-label">New Password</label>
                                <input name="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" id="newPasswordInput"
                                    placeholder="New Password">
                                @error('new_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="confirmNewPasswordInput" class="form-label">Confirm New Password</label>
                                <input name="new_password_confirmation" type="password" class="form-control" id="confirmNewPasswordInput"
                                    placeholder="Confirm New Password">
                            </div>

                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">Save Change</button>
                        </div>

                    </form>
			</div>
		</div>
	</div>
</section>
@endsection
