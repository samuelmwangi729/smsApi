@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card card-default">
                <div class="card-header text-center">
                    Success!!!You are logged In
                </div>
                <div class="card-body">
                    @if(Session::has('sign'))
                    <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <strong>{{Session::get('sign')}}</strong>
                    </div>
                    @endif
                <span>
                    @if(is_null(App\Sign::find(Auth::user()->id)))
                    There is no Sign available, Create a new one
                    @else
                    Your Application sign is: 
                    {{App\Sign::find(Auth::user()->id)->sign}}
                    @endif


                </span>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Get your Sign</div>

                <div class="card-body">
                <form method="post" action="{{route('sign.create')}}">
                    @csrf
                        <div class="form-group">
                            <label class="label-control" for="sign">Choose your Sign</label>
                            <input type="text" class="form-control" name="sign" required>
                        </div>
                        <div class="col-md-6 offset-md-6">
                            <button class="btn btn-success" type="submit">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
