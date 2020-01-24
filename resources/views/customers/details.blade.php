@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
    <div class="col-lg-12">
        <h3>Detail Biodata</h3>
        <hr>
    </div>
    </div>
    <div class="row">
    <div class="col-lg-12">
        <div class="form-group">
        <strong>First Name: </strong> {{$biodata->firstname}}
        </div>
    </div>
    <div class="col-lg-12">
        <div class="form-group">
        <strong>Last Name: </strong> {{$biodata->lastname}}
        </div>
    </div>
    <div class="col-lg-12">
        <div class="form-group">
        <strong>Phone: </strong> {{$biodata->phone}}
        </div>
    </div>
    <div class="col-lg-12">
    <a href="{{route('customers.index')}}" class="btn btn-sm btn-success">Back</a>
    </div>
    </div>

    </div>
@endsection