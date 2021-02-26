@extends('blogs.layout')
@section('content')
@if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
        </div>
        <img src="{{ Session::get('image') }}">
        @endif

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="pull-right mb-2">
            <a class="btn btn-primary" href="{{ route('blogs.index') }}"> Back</a>
        </div>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Images </h2>
            </div>
            
        </div>
    </div>
    
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group"  enctype="multipart/form-data">
                <strong>Title:</strong>
                               {{ $blog->title }}

                
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group"  enctype="multipart/form-data">
                <strong>Description:</strong>
                {{ $blog->description }}
            </div>
        </div>
    </div>
     <div class="mb-5">
        <form action="{{ route('image.upload.post', $blog->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-5">
                    <input type="string" name="name" class="form-control">
                </div>

                <div class="col-md-5">
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="col-md-2">
                    <button type="submit" class="btn btn-success">Upload</button>
                </div>

            </div>
        </form>
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
        <div id="center" class="col-lg-4 p-5">
        <div class="card" style="width: 18rem;">
            <img src="{{ $image->path }}" alt="{{ $image->name }}"/>
            <div class="card-body">
              <p class="card-text"> {{ $image->name }}</p>
            </div>
          </div>
    </div>
        @endforeach
    </table>
 
@endsection