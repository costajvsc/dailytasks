@extends('layout/_layout')
@section('title') Tasks @endsection

@section('content')

<h3>Tasks</h3>
@include('layout/messages')

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
                <a href="#" class="btn text-warning p-0" data-toggle="modal" data-target="#modal-update-tasks" onclick="updateTask({{$t}})"><i class="fas fa-edit mr-1"></i></a>
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
@endsection

@include('layout/tasks/modal-create-tasks')
@include('layout/tasks/modal-update-tasks')
@include('layout/tasks/modal-delete-tasks')

@section('scripts')
    <script src="{{asset('site/tasks.js')}}"></script>
@endsection
