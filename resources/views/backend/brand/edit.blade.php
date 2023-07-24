@extends('backend.layout.master')
@section('title', 'Edit Subcategory')
@section('content')
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="index.html">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Edit Subcategory</a></li>
    </ul>
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Subcategory</h2>
            </div>

            <div class="box-content">
                <form class="form-horizontal" action="{{ route('sub-categories.update', $subCategory->id) }}" method="post">
                    @csrf
                    @method('put')
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" >Category Name</label>
                            <div class="controls">
                                <select name="category_id" id="" style="width: 37%; " class="span5">
                                    <option selected disabled>-Select Category Name-</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $subCategory->category_id ? 'selected' :'' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('category_id')
                            <div class="controls" style="margin-top: 5px;">
                                <span style="color: red;">{{ $message }}</span>
                            </div>
                            @enderror
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="date01">Subcategory Name</label>
                            <div class="controls">
                                <input style="width: 37%" value="{{ $subCategory->name }}" type="text" class="input-xlarge span5" name="name" >
                            </div>
                            @error('name')
                            <div class="controls" style="margin-top: 5px;">
                                <span style="color: red;">{{ $message }}</span>
                            </div>
                            @enderror
                        </div>


                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Subcategory Description</label>
                            <div class="controls">
                                <textarea id="textarea2" class="cleditor" name="description" rows="3">{!! $subCategory->description !!}</textarea>
                            </div>
                            @error('description')
                            <div class="controls" style="margin-top: 5px;">
                                <span style="color: red;">{{ $message }}</span>
                            </div>
                            @enderror
                        </div>


                        <div class="form-actions">
                            <button type="submit" id="editor" class="btn btn-primary">Update</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div><!--/span-->
    </div><!--/row-->
@endsection
