@extends('backend.layout.master')
@section('title', 'All Brand list')
@section('content')
        <ul class="breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="index.html">Home</a>
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="#">All Brand</a></li>
        </ul>

        <div class="row-fluid sortable">
            <div class="box span12">
                <div class="box-header" data-original-title>
                    <h2><i class="halflings-icon user"></i><span class="break"></span>Brand List</h2>
                </div>
                <div class="box-content">
                    <table class="table table-striped table-bordered bootstrap-datatable datatable">
                        <thead>
                        <tr>
                            <th style="width: 5%">SN</th>
                            <th style="width: 20%">Brand Name</th>
                            <th>Description</th>
                            <th style="width: 10%">Image</th>
                            <th style="width: 8%">Status</th>
                            <th style="width: 15%">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($brands as $brand)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="center">{{ $brand->name }}</td>
                            <td class="center">{!! $brand->description !!}</td>
                            <td class="center">
                                <img src="{{ asset($brand->image) }}" alt="">
                            </td>
                            <td class="center">
                                <span class="label label-{{ $brand->status == 1 ? 'success' : 'warning' }}">{{ $brand->status == 1 ? 'Active' : 'Deactivate' }}</span>
                            </td>
                            <td class="center">
                                <div style="text-align: center">
                                    <a href="{{ route('brands.status', $brand->id) }}" class="btn btn-{{ $brand->status == 1 ? 'warning' : 'success' }}"  title="{{ $brand->status == 1 ? 'Make Deactivate' : 'Make Activate' }}">
                                        <i class="halflings-icon white thumbs-{{ $brand->status == 1 ? 'down' : 'up' }}" ></i>
                                    </a>
                                    <a class="btn btn-primary" href="#" title="Show Details">
                                        <i class="halflings-icon white zoom-in" ></i>
                                    </a>
                                    <a class="btn btn-info" href="{{ route('brands.edit', $brand->id) }}" title="Edit">
                                        <i class="halflings-icon white edit" ></i>
                                    </a>
{{--                                    <a class="btn btn-danger" href="{{ route('categories.destroy', $category->id) }}" title="Delete Category">--}}
{{--                                        <i class="halflings-icon white trash"></i>--}}
{{--                                    </a>--}}
                                    <form onsubmit="return confirm('Confirm Delete ?')" action="{{ route('brands.destroy', $brand->id) }}"  style="display: inline-block" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" title="Delete" class="btn btn-danger"><i class="halflings-icon white trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!--/span-->

        </div><!--/row-->
@endsection
