@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
    <div class="col-md-9">
        <h3>List Biodata</h3>
    </div>
    <div class="col-md-3">
        <a class="btn btn-sm btn-success" href="{{route('upload.index')}}">
        Upload File
        </a>
        <a class="btn btn-sm btn-success" href="{{route('customers.create')}}">
        Create New Biodata
        </a>
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

    <table class="table table-hover table-sm">
    <tr>
        <th width="50px">No.</th>
        <th width="300px">First Name</th>
        <th>Last Name</th>
        <th>Phone</th>
        <th width="250px">Action</th>
    </tr>

    @foreach($biodatas as $biodata)
    <tr>
    <td>{{++$i}}</td>
    <td>{{$biodata->firstname}}</td>
    <td>{{$biodata->lastname}}</td>
    <td>{{$biodata->phone}}</td>
    <td>
    <form method="post" action="{{route('customers.destroy',$biodata->id)}}">
        <a class="btn btn-sm btn-success" href="{{route('customers.show',$biodata->id)}}">Show</a>
        <a class="btn btn-sm btn-warning" href="{{route('customers.edit',$biodata->id)}}">Edit</a>
        @csrf
        @method('DELETE')
        <button class="btn btn-sm btn-danger" type="submit">Delete</button>
    </form>
    </td>
    </tr>
    @endforeach
    </table>

    {!! $biodatas->links() !!}
</div>
@endsection