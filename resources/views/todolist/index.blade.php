<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To-Do-List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Todo List App</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('todolist.create') }}"> Create Task</a>
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
                <th width="60px">No.</th>
                <th>Title</th>
                <th>Task Details</th>
                <th width="300px">Status</th>
            </tr>
           @foreach ($todolist as $task)
               <tr>
                <td>{{ $task->id }}</td>
                <td>{{ $task->title }}</td>
                <td>{{ $task->description }}</td>
                <td>{{ $task->due_at }}</td>
                <td>
                    <form action="{{ route('todolist.destroy',$task->id) }}" method="post">
                        <a class="btn btn-primary" href="{{ route('todolist.edit',$task->id)}}">Edit</a>

                        @csrf
                        @method('DELETE')
      
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
               </tr>
                   @endforeach
        </table>
        {!! $todolist->links() !!}
    </div>
</body>
</html>

