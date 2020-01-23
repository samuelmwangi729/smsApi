@extends('layouts.app')

@section('content')
<div class="row">
    @foreach ($numbers as $number)
    <div class="col-sm-2 col-xs-2 col-md-2 col-lg-2">
        {{ $number->number }}
    </div>
    @endforeach
</div>


<div class="container pull-right">{{ $numbers->links() }}</div>
@stop