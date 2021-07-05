@extends('_layout')
@section('title') Tasks @endsection

@section('content')
<form action="/tasks" method="post">
    <h3>Create Tasks</h3>
    @csrf
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
            <div class="form-group">
                <label for="title">Title task</label>
                <input type="text" id="title" class="form-control" name="title" max-length="15" placeholder="Send email">
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
            <div class="form-group">
                <label for="description">Description task</label>
                <input type="text" id="description" class="form-control" name="description" max-length="255" placeholder="Send email to apply programmer job">
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-end mb-2">
        <button class="btn btn-primary" type="submit">Save task</button>
    </div>  
</form>
<h3>Tasks</h3>
<table class="table text-center">
    <tr>
        <th>#</th>
        <th>Title</th>
        <th>Descriptions</th>
    </tr>
    @foreach($tasks as $t)
        <tr>
            <td>{{ $t->id_tasks }}</td>
            <td>{{ $t->title }}</td>
            <td>{{ $t->description }}</td>
        </tr>
    @endforeach
</table>
@endsection