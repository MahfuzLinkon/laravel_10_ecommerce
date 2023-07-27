@extends('backend.layout.master')
@section('title', 'Edit size')
@section('content')
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="index.html">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Edit Size</a></li>
    </ul>
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Size</h2>
            </div>

            <div class="box-content">
                <form class="form-horizontal" action="{{ route('sizes.update', $size->id) }}" method="post">
                    @csrf
                    @method('put')
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="date01">Size Name</label>
                            <div class="controls">
                                <input style="width: 37%" value="{{ implode(',', json_decode($size->name)) }}"  type="text" data-role="tagsinput" class="input-xlarge span5" name="name" >
                            </div>
                            @error('name')
                            <div class="controls" style="margin-top: 5px;">
                                <span style="color: red;">{{ $message }}</span>
                            </div>
                            @enderror
                        </div>

                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Description</label>
                            <div class="controls">
                                <textarea id="textarea2" class="cleditor" name="description" rows="3">{!! $size->description !!}</textarea>
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
