@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Categories</h1>
            <a class="btn btn-success" href="{{url('/admin/categories/create')}}">Add</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <td>Id</td>
                        <td>Name</td>
                        <td>Created At</td>
                        <td>Updated At</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i=1;
                    @endphp
                    @foreach($categories as $cat)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$cat['name']}}</td>
                        <td>{{$cat['created_at']}}</td>
                        <td>{{$cat['updated_at']}}</td>
                        <td>
                            <a href="{{url('admin/categories/'.$cat['id'].'/edit')}}" class="btn btn-primary">Edit</a>
                            <form action="{{url('admin/categories/'.$cat['id'])}}" method="POST" style="display:inline;">
                                {{method_field('DELETE')}}
                                @csrf
                                <button class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection