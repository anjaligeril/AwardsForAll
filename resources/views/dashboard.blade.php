@extends('layouts.app')

@section('content')
    <div class="container">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="row">

            @if($allAwards->isEmpty())
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div class="panel panel-info">
                        <div class="panel-heading"><h3>Add Awards</h3></div>
                        <div class="panel-body">
                            <h4>To awards please click on the button...</h4>
                            <a class="btn btn-danger btn-sm" href="/addAwards">Add Awards</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3"></div>


            @else
            <div class="col-lg-8 col-lg-offset-2">
                <div class="panel panel-danger">
                    <div class="panel-heading"><h3>All Awards</h3>
                        <a class="btn btn-warning btn-sm" href="/addAwards">Add Awards</a>
                    </div>
                    <div class="panel-body">
                    <table class="table table-hover infoTable">
                        <thead>
                        <tr class="success">
                            <th>user</th>
                            <th>award</th>
                            <th>description</th>
                            <th>Delete</th>
                            <th>Update</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($allAwards as $singleAward)
                            <tr class="info">
                                <td>{{$singleAward->user->name}}</td>
                                <td>{{$singleAward->award}}</td>
                                <td>{{$singleAward->description}}</td>
                                <td><a class="btn btn-danger btn-sm" href="/deleteAward/{{$singleAward->id}}">Delete</a></td>
                                <td><a class="btn btn-success btn-sm" href="/updateAwardsInfo/{{$singleAward->id}}">Update</a></td>

                            </tr>
                        @endforeach

                        <br>
                        <br>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
                @endif
        </div>
    </div>

@endsection