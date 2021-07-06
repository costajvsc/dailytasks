@extends('_layout')
@section('title') Tasks @endsection

@section('content')

<h3>Tasks</h3>
<div class="row-fluid">
    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 p-2" style="background-color: lightgrey;">
        <h4>Status</h4>
        @foreach($tasks as $t)
        <div class="card my-2">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title">{{$t->title}}</h5>
                    <h6 class="card-subtitle text-info">{{$t->status}}</h6>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <p class="card-subtitle text-muted">{{date_format(new DateTime($t->milestone), 'd/m (H:i)')}}</p>
                    <p class="card-subtitle text-muted">#{{$t->id_tasks}}</p>
                </div>
                <p class="card-text">{{$t->description}}</p>
                <div class="">
                    <form action="/tasks" method="post">
                        @csrf
                        @method('delete')
                        <input type="hidden" name="id_task" value="{{$t->id_tasks}}">
                        <button href="#" class="btn p-0 text-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<div class="d-flex justify-content-end">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-tasks">
        Create a new task
    </button>
</div>

<div class="modal" tabindex="-1" id="modal-create-tasks">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Create tasks</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/tasks" method="post">
            <h3>Create Tasks</h3>
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

@endsection