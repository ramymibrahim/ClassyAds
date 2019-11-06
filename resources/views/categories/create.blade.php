@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Create Category</h1>

            <form action="{{url('admin/categories')}}" method="POST">
                @csrf
                <input name="name" class="form-control" placeholder="Name" required />
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                <button type="submit" class="btn btn-success">Create</button>
                <a href="{{url('/admin/categories')}}" class="btn btn-default">Back to List</a>
            </form>
        </div>
    </div>
</div>
@endsection