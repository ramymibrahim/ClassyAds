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
            @php
            function get_sort_url($column){
                $query_arr=[];
                $query_arr['orderBy']=$column;
                if(request()->has('orderBy') && request('orderBy')==$column && (!request()->has('sortOrder') || request('sortOrder')=='asc')){
                    $query_arr['sortOrder']='desc';
                }
                else{
                    $query_arr['sortOrder']='asc';
                }
                if(request()->has('keywords')){
                    $query_arr['keywords']=request('keywords');
                }
                return request()->fullUrlWithQuery($query_arr);
            }
            @endphp            
            <table class="table table-hover">
                <thead>
                    <tr>
                        <td>Id</td>                        
                        <td><a href="{{get_sort_url('name')}}"> Name</a></td>                        
                        <td><a href="{{get_sort_url('category_id')}}"> Category</a></td>
                        <td><a href="{{get_sort_url('created_at')}}">Created At</a></td>
                        <td><a href="{{get_sort_url('updated_at')}}{{url('/admin/items')}}?orderBy=&sortOrder=desc&{{request()->has('keywords')?'keywords='.request()->input()['keywords']:''}}">Updated At</a></td>                        
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
                            <a href="{{url('admin/items/'.$item['id'].'/edit')}}" class="btn btn-primary">Edit</a>
                            <form action="{{url('admin/items/'.$item['id'])}}" method="POST" style="display:inline;">
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