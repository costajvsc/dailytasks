@extends('layout/_layout')
@section('title') Tasks @endsection
@section('styles')
.col-daily{
    max-height: 90vh;
    scrollbar-width: none;
}
.col-daily::-webkit-scrollbar {
    display: none;
}
.btn-hover{
    opacity: 0;
}
.btn-hover:hover{
    opacity: 1;
}
.btn-logout{
    font-size: 1.5rem;
}
@endsection
<main class="bg-dark vh-100">
    <div class="container p-2">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 text-light">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Hi João Victor</h2>
                    <a href="/logout" class="text-danger btn-logout"><i class="fas fa-sign-out-alt"></i></a>
                </div>
                <p class="font-weight-light">Welcome back to dailytasks! See your workspace.</p>

                <div class="mt-2 mb-4">
                    <a href="/tasks">See all your tasks</a>
                </div>

                <h3>Projects</h3>
                <p class="font-weight-light">See your projects. <span class="text-muted">(10)</span></p>
                <div class="d-flex justify-content-end mb-4">
                    <button type="button" class="btn btn-light" data-toggle="modal" data-target="#modal-create-tasks">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
                @include('layout/messages')
            </div>
            <div class="col-xl-8 col-lg-4 col-md-12 col-sm-12 bg-light h-100 overflow-auto col-daily">
                <h2 class="mt-4">Dailytasks</h2>
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
                                            <i class="{{!$task->finished ? 'far text-muted' : 'fas text-success'}} fa-check-circle"></i>
                                            <span class="font-weight-light" @if($task->finished) style="text-decoration: line-through" @endif>
                                                {{$task->title}}
                                            </span>
                                        </button>
                                    </form>
                                </div>
                                <div class="d-flex flex-column align-self-center">
                                    <div>
                                        <div class="btn-hover d-inline-block">
                                            <a href="#" class="btn text-warning p-0" data-toggle="modal" data-target="#modal-update-tasks" onclick="updateTask({{$task}})"><i class="fas fa-edit mr-1"></i></a>
                                            <a href="#" class="btn text-danger p-0" data-toggle="modal" data-target="#modal-delete-tasks" onclick="deleteTask({{$task}})"><i class="fas fa-trash mr-1"></i></a>
                                        </div>
                                        <span class="badge badge-pill badge-primary">{{$task->status}}</span>
                                    </div>
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
                                    <div>
                                        <div class="btn-hover d-inline-block">
                                            <a href="#" class="btn text-warning p-0" data-toggle="modal" data-target="#modal-update-tasks" onclick="updateTask({{$task}})"><i class="fas fa-edit mr-1"></i></a>
                                            <a href="#" class="btn text-danger p-0" data-toggle="modal" data-target="#modal-delete-tasks" onclick="deleteTask({{$task}})"><i class="fas fa-trash mr-1"></i></a>
                                        </div>
                                        <span class="badge badge-pill badge-primary">{{$task->status}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</main>

@include('layout/tasks/modal-create-tasks')
@include('layout/tasks/modal-update-tasks')
@include('layout/tasks/modal-delete-tasks')

@section('scripts')
    <script src="{{asset('site/tasks.js')}}"></script>
    <script>
        var clock_in = new Date()
        clock_in.setMinutes(clock_in.getMinutes() - clock_in.getTimezoneOffset())
        document.getElementById('milestone').value = clock_in.toISOString().slice(0,16)
    </script>
@endsection
