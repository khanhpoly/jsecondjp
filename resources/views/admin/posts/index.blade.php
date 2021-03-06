@extends('layouts.master')
@section('title')
Admin
@endsection
    @section('content')
    <div class="container">
    <div class="row">
    <div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
    <div class="panel-heading">Posts</div>
    <div class="panel-body">

    <a href="{{ url('/admin/posts/create') }}" class="btn btn-primary btn-xs" title="Add New Post"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
    <br/>
    <br/>
    <div class="table-responsive">
    <table class="table table-borderless">
    <thead>
    <tr>
    <th>ID</th><th> Title </th><th> Desctiption </th><th>Images</th><th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($posts as $item)
    <tr>
    <td>{{ $item->id }}</td>
    <td><a href="{{ $item->link() }}">{{ $item->title }}</a></td><td>{{ $item->description }}</td><td><img src="/{{ $item->images }}" class="img-responsive" alt="Image"></td>
    <td colspan="5">
    <a href="{{ url('/admin/posts/' . $item->id) }}" class="btn btn-success btn-xs" title="View Post"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
    <a href="{{ url('/admin/posts/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Post"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
    {!! Form::open([
    'method'=>'DELETE',
    'url' => ['/admin/posts', $item->id],
    'style' => 'display:inline'
    ]) !!}
    {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Post" />', array(
            'type' => 'submit',
            'class' => 'btn btn-danger btn-xs',
            'title' => 'Delete Post',
            'onclick'=>'return confirm("Confirm delete?")'
    )) !!}
    {!! Form::close() !!}
    </td>
    </tr>
    @endforeach
    </tbody>
    </table>
    <div class="pagination-wrapper"> {!! $posts->render() !!} </div>
    </div>

    </div>
    </div>
    </div>
    </div>
    </div>
    @endsection