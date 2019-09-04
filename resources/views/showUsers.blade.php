@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($allusers as $singleUser)
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 " >
                    <div class="panel panel-warning " >

                        <div class="panel-heading"><h3>Name of User: {{$singleUser->name}}</h3></div>

                        <div class="panel-body infoTable">
                            <h4><b>Details of the User</b></h4>
                            <hr>
                            <h4>Email: {{$singleUser->email}}</h4>
                            <a href="/addAwards/{{$singleUser->id}}" class="btn btn-success btn-sm " >Add Awards</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


@endsection