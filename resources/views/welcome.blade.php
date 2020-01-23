@extends('layouts.app')

@section('content')
<div class="row">
    @foreach ($numbers as $number)
    <div class="col-sm-2">
        {{ $number->id.":".$number->number }}
    </div>
    @endforeach
</div>


<div class="container pull-right">{{ $numbers->links() }}</div>
@stop