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
                                        <form action="{{ route('edit-items', $item->id)}}" method="post"  class="form-horizontal">
                                            {!! csrf_field() !!}
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">TYpe</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="item_type" id="select" class="form-control">
                                                        <option value="0">Please select</option>
                                                        <option value="1"  <?php if($item->item_type=='1'){ echo ' selected="selected"';}?>>Item</option>
                                                        <option value="2" <?php if($item->item_type=='2'){ echo ' selected="selected"';}?>>Services</option>
                                                    </select>
                                                </div>
                                            </div>
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
                                                        <!--<option value="{{ $cat->category_parent_category}}" <?php if($cat->category_parent_category==$cat->category_parent_category){ echo ' selected="selected"';}?>>{{ $cat->category_parent_category}}</option>-->
                                                         <option value="{{ $cat->category_name}}" <?php if($cat->category_name==$cat->category_name){ echo ' selected="selected"';}?>>{{ $cat->	category_name}}</option>
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
                                                    <label for="textarea-input" class=" form-control-label" >Description</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="item_description" id="textarea-input" rows="5" placeholder="Content..." class="form-control">{{ $item->item_description }}</textarea>
                                                </div>
                                            </div>

                                            
                                            

                                    </div>
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