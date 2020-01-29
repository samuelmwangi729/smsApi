@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-5 offset-lg-6">
      <div class="card card-default">
          <div class="card-header text-center">
              <u><strong>Send A Text Message</strong></u>
          </div>
          <div class="card-body">
          <form method="POST" action="{{route('sms.store')}}">
            @csrf
                <div class="form-group">
                    <label for="phone" class="label-control">Username</label>
                    <input type="text" class="form-control" placeholder="samples@sample.com" name="user" required>
                </div>
                <div class="form-group">
                    <label for="phone" class="label-control">User Sign</label>
                <input type="text" class="form-control" placeholder="eg. {{md5('sample')}}" name="sign" required>
                </div>
                <div class="form-group">
                    <label for="phone" class="label-control">Phone Number</label>
                    <input type="text" class="form-control" placeholder="+2547......." name="phone" title="Enter phone number" required>
                </div>
                <div class="form-group">
                    <label for="phone" class="label-control">Message</label>
                    <input type="text" class="form-control" placeholder="Your Message Goes Here" name="message" title="Enter the message to send " required>
                </div>
                <div class="col-lg-6 offset-5">
                    <button type="submit" class="btn btn-primary">Send</button>
                </div>
              </form>
          </div>
      </div>
    </div>
</div>
@stop