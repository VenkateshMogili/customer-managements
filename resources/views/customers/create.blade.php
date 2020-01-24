@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
    <div class="col-lg-12">
        <h3>New Biodata</h3>
    </div>
    </div>
    @if($errors->any())
    <div class="alert alert-danger alert-dismissible">
        <strong>Whoops</strong> Something went wrong...
        <ul>
            @foreach($errors as $error)
                <li>{{$error}}</li>
            @endforeach
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
        </ul>
    </div>
    @endif

    <form action="{{route('customers.store')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <strong>First Name: </strong>
            <input type="text" name="firstname" class="form-control" placeholder="First Name"/>
        </div>
    <div class="col-md-12">
            <strong>Last Name: </strong>
            <input type="text" name="lastname" class="form-control" placeholder="Last Name"/>
        </div>
    <div class="col-md-12">
            <strong>Phone: </strong>
            <input type="text" name="phone" class="form-control" placeholder="Phone"/>
        </div>
        <div class="col-md-12">
        <br/>
            <a href="{{route('customers.index')}}" class="btn btn-sm btn-success">Back</a>
            <button type="submit" class="btn btn-success btn-sm">Submit</button>
        </div>
    </div>
    </form>
    </div>
@endsection