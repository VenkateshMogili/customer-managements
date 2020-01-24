@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
    <div class="col-lg-12">
        <h3>Upload File</h3>
    </div>
    </div>
    @if($message= Session::get('success'))
    <div class="alert alert-success alert-dismissible">
    <p>{{$message}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </p>
    </div>
    @endif

    <form action="{{route('upload.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
    <div class="input-group">
  <div class="custom-file col-md-6">
    <input type="file" name="filetoupload" class="custom-file-input" id="inputfile">
    <label class="custom-file-label" for="inputfile">Choose file</label>
  </div>
  <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="submit">Upload</button>
  </div>
</div>
        <div class="col-md-12">
        <br/>
            <a href="{{route('customers.index')}}" class="btn btn-sm btn-success">Back</a>
            <!-- <button type="submit" class="btn btn-success btn-sm">Submit</button> -->
        </div>
    </div>
    </form>
    </div>
@endsection