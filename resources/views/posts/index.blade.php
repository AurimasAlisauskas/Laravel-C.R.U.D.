@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
  <div class="col-md-6">
    <div class="full-right">
      <h2>CRUD Resource</h2>
    </div>
  </div>
  </div>

  @if ($message = Session::get('success'))
      <div class="alert alert-success">
          <p>{{ $message }}</p>
      </div>
  @endif

  <table class="table table-bordered">
    <tr>
      <th>No</th>
      <th>Title</th>
      <th>Body</th>
      <th class="text-center">
        <a href="{{route('posts.create')}}" class="btn btn-success btn-sm">
          <i class="glyphicon glyphicon-plus"></i>
        Add</a>
      </th>
    </tr>
    <?php $no=1; ?>
    @foreach ($post as $key => $value)
      <tr>
        <td>{{$no++}}</td>
        <td>{{ $value->title }}</td>
        <td>{{ $value->body }}</td>
        <td>
          <a class="btn btn-info btn-sm" href="{{route('posts.show',$value->id)}}">Show</a>
          <a class="btn btn-primary btn-sm" href="{{route('posts.edit',$value->id)}}">Edit</a>
            {!! Form::open(['method' => 'DELETE','route' => ['posts.destroy', $value->id],'style'=>'display:inline-block']) !!}
              <button type="submit" style="display: inline;" class="btn btn-danger btn-sm">Delete</button>
            {!! Form::close() !!}
        </td>
      </tr>
    @endforeach
  </table>
  </div>
@endsection
