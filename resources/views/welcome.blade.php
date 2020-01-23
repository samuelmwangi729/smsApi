@extends('layouts.app')

@section('content')
@foreach ($numbers as $number)
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $number->number }}
@endforeach


<div class="container pull-right">{{ $numbers->links() }}</div>
@stop