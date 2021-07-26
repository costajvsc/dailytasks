@extends('_layout')
@section('title') Tasks @endsection
@section('styles')
.col-daily{
    max-height: 90vh;
    scrollbar-width: none;
}
.col-daily::-webkit-scrollbar {
    display: none;
}
@endsection
<main class="bg-dark vh-100">
    <div class="container p-2">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 text-light">
                <h2 class="">Hi João Victor</h2>
                <p class="font-weight-light">Welcome back to dailytasks! See your workspace.</p>

                <h3>Projects</h3>
                <p class="font-weight-light">See your projects. <span class="text-muted">(10)</span></p>
                <div class="d-flex justify-content-end mb-4">
                    <button type="button" class="btn btn-light" data-toggle="modal" data-target="#modal-create-tasks">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
            <div class="col-xl-8 col-lg-4 col-md-12 col-sm-12 bg-light h-100 overflow-auto col-daily">
                <h2>Dailytasks</h2>
                <p class="font-weight-light">See your dailytasks and your late tasks from previous days.</p>


                <div class="overflow-auto">
                    <h4 class="mt-4 mb-4">Today</h4>
                    @foreach ($tasks as $task)
                        <div class="px-4">
                            <div class="d-flex justify-content-between align-center mb-3">
                                <div>
                                    <form action="/tasks/toggle/{{$task->id_tasks}}" method="post" class="form-inline">
                                        @csrf
                                        <button type="submit" class="btn d-inline">
                                            <i class="{{!$task->finished ? 'far text-muted' : 'fas text-info'}} fa-check-circle"></i>
                                            <span class="font-weight-light" @if($task->finished) style="text-decoration: line-through" @endif>
                                                {{$task->title}}
                                            </span>
                                        </button>
                                    </form>
                                </div>
                                <div class="d-flex flex-column align-self-center">
                                    <span class="badge badge-pill badge-primary">{{$task->status}}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <h4 class="mt-4 mb-4">Late Tasks</h4>
                    @foreach ($lateTasks as $task)
                        <div class="px-4">
                            <div class="d-flex justify-content-between align-center mb-3">
                                <div>
                                    <form action="/tasks/toggle/{{$task->id_tasks}}" method="post" class="form-inline">
                                        @csrf
                                        <button type="submit" class="btn d-inline">
                                            <i class="{{!$task->finished ? 'far text-muted' : 'fas text-info'}} fa-check-circle"></i>
                                            <span class="font-weight-light" @if($task->finished) style="text-decoration: line-through" @endif>
                                                {{$task->title}}
                                            </span>
                                        </button>
                                    </form>
                                </div>
                                <div class="d-flex flex-column align-self-center">
                                    <span class="badge badge-pill badge-primary">{{$task->status}}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</main>



<div class="modal" tabindex="-1" id="modal-create-tasks">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Create tasks</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/tasks" method="post">
            @csrf
                <div class="form-group">
                    <label for="title">Title task</label>
                    <input type="text" id="title" class="form-control" name="title" maxlength="25" placeholder="Send email" required>
                </div>
                <div class="form-group">
                    <label for="description">Description task</label>
                    <textarea id="description" class="form-control" name="description"  style="overflow:auto;resize:none" rows="3" max-length="255" placeholder="Send email to apply programmer job" required></textarea>
                </div>
                <div class="form-group">
                    <label for="milestone">Milestone</label>
                    <input type="datetime-local" class="form-control" id="milestone" name="milestone" required>
                </div>

                <div class="form-group">
                    <label for="status">status</label>
                    <input list="list-status" class="form-control" id="status" name="status" placeholder="To Do" required>
                    <datalist id="list-status">
                        <option value="To Do">To Do</option>
                        <option value="Doing">Doing</option>
                        <option value="Done">Done</option>
                    </datalist>
                </div>
            <div class="d-flex justify-content-end mb-2">
                <button type="button" class="btn btn-outline-secondary mr-2" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save task</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal" tabindex="-1" id="modal-update-tasks">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Update tasks</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/tasks" method="post">
            @csrf
            @method('put')
            <input type="hidden" name="id_tasks" value="" data-js="id-task-update">
            <div class="form-group">
                <label for="title">Title task</label>
                <input type="text" id="title" class="form-control" name="title" maxlength="25" data-js="title-task-update" required>
            </div>
            <div class="form-group">
                <label for="description">Description task</label>
                <textarea id="description" class="form-control" name="description"  style="overflow:auto;resize:none" rows="3" max-length="255" data-js="description-task-update" required></textarea>
            </div>
            <div class="form-group">
                <label for="milestone">Milestone</label>
                <input type="datetime-local" class="form-control" id="milestone" name="milestone" data-js="milestone-task-update" required>
            </div>

            <div class="form-group">
                <label for="status">status</label>
                <input list="list-status" class="form-control" id="status" name="status" placeholder="To Do" data-js="status-task-update" required>
                <datalist id="list-status">
                    <option value="To Do">To Do</option>
                    <option value="Doing">Doing</option>
                    <option value="Done">Done</option>
                </datalist>
            </div>
            <div class="d-flex justify-content-end mb-2">
                <button type="button" class="btn btn-outline-secondary mr-2" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save task</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal" tabindex="-1" id="modal-delete-tasks">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Delete task</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/tasks" method="post">
            @csrf
            @method('delete')
            <input type="hidden" name="id_task" value="" data-js="input-id-task-delete">
            <h5>Those follow data will <span class="text-danger">lose</span>!</h5>
            <ul>
                <li>
                    <b># Task</b> <span data-js="id-task-delete">1</span>
                </li>
                <li>
                    <b>Title</b> <span data-js="title-task-delete">Title</span>
                </li>
                <li>
                    <b>Description </b> <span data-js="description-task-delete">Description</span>
                </li>
                <li>
                    <b>Milestone: </b> <span data-js="milestone-task-delete">Milestone</span>
                </li>
                <li>
                    <b>Status: </b> <span data-js="status-task-delete">Status</span>
                </li>
            </ul>
            <div class="d-flex justify-content-end mb-2">
                <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline-danger">Delete task</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>



@section('scripts')
    <script src="{{asset('site/tasks.js')}}"></script>
    <script>
        var clock_in = new Date()
        clock_in.setMinutes(clock_in.getMinutes() - clock_in.getTimezoneOffset())
        document.getElementById('milestone').value = clock_in.toISOString().slice(0,16)
    </script>
@endsection
