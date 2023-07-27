@extends('backend.layout.master')
@section('title', 'Create new color')
@section('content')
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="index.html">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Create Color</a></li>
    </ul>
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Create Color</h2>
            </div>

            <div class="box-content">
                <form class="form-horizontal" action="{{ route('colors.store') }}" method="post">
                    @csrf
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="date01">Color Name</label>
                            <div class="controls">
                                <input style="width: 37%"  type="text" data-role="tagsinput" class="input-xlarge span5" name="name" >
                            </div>
                            @error('name')
                            <div class="controls" style="margin-top: 5px;">
                                <span style="color: red;">{{ $message }}</span>
                            </div>
                            @enderror
                        </div>

                        <div class="form-actions">
                            <button type="submit" id="editor" class="btn btn-primary">Create</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div><!--/span-->
    </div><!--/row-->
@endsection
