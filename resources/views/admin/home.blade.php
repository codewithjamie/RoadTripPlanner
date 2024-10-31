@extends(backpack_view('blank'))

@section('content')
<div class="jumbotron">
    <h1 class="mb-4">Home</h1>

    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-2"></div>
                    <div class="col-xl-8">
                        <div class="container">
                            <img src="https://res.cloudinary.com/realityshots/image/upload/v1730401387/samples/vmoohkur1yt8mqgy5ool.gif" width="650" alt="" class="img-responsive">
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xl-4">
                                <a class="btn btn-default" href="{{ backpack_url('users') }}">Pinged Users</a>
                            </div>
                            <div class="col-xl-4">
                                <a href="{{ backpack_url('location') }}" class="btn btn-default">Pinged Locations</a>
                            </div>
                            <div class="col-xl-4">
                                <a href="{{ backpack_url('destinations') }}" class="btn btn-default">Fixed Destinations</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2"></div>
                </div>
            </div>
            <div class="card-footer">
                <p class="text-center">TRIP PLANNER</p>
            </div>
        </div>
    </div>
</div>
@endsection
