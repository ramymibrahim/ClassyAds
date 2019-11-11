@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Edit Item</h1>
            <form action="{{url('admin/items/'.$item['id'])}}" method="POST" enctype="multipart/form-data">
                @csrf
                {{method_field('PUT')}}
                <input name="name" placeholder="name" class="form-control" value="{{old('name',$item['name'])}}"/>
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <select name="category_id" class="form-control">
                    @foreach($categories as $k=>$v)
                    <option value="{{$k}}" {{(old('category_id',$item['category_id'])==$k)?"selected":""}}>{{$v}}</option>
                    @endforeach
                </select>
                <label>Image: </label><input type="file" name="image_file" />
                <textarea class="form-control" name="details" placeholder="Details">{{old('details',$item['details'])}}</textarea>
                <input type="number" name="price" step="0.01" class="form-control" placeholder="Price" value="{{old('price',$item['price'])}}" />
                @error('price')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <textarea class="form-control" name="address" placeholder="Address">{{old('address',$item['address'])}}</textarea>                

                <label>Locations:</label>
                @php
                $location_ids =$item->locations()->select('location_id','item_id')->pluck('location_id');
                $lis = [];
                foreach($location_ids as $k=>$v){
                    array_push($lis,$v);
                }
                @endphp                                
                
                @foreach($locations as $k=>$v)                    
                <input type="checkbox" name="location_id[]" value="{{$k}}" {{in_array($k,$lis)?"checked":""}}/> {{$v}}
                @endforeach
                <br />
                <button type="submit" class="btn btn-success">Edit</button>
                <a href="{{url('admin/items')}}" class="btn btn-default">Back to List</a>
            </form>
        </div>
    </div>
</div>
@endsection