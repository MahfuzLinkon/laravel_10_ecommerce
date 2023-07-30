@extends('backend.layout.master')
@section('title', 'Product list')
@section('content')
        <ul class="breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="index.html">Home</a>
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="#">All Product</a></li>
        </ul>

        <div class="row-fluid sortable">
            <div class="box span12">
                <div class="box-header" data-original-title>
                    <h2><i class="halflings-icon user"></i><span class="break"></span>Product List</h2>
                </div>
                <div class="box-content">
                    <table class="table table-striped table-bordered bootstrap-datatable datatable">
                        <thead>
                        <tr>
                            <th style="width: 1%">SN</th>
                            <th style="width: 8%">Product Code</th>
                            <th style="">Name</th>
                            <th style="">Price</th>
                            <th style="">Category</th>
                            <th style="">Subcategory</th>
                            <th style="">Brand</th>
{{--                            <th style="">Unit</th>--}}
{{--                            <th style="">Size</th>--}}
{{--                            <th style="">Color</th>--}}
                            <th style="width: 12%">Image</th>
                            <th style="width: 20%">Description</th>
                            <th style="width: 4%">Status</th>
                            <th style="width: 13%">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="center">{{ $product->code }}</td>
                            <td class="center">{{ $product->name }}</td>
                            <td class="center">{{ $product->price }}</td>
                            <td class="center">{{ $product->category->name }}</td>
                            <td class="center">{{ $product->subcategory->name }}</td>
                            <td class="center">{{ $product->brand->name }}</td>
{{--                            <td class="center">{{ $product->unit->name }}</td>--}}
{{--                            <td class="center">{{ $product->size->name }}</td>--}}
{{--                            <td class="center">{{ $product->color->name }}</td>--}}
                            <td class="center">
                                @foreach(explode(',', $product->image) as $image)
                                    <ul class="span4">
                                        <img src="{{ asset($image) }}" style="width: 65px; height: 50px" alt="">
                                    </ul>
                                @endforeach
                            </td>
                            <td class="center">{!! $product->description !!}</td>

                            <td class="center">
                                <span class="label label-{{ $product->status == 1 ? 'success' : 'warning' }}">{{ $product->status == 1 ? 'Active' : 'Deactivate' }}</span>
                            </td>
                            <td class="center">
                                <div style="text-align: center">
                                    <a href="{{ route('products.status',$product->id) }}" class="btn btn-{{ $product->status == 1 ? 'warning' : 'success' }}"  title="{{ $product->status == 1 ? 'Make Deactivate' : 'Make Activate' }}">
                                        <i class="halflings-icon white thumbs-{{ $product->status == 1 ? 'down' : 'up' }}" ></i>
                                    </a>
                                    <a class="btn btn-primary" href="#" title="Show Details">
                                        <i class="halflings-icon white zoom-in" ></i>
                                    </a>
                                    <a class="btn btn-info" href="{{ route('products.edit', $product->id) }}" title="Edit Category">
                                        <i class="halflings-icon white edit" ></i>
                                    </a>
{{--                                    <a class="btn btn-danger" href="{{ route('products.destroy', $product->id) }}" title="Delete Category">--}}
{{--                                        <i class="halflings-icon white trash"></i>--}}
{{--                                    </a>--}}
                                    <form onsubmit="return confirm('Confirm Delete ?')" action="{{ route('products.destroy', $product->id) }}"  style="display: inline-block" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" title="Delete Category" class="btn btn-danger"><i class="halflings-icon white trash"></i></button>
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
