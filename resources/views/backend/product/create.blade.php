@extends('backend.layout.master')
@section('title', 'Create new product')
@section('content')
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="index.html">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Create Product</a></li>
    </ul>
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Create Product</h2>
            </div>

            <div class="box-content">
                <form class="form-horizontal" action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="date01">Product Name</label>
                            <div class="controls">
                                <input type="text" style="width: 503px" value="{{ old('name') }}" class="input-xlarge span5" name="name" >
                            </div>
                            @error('name')
                            <div class="controls" style="margin-top: 5px;">
                                <span style="color: red;">{{ $message }}</span>
                            </div>
                            @enderror
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="date01">Product Code</label>
                            <div class="controls">
                                <input type="text" style="width: 503px" value="{{ old('code') }}" class="input-xlarge span5" name="code" >
                            </div>
                            @error('code')
                            <div class="controls" style="margin-top: 5px;">
                                <span style="color: red;">{{ $message }}</span>
                            </div>
                            @enderror
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="date01"> Category</label>
                            <div class="controls">
{{--                                <input type="text" style="width: 503px" class="input-xlarge span5" name="name" >--}}
                                <select name="category_id" style="width: 37%" id="category_id">
                                    <option selected disabled>Select Category</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                            <label class="control-label" for="date01"> SubCategory</label>
                            <div class="controls">
                                <select name="subcategory_id"  style="width: 37%" id="subcategory">
                                    <option selected disabled>Select Subcategory</option>
                                </select>
                            </div>
                            @error('subcategory_id')
                            <div class="controls" style="margin-top: 5px;">
                                <span style="color: red;">{{ $message }}</span>
                            </div>
                            @enderror
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="date01"> Brand</label>
                            <div class="controls">
                                <select name="brand_id" style="width: 37%" id="">
                                    <option selected disabled>Select Brand</option>
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('brand_id')
                            <div class="controls" style="margin-top: 5px;">
                                <span style="color: red;">{{ $message }}</span>
                            </div>
                            @enderror
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="date01"> Unit</label>
                            <div class="controls">
                                <select name="unit_id" style="width: 37%" id="">
                                    <option selected disabled>Select Unit</option>
                                    @foreach($units as $unit)
                                        <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('unit_id')
                            <div class="controls" style="margin-top: 5px;">
                                <span style="color: red;">{{ $message }}</span>
                            </div>
                            @enderror
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="date01"> Size</label>
                            <div class="controls">
                                <select name="size_id" style="width: 37%" id="">
                                    <option selected disabled>Select Size</option>
                                    @foreach($sizes as $size)
                                        <option value="{{ $size->id }}">
                                            @foreach(json_decode($size->name) as $item)
                                            <ul>{{ $item }}</ul>
                                            @endforeach
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('size_id')
                            <div class="controls" style="margin-top: 5px;">
                                <span style="color: red;">{{ $message }}</span>
                            </div>
                            @enderror
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="date01"> Color</label>
                            <div class="controls">
                                <select name="color_id" style="width: 37%" id="">
                                    <option selected disabled>Select Color</option>
                                    @foreach($colors as $color)
                                        <option value="{{ $color->id }}">
                                            @foreach(json_decode($color->name) as $item)
                                                <ul>{{ $item }}</ul>
                                            @endforeach
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('color_id')
                            <div class="controls" style="margin-top: 5px;">
                                <span style="color: red;">{{ $message }}</span>
                            </div>
                            @enderror
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="price">Product Price</label>
                            <div class="controls">
                                <div class="input-prepend input-append">
                                    <span class="add-on">&#2547;</span><input size="" id="price"  type="number" value="{{ old('price') }}" size="16" class="input-xlarge" name="price" ><span class="add-on">.00</span>
                                </div>
                            </div>
                            @error('price')
                            <div class="controls" style="margin-top: 5px;">
                                <span style="color: red;">{{ $message }}</span>
                            </div>
                            @enderror
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="date01">Discount Percentage</label>
                            <div class="controls">
                                <div class="input-prepend input-append">
                                    <input  size="16" value="{{ old('discount_percentage') }}" name="discount_percentage" id="discount_percentage" type="number"><span class="add-on">%</span>
                                </div>
                            </div>
                            @error('discount_percentage')
                            <div class="controls" style="margin-top: 5px;">
                                <span style="color: red;">{{ $message }}</span>
                            </div>
                            @enderror
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="date01">Discount Price</label>
                            <div class="controls">
                                <div class="input-prepend input-append">
                                    <span class="add-on">&#2547;</span><input size="" id="disPrice" readonly type="number" value="{{ old('price') }}" size="16" class="input-xlarge" name="discount_price" ><span class="add-on">.00</span>
                                </div>
                            </div>
                            @error('discount_price')
                            <div class="controls" style="margin-top: 5px;">
                                <span style="color: red;">{{ $message }}</span>
                            </div>
                            @enderror
                        </div>

                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Short Description</label>
                            <div class="controls">
                                <textarea id="" class="" style="width: 36%" name="short_description" rows="4">{!! old('short_description') !!}</textarea>
                            </div>
                            @error('short_description')
                            <div class="controls" style="margin-top: 5px;">
                                <span style="color: red;">{{ $message }}</span>
                            </div>
                            @enderror
                        </div>

                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Description</label>
                            <div class="controls">
                                <textarea id="textarea2" class="cleditor" name="description" rows="3">{!! old('description') !!}</textarea>
                            </div>
                            @error('description')
                            <div class="controls" style="margin-top: 5px;">
                                <span style="color: red;">{{ $message }}</span>
                            </div>
                            @enderror
                        </div>

                        <div class="control-group">
                            <label class="control-label">Product Image</label>
                            <div class="controls">
                                <input type="file" name="image[]" multiple>
                            </div>
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
@section('script')
    <script>
        $(document).on('change', '#category_id', function (){
            let category_id = $(this).val();
            $.ajax({
                // url: "/admin/products-get-subcategory",
                url: "{{ route('products.subcategory') }}",
                method: 'GET',
                dataType: 'JSON',
                data: {category_id},
                success: function (response){
                    // console.log(response);
                    let option = '<option selected disabled>Select Subcategory</option>';
                    $.each(response, function (key, value){
                       option += '<option value="'+ value.id +'" >'+value.name+'</option>';
                    });
                    $('#subcategory').empty().append(option);
                }
            });
        });

        // Discount Percentage Calculation
        $(document).on('keyup', '#price, #discount_percentage', function (){
            let price = $('#price').val();
            let disPercentage = $('#discount_percentage').val();
            console.log(price, disPercentage);
            let disPrice = Math.ceil(price - (price * disPercentage /100));
            console.log(disPrice);
            $('#disPrice').val(disPrice);
        });
    </script>
@endsection
