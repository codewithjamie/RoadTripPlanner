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
                    <th scope="col">Destination</th>
                    <th scope="col">Longitude</th>
                    <th scope="col">Latitude</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($data as $collection)
                        <tr>
                            <th scope="row">{{ $i++ }}</th>
                            <td>{{ $collection->ip_address }}</td>
                            <td>{{ $collection->address }}</td>
                            <td>{{ $collection->longitude }}</td>
                            <td>{{ $collection->latitude }}</td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
            {{ $data->links() }}
        </div>
    </div>
</div>
@endsection
