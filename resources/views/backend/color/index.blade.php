@extends('backend.layout.master')
@section('title', 'All color list')
@section('content')
        <ul class="breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="index.html">Home</a>
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="#">All Color</a></li>
        </ul>

        <div class="row-fluid sortable">
            <div class="box span12">
                <div class="box-header" data-original-title>
                    <h2><i class="halflings-icon user"></i><span class="break"></span>Color List</h2>
                </div>
                <div class="box-content">
                    <table class="table table-striped table-bordered bootstrap-datatable datatable">
                        <thead>
                        <tr>
                            <th style="width: 5%">SN</th>
                            <th style="width: 20%">Size Name</th>
                            <th style="width: 8%">Status</th>
                            <th style="width: 15%">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($colors as $color)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="center" style="text-align: center">
                                @foreach(Json_decode($color->name) as $item)
                                    <ul class="span2"><span class="badge badge-info">{{ $item }}</span></ul>
                                @endforeach
                            </td>
                            <td class="center">
                                <span class="label label-{{ $color->status == 1 ? 'success' : 'warning' }}">{{ $color->status == 1 ? 'Active' : 'Deactivate' }}</span>
                            </td>
                            <td class="center">
                                <div style="text-align: center">
                                    <a href="{{ route('colors.status', $color->id) }}" class="btn btn-{{ $color->status == 1 ? 'warning' : 'success' }}"  title="{{ $color->status == 1 ? 'Make Deactivate' : 'Make Activate' }}">
                                        <i class="halflings-icon white thumbs-{{ $color->status == 1 ? 'down' : 'up' }}" ></i>
                                    </a>
                                    <a class="btn btn-primary" href="#" title="Show Details">
                                        <i class="halflings-icon white zoom-in" ></i>
                                    </a>
                                    <a class="btn btn-info" href="{{ route('colors.edit', $color->id) }}" title="Edit">
                                        <i class="halflings-icon white edit" ></i>
                                    </a>
{{--                                    <a class="btn btn-danger" href="{{ route('categories.destroy', $category->id) }}" title="Delete Category">--}}
{{--                                        <i class="halflings-icon white trash"></i>--}}
{{--                                    </a>--}}
                                    <form onsubmit="return confirm('Confirm Delete ?')" action="{{ route('colors.destroy', $color->id) }}"  style="display: inline-block" method="post">
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
