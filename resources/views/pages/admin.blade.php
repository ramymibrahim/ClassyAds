@extends('layouts.app')
@section('content')
<!--
User Admin can view all the Items
User Manager can view all categories and items
User Sub Manager can view items only
Normal user cannot access admin panel
-->

<ul>
    @can('admin')
    <li><a href="{{url('/admin/locations')}}">Locations</a></li>
    @endcan
    @can('manage')
    <li><a href="{{url('/admin/categories')}}">Categories</a></li>
    @endcan
    @can('subManage')
    <li><a href="{{url('/admin/items')}}">Items</a></li>
    @endcan
</ul>
@endsection