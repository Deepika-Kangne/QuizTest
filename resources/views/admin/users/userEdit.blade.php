@include('layouts.header')
@include('layouts.sidebar')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">EDIT USER</h1>

    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header align-items-left py-3">
            @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                {{ Session::get('success') }}
            </div>
            @endif
            @if($errors->any())
            @foreach($errors->all() as $key => $error)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                {{$error}}
            </div>
            @endforeach
            @endif
        </div>
        <div class="card-body">
            <!--begin::Form-->

            <form action="{{ asset('user/edit/'.$user->id) }}" class="m-form m-form--fit m-form--label-align-right" method="post">
                <div class="m-portlet__body">
                    <div class="m-form__section m-form__section--first">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />

                        <div class="form-group m-form__group row">
                            <label class="col-lg-3 col-form-label">
                                Name:
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control m-input" name="name" value="{{ Request::old('name',$user->name) }}" placeholder="Enter First Name">
                            </div>
                        </div>

                        <div class="form-group m-form__group row">
                            <label class="col-lg-3 col-form-label">
                                New Password:
                            </label>
                            <div class="col-lg-6">
                                <input type="password" class="form-control" placeholder="Enter password" id="newpassword" name="newpassword" />
                            </div>
                        </div>

                        <div class=" form-group m-form__group row">
                            <label class="col-lg-3 col-form-label">
                                Confirm New Password:
                            </label>
                            <div class="col-lg-6">
                                <input type="password" class="form-control" placeholder="Confirm your password" id="password_confirmation" name="password_confirmation" />
                            </div>
                        </div>

                        <div class="form-group m-form__group row">
                            <label class="col-lg-3 col-form-label">
                                Email:
                            </label>
                            <div class="col-lg-6">
                                <input type="email" class="form-control m-input" name="email" value="{{ Request::old('email',$user->email) }}" placeholder="Enter email">
                            </div>
                        </div>

                        <div class="form-group m-form__group row">
                            <label class="col-lg-3 col-form-label">
                                User Role (Access Level):
                            </label>
                            <div class="col-lg-6">
                                <select class="form-control" name="user_type">
                                    <option value="" @if(isset($user->user_type)) selected @endif>Select User Role</option>
                                    <option value="admin" @if($user->user_type=='admin') selected @endif>Admin</option>
                                    <option value="guest" @if($user->user_type=='guest') selected @endif>Guest</option>
                                </select>
                            </div>
                        </div>

                        <div class="m-portlet__foot m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions">
                                <div class="form-group m-form__group row">
                                    <div class="col-lg-12">
                                        <center>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                            <button type="button" class="btn btn-primary" onclick="window.open('{{ asset('users') }}','_self')">Cancel</button>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!--end::Form-->
        </div>
    </div>



</div>


@include("layouts.footer")