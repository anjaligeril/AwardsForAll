@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="panel panel-info">
                    <div class="panel-heading"><h3>Update Award Details</h3></div>
                    <div class="panel-body infoTable">
                        <form method="post" action="/updateAward/{{$singleAward->id}}"enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="col-lg-6">

                                <h5><b>Name of User :</b> {{$singleAward->user->name}}</h5>
                                <br>
                            </div>
                            <div class="form-group row">

                                <div class="col-lg-12">
                                    <label for="award">Award:</label>
                                    <input class="form-control" name="award" type="text" value="{{$singleAward->award}}">
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="description">Quote:</label>
                                    <textarea class="form-control" rows="5" name="description">{{$singleAward->description}}</textarea>
                                </div>
                            </div>


                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection