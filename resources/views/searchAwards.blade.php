@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">

            @if($allAwards->isEmpty())
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div class="panel panel-info">
                        <div class="panel-heading"><h3>Add Awards</h3></div>
                        <div class="panel-body infoTable">
                            <h4>Award will be published soon. Check again later..</h4>
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
                        <div class="panel-body infoTable">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                <form method="POST" action="/searchAwards"enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="form-group input-group">
                                        <input type="text" class="form-control" id="detail"  name="detail" placeholder="Search">
                                        <span class="input-group-addon"><button type="submit" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-search"></span></button></span>
                                    </div>
                                </form>


                            </div>
                            <table class="table table-hover infoTable">
                                <thead>
                                <tr class="success">
                                    <th>user</th>
                                    <th>award</th>
                                    <th>description</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($allAwards as $singleAward)
                                    <tr class="info">
                                        <td>{{$singleAward->user->name}}</td>
                                        <td>{{$singleAward->award}}</td>
                                        <td>{{$singleAward->description}}</td>

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