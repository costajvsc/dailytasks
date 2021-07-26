@extends('_layout')
@section('title') Tasks @endsection

@section('content')

<h3>Tasks</h3>
<table class="table table-hover text-center">
    <thead>
        <tr>
            <th scope="col text-left">#</th>
            <th scope="col">Title</th>
            <th scope="col">Status</th>
            <th scope="col">Finished</th>
            <th scope="col">Milestone</th>
            <th scope="col">Options</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tasks as $t)
        <tr class="table-{{!$t->finished ? 'warning' : 'default'}}">
            <th scope="row" class="text-right text-muted">{{$t->id_tasks}}</th>
            <td>{{$t->title}}</td>
            <td>{{$t->finished ? 'True' : 'False'}}</td>
            <td>{{$t->status}}</td>
            <td>{{date_format(new DateTime($t->milestone), 'd/m/Y (H:i:s)')}}</td>
            <td>
                <form action="/tasks/toggle/{{$t->id_tasks}}" method="post" class="d-inline">
                    @csrf
                    <button type="submit" class="btn p-0">
                        <i class="{{!$t->finished ? 'far text-muted' : 'fas text-info'}} fa-check-circle mr-1"></i>
                    </button>
                </form>
                <button class="btn text-primary p-0" data-toggle="modal" data-target="#modal-update-tasks" onclick="updateTask({{$t}})"><i class="fas fa-edit mr-1"></i></button>
                <a href="#" class="btn text-danger p-0" data-toggle="modal" data-target="#modal-delete-tasks" onclick="deleteTask({{$t}})"><i class="fas fa-trash"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-end">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-tasks">
        <i class="fas fa-tasks mr-1"></i>
        Create a new task
    </button>
</div>

<div class="d-flex justify-content-center">
    {!! $tasks->links() !!}
</div>

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

<div class="dismiss modal" tabindex="-1" id="modal-update-tasks" data-js="modal-update-tasks" data-modal-target="update">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Update tasks</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="dismiss">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/tasks" method="post" data-js="form-update-tasks">
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
                <button type="button" class="dismiss btn btn-outline-secondary mr-2" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save task</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="dismiss modal" tabindex="-1" id="modal-delete-tasks" data-js="modal-delete-tasks" data-modal-target="delete">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Delete task</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="dismiss">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/tasks" method="post" data-js="form-delete-tasks">
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
                <button type="button" class="dismiss btn btn-secondary mr-2" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline-danger">Delete task</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection

@section('scripts')
    <script src="{{asset('site/tasks.js')}}"></script>
@endsection
