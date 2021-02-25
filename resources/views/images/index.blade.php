@extends('blogs.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Images </h2>
            </div>
            
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
            </div>
        </div>
    </div>
    <table class="table table-bordered">
        <tr>    
            <th>Name</th>
            <th>Path</th>
            
        </tr>
        @foreach ($images as $image)
        <tr>
            
            <td>{{ $image->name }}</td>
            <td>{{ $image->path }}</td>
            
            
          
        </tr>
        @endforeach
    </table>
@endsection