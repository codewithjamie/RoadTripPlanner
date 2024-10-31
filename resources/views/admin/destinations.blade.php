@extends(backpack_view('blank'))

@section('content')
<div class="jumbotron">
    <h1 class="mb-4">Fixed Destinations</h1>

    <div class="container-fluid">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">IP</th>
                    <th scope="col">Device Name</th>
                    <th scope="col">Searched Details</th>
                    <th scope="col">Destinations</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    <td>@fat</td>
                  </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
a
