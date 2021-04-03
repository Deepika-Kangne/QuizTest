@include('layouts.header')
@include('layouts.sidebar')
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Users</h1>
  </div>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header align-items-left py-3">
      <a href="{{asset('user/add')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Add User</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>User Type</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>User Type</th>
              <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
            @foreach($users as $key => $user)
            <tr>
              <td>
                @if($user->name)
                {{ $user->name }}
                @endif
              </td>
              <td>
                @if($user->email)
                {{ $user->email }}
                @endif
              </td>
              <td>
                @if($user->user_type)
                {{ $user->user_type }}
                @endif
              </td>
              <td>
                <a class="collapsed" href="{{ asset('user/edit/'.$user->id) }}">
                  <i class="fas fa-pencil-alt"></i>
                </a>
                <!-- <a class="collapsed" href="{{ asset('user/delete/'.$user->id) }}">
                              <i class="fas fa-trash"></i>
                            </a> -->
                <a href="{{ url('user/delete',$user->id) }}" class="btn btn-danger btn-sm confirm" data-method="DELETE" title="Delete" data-confirm="Are you sure to delete this User?">
                  <i class="fas fa-trash"></i>
                </a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>



</div>
<script>
  var deleteLinks = document.querySelectorAll('.confirm');
  for (var i = 0; i < deleteLinks.length; i++) {
    deleteLinks[i].addEventListener('click', function(event) {
      event.preventDefault();

      var choice = confirm(this.getAttribute('data-confirm'));

      if (choice) {
        window.location.href = this.getAttribute('href');
      }
    });
  }
</script>
@include("layouts.footer")