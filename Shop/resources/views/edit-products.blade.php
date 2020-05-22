@extends('app')
@section('content')
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-8">

                    <div class="card">
                        <div class="card-header">
                            <strong>Items</strong>
                        </div>
                        <div class="card-body card-block">
                            <form action="{{ route('edit-products', $item->id)}}" method="post"  class="form-horizontal" enctype="multipart/form-data">
                                {!! csrf_field() !!}
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="select" class=" form-control-label">Brand</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="item_brand" id="select" class="form-control">
                                            <option value="0">Please select</option>
                                            @foreach($brands as $brand)
                                                <option value="{{ $brand->brand_name}}" <?php if($item->item_brand==$brand->brand_name){ echo ' selected="selected"';}?>>{{ $brand->brand_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="select" class=" form-control-label">Category</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="item_category" id="select" class="form-control">
                                            <option value="0">Please select</option>
                                           @foreach($category as $cat)
                                     <option value="{{ $item->item_category}}" <?php if($item->item_category==$cat->category_name){ echo ' selected="selected"';}?>>{{ $cat->	category_name}}</option>
                                          @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Name</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" value="{{ $item->item_name }}" name="item_name" placeholder="Text" class="form-control">
                                        <small class="form-text text-muted">This is a help text</small>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Code</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" value="{{ $item->item_code }}" name="item_code" placeholder="Item code" class="form-control">
                                        <small class="form-text text-muted">This is a help text</small>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="textarea-input" class=" form-control-label">Colors</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" name="colors" id="textarea-input"  value="{{ $item->colors }}" rows="5" placeholder="Colors" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="textarea-input" class=" form-control-label">Quantity</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" name="quantity" id="textarea-input" rows="5"  value="{{ $item->quantity}}" placeholder="Quantity" class="form-control">

                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="textarea-input" class=" form-control-label">old Price</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" name="old_price" id="textarea-input" value="{{ $item->old_price}}"  placeholder="Old Price" class="form-control">

                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="textarea-input" class=" form-control-label">New Price</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" name="new_price" id="textarea-input" value="{{ $item->new_price}}"  placeholder="New Price" class="form-control">

                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="textarea-input" class=" form-control-label" >Description</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea name="item_description" id="textarea-input" rows="5" placeholder="Content..." class="form-control">{{ $item->item_description }}</textarea>
                                    </div>
                                </div>

  <div>
                                    <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="textarea-input" class=" form-control-label" >Images</label>
                                    </div>
                                @foreach($img as $im)
                                            <img style="max-height:80px; max-width: 80px;" src="../{{$im->item_image}}">
                                            <div class="image-upload">
                                                <label for="file-input">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </label>

                                                <input id="file-input"  type="file"  name="item_image[]"  value="{{$im->item_image }}" style="display:none;"/>
                                            </div>
                                    @endforeach
                        </div></div></div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Submit
                            </button>
                            <button type="reset" class="btn btn-danger btn-sm">
                                <i class="fa fa-ban"></i> Reset
                            </button>
                        </div>
                    </div>
                    </form>

                </div>


            </div>
            <?php include "includes/footer.php"; ?>
        </div>
    </div>
    </div>
    </div>

    </div>
    @endsection()
            <!-- Jquery JS-->

    <!-- end document-->