@include('layouts.header')
@include('layouts.sidebar')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add User</h1>

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
            <form action="{{ asset('user/add') }}" class="m-form m-form--fit m-form--label-align-right" method="post">
                <div class="m-portlet__body">
                    <div class="m-form__section m-form__section--first">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />

                        <div class="form-group m-form__group row">
                            <label class="col-lg-3 col-form-label">
                                Name:
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control m-input" name="name" value="{{ Request::old('name') }}" placeholder="Enter Full Name">
                            </div>
                        </div>


                        <div class="form-group m-form__group row">
                            <label class="col-lg-3 col-form-label">
                                Email:
                            </label>
                            <div class="col-lg-6">
                                <input type="email" class="form-control m-input" name="email" value="{{ Request::old('email') }}" placeholder="Enter email">
                            </div>
                        </div>


                        <div class="form-group m-form__group row">
                            <label class="col-lg-3 col-form-label">
                                Password:
                            </label>
                            <div class="col-lg-6">
                                <input type="password" class="form-control m-input" name="password" value="{{ Request::old('password') }}" placeholder="Enter Password">
                            </div>
                        </div>

                        <div class="form-group m-form__group row">
                            <label class="col-lg-3 col-form-label">
                                User Type :
                            </label>
                            <div class="col-lg-6">
                                <select class="form-control" name="user_type">
                                    <option value="">Select user type</option>
                                    <option value="admin">Admin</option>
                                    <option value="guest">Guest</option>
                                </select>
                            </div>
                        </div>

                        <div class="m-portlet__foot m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions">
                                <div class="form-group m-form__group row">
                                    <div class="col-lg-12">
                                        <center>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <button type="button" class="btn btn-primary" onclick="window.open('{{ asset('user/add') }}','_self')">Cancel</button>
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