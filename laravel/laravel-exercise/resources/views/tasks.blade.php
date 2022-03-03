@extends('layouts.app')
 
@section('content')
 
  @if(session()->has('msg'))
    <div class="alert alert-success">
      {{ session()->get('msg') }}
    </div>
  @endif
    
  <div class="panel">
    @include('common.errors')

    <div class="panel-heading">
      New Task
    </div>
 
    <form action="/task" method="POST" class="form-horizontal">
      {{ csrf_field() }}
 
      <div class="form-group">
        <label for="task" class="control-label">Task</label>
        <input type="text" name="name" id="task-name" class="form-control">
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-default">
          <i class="fa fa-plus"></i> Add Task
        </button>
      </div>
    </form>
  </div>

  <!-- Current Tasks -->
  @if (count($taskList) > 0)
  <div class="panel-default">
    <div class="panel">

    <div class="panel-heading">
      Current Tasks
    </div>

    <table class="table">
      <thead>
        <th class ="control-label">Task</th>
        <th></th>
      </thead>

      <tbody>
        @foreach ($taskList as $task)
        <tr>
          <td class="table-text">
            <div>{{ $task->name }}</div>
          </td>
 
          <td>
            <form action="/task/delete/{{ $task->id }}" method="POST">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
                            
                <button class="btn btn-del">Delete Task</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    </div>
  </div>
  @endif
 
@endsection