@include('layouts.header')
@include('layouts.sidebar')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Score Board</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>User Type</th>
                            <th>Score</th>
                            <th>Attempt</th>
                            <th>Attempt At</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>User Type</th>
                            <th>Score</th>
                            <th>Attempt</th>
                            <th>Attempt At</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($Scoreboard as $key => $user)
                        @if($user->user_id==Auth::user()->id || Auth::user()->user_type == 'admin' )
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
                                @if($user->score ||$user->score==0 )
                                {{ $user->score }}
                                @endif
                            </td>
                            <td>
                                @if($user->attempt)
                                {{ $user->attempt }}
                                @endif
                            </td>
                            <td>
                                @if($user->attempt_at)
                                {{ $user->attempt_at }}
                                @endif
                            </td>
                        </tr>
                        @endif
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