@include('layouts.header')
@include('layouts.sidebar')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Users</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
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
                            <th>Order</th>
                            <th>Quantity</th>
                            <th>ObjectID</th>
                            <th>ProductID</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Order</th>
                            <th>Quantity</th>
                            <th>ObjectID</th>
                            <th>ProductID</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($products['product_list'] as $key)
                        <tr>
                            <td>1</td>
                            <td>
                                @if(array_key_exists('name', $key))
                                {{$key['name']}}
                                @endif
                            </td>
                            <td>
                                @if(array_key_exists('_id', $key))
                                {{$key['_id']}}
                                @endif
                            </td>
                            <td>
                                @if(array_key_exists('price', $key))
                                {{$key['price']}}
                                @endif
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