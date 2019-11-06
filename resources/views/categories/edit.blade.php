@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Edit Category</h1>

            <form action="{{url('admin/categories/'.$category['id'])}}" method="POST">
                @csrf
                {{method_field('PUT')}}
                <input name="name" class="form-control" placeholder="Name" required value="{{$category['name']}}"/>
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                <button type="submit" class="btn btn-success">Save</button>
                <a href="{{url('/admin/categories')}}" class="btn btn-default">Back to List</a>
            </form>
        </div>
    </div>
</div>
@endsection