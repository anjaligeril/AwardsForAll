@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
       <h2><b>My Awards</b></h2>

        <div class="col-lg-8 col-lg-offset-2">

            <form method="POST" action="/searchAwards"enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group input-group">
                    <input type="text" class="form-control" id="detail"  name="detail" placeholder="Search">
                    <span class="input-group-addon"><button type="submit" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-search"></span></button></span>
                </div>
            </form>


        </div>
        @if($userAwards->isEmpty())
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
        @foreach($userAwards as $award)
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 " >
                <div class="panel panel-primary " >
                    <div class="panel-heading"><h3>Award winner:  {{$award->user->name}}</h3></div>
                    <div class="panel-body infoTable">
                       <h4><b>Details of Award</b></h4>
                        <hr>
                        <h4>Name of Award:  {{$award->award}}</h4>
                        <h4> Description: {{$award->description}}</h4>

                    </div>
                </div>
            </div>
        @endforeach
            @endif
    </div>
</div>
@endsection
