@extends('layouts.app')
@section('content')
@php
function get_url($col){
    //Fill the funciton
}
@endphp
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Items</h1>
            <div class="row">
                <div class="col-md-3">
                    <a class="btn btn-success" href="{{url('/admin/items/create')}}">Add</a>
                </div>
                <div class="col-md-9">
                    <form method="GET" action="{{url('/admin/items')}}">
                        <div class="input-group">
                            <input placeholder="Search" name='keywords' class='form-control' value="{{request()->has('keywords')?request()->input()['keywords']:''}}" />
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">Search!</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>


            <table class="table table-hover">
                <thead>
                    <tr>
                        <td>Id</td>
                        @if(request()->has('orderBy') && request('orderBy')=='name' && !request()->has('sortOrder'))
                        <td><a href="{{url('/admin/items')}}?orderBy=name&sortOrder=desc&{{request()->has('keywords')?'keywords='.request()->input()['keywords']:''}}"> Name</a></td>
                        @else
                        <td><a href="{{url('/admin/items')}}?orderBy=name&{{request()->has('keywords')?'keywords='.request()->input()['keywords']:''}}"> Name</a></td>
                        @endif

                        @if(request()->has('orderBy') && request('orderBy')=='category_id' && !request()->has('sortOrder'))
                        <td><a href="{{url('/admin/items')}}?orderBy=category_id&sortOrder=desc&{{request()->has('keywords')?'keywords='.request()->input()['keywords']:''}}">Category</a></td>
                        @else
                        <td><a href="{{url('/admin/items')}}?orderBy=category_id&{{request()->has('keywords')?'keywords='.request()->input()['keywords']:''}}"> Category</a></td>
                        @endif

                        @if(request()->has('orderBy') && request('orderBy')=='created_at' && !request()->has('sortOrder'))
                        <td><a href="{{url('/admin/items')}}?orderBy=created_at&sortOrder=desc&{{request()->has('keywords')?'keywords='.request()->input()['keywords']:''}}">Created At</a></td>
                        @else
                        <td><a href="{{url('/admin/items')}}?orderBy=created_at&{{request()->has('keywords')?'keywords='.request()->input()['keywords']:''}}"> Created At</a></td>
                        @endif

                        @if(request()->has('orderBy') && request('orderBy')=='updated_at' && !request()->has('sortOrder'))
                        <td><a href="{{url('/admin/items')}}?orderBy=updated_at&sortOrder=desc&{{request()->has('keywords')?'keywords='.request()->input()['keywords']:''}}">Updated At</a></td>
                        @else
                        <td><a href="{{url('/admin/items')}}?orderBy=updated_at&{{request()->has('keywords')?'keywords='.request()->input()['keywords']:''}}"> Updated At</a></td>
                        @endif

                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i=$items->perPage()*($items->currentPage()-1)+1;
                    @endphp

                    @foreach($items as $item)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$item['name']}}</td>
                        <td>{{$item['category']['name']}}</td>
                        <td>{{$item['created_at']}}</td>
                        <td>{{$item['updated_at']}}</td>
                        <td>
                            <a href="{{url('admin/categories/'.$item['id'].'/edit')}}" class="btn btn-primary">Edit</a>
                            <form action="{{url('admin/categories/'.$item['id'])}}" method="POST" style="display:inline;">
                                {{method_field('DELETE')}}
                                @csrf
                                <button class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{$items->appends(request()->input())->links()}}
        </div>
    </div>
</div>
@endsection