<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add To Do Task</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Add New Task</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('todolist.index') }} "> Back</a>
                </div>
            </div> 
        </div>
        @if (session('status'))
            <div class="alert alert-success mb-1">
                {{ session('status')}} 
            </div>
        @endif
        
        <form action="{{ route('todolist.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
              
     <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="title" class="form-control" placeholder="Title">
                    @error('title') 
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }} </div>
                @enderror 
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <input  type="textarea" class="form-control" style="height:150px" name="description" placeholder="Detail">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                     <strong>Date:</strong>
                    <input type="datetime" name="due_at" class="form-control" placeholder="Title">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
     </div>
        </form>
</body>
</html>