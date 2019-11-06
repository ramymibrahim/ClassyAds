@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Create Item</h1>
            <form action="{{url('admin/items')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input name="name" placeholder="name" class="form-control" value="{{old('name')}}"/>
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <select name="category_id" class="form-control">
                    @foreach($categories as $k=>$v)
                    <option value="{{$k}}" {{(old('category_id')==$k)?"selected":""}}>{{$v}}</option>
                    @endforeach
                </select>
                <label>Image: </label><input type="file" name="image_file" />
                <textarea class="form-control" name="details" placeholder="Details">{{old('details')}}</textarea>
                <input type="number" name="price" step="0.01" class="form-control" placeholder="Price" value="{{old('price')}}" />
                @error('price')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <textarea class="form-control" name="address" placeholder="Address">{{old('address')}}</textarea>                

                <label>Locations:</label>
                @foreach($locations as $k=>$v)
                <input type="checkbox" name="location_id[]" value="{{$k}}" /> {{$v}}
                @endforeach
                <br />
                <button type="submit" class="btn btn-success">Create</button>
                <a href="{{url('admin/items')}}" class="btn btn-default">Back to List</a>
            </form>
        </div>
    </div>
</div>
@endsection