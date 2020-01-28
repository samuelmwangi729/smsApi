@extends('layouts.app')

@section('content')
@if(Session::has('success'))
<div class="alert alert-success">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
<strong>{{Session::get('success')}}</strong>
</div>
@endif
@foreach ($numbers as $number)
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $number->number }}
@endforeach


<div class="container pull-right">{{ $numbers->links() }}</div>
@stop