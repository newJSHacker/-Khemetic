@extends('app')
@section('content')
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-6">

                    <div class="card">
                        <div class="card-header">
                            <strong>Items</strong>
                        </div>

                        <div class="card-body card-block">

                            <form action="{{ route('items')}}" id="myForm" method="post" enctype="multipart/form-data" class="form-horizontal">
                                {!! csrf_field() !!}
                                <!--<div class="row form-group">-->
                                <!--    <div class="col col-md-3">-->
                                <!--        <label for="select" name="type" class=" form-control-label">TYpe</label>-->
                                <!--    </div>-->
                                <!--    <div class="col-12 col-md-9">-->
                                <!--        <select name="item_type" id="select" class="form-control  {{ $errors->has('item_type') ? ' is-invalid' : '' }}">-->

                                <!--            <option value="">Please select</option>-->
                                <!--            <option value="1">Item</option>-->
                                <!--            <option value="2">Services</option>-->

                                <!--        </select>-->
                                <!--        @if ($errors->has('item_type'))-->
                                <!--            <span class="invalid-feedback">-->
                                <!--                      <strong>{{ $errors->first('item_type') }}</strong>-->
                                <!--                        </span>-->
                                <!--        @endif-->

                                <!--    </div>-->
                                <!--</div>-->
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="select" class=" form-control-label">Brand</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="item_brand" id="select" class="form-control  {{ $errors->has('item_brand') ? ' is-invalid' : '' }}">
                                            <option value="">Please select</option>
                                            @foreach($brands as $brand)
                                                <option value="{{ $brand->brand_name}}">{{ $brand->brand_name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('item_brand'))
                                            <span class="invalid-feedback">
                                                      <strong>{{ $errors->first('item_brand') }}</strong>
                                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="select" class=" form-control-label">Category</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="item_category" id="select" class="form-control  {{ $errors->has('item_category') ? ' is-invalid' : '' }}">
                                            <option value="">Please select</option>
                                            @foreach($category as $cat)
                                                <option value="{{ $cat->category_name}}">{{ $cat->	category_name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('item_category'))
                                            <span class="invalid-feedback">
                                                      <strong>{{ $errors->first('item_category') }}</strong>
                                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Name</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" name="item_name" placeholder="Text" class="form-control  {{ $errors->has('item_name') ? ' is-invalid' : '' }}">
                                        {{--<small class="form-text text-muted">This is a help text</small>--}}
                                        @if ($errors->has('item_name'))
                                            <span class="invalid-feedback">
                                                      <strong>{{ $errors->first('item_name') }}</strong>
                                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Code</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" name="item_code" placeholder="Item code" class="form-control {{ $errors->has('item_code') ? ' is-invalid' : '' }}">
                                        {{--<small class="form-text text-muted">This is a help text</small>--}}
                                        @if ($errors->has('item_code'))
                                            <span class="invalid-feedback">
                                                      <strong>{{ $errors->first('item_code') }}</strong>
                                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="textarea-input" class=" form-control-label">Colors</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" name="colors" id="textarea-input" rows="5" placeholder="Colors" class="form-control {{ $errors->has('colors') ? ' is-invalid' : '' }}">
                                        @if ($errors->has('colors'))
                                            <span class="invalid-feedback">
                                                      <strong>{{ $errors->first('colors') }}</strong>
                                                        </span>
                                        @endif
                                    </div>
                                </div>
                                  <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="textarea-input" class=" form-control-label">Quantity</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" name="quantity" id="textarea-input" rows="5" placeholder="Quantity" class="form-control">
                                       
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="textarea-input" class=" form-control-label">old Price</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" name="old_price" id="textarea-input" rows="5" placeholder="Old Price" class="form-control">
                                       
                                    </div>
                                </div>
                                 <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="textarea-input" class=" form-control-label">New Price</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" name="new_price" id="textarea-input" rows="5" placeholder="New Price" class="form-control">
                                       
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="textarea-input" class=" form-control-label">Description</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea name="item_description" id="textarea-input" rows="5" placeholder="Content..." class="form-control {{ $errors->has('item_description') ? ' is-invalid' : '' }}"></textarea>
                                        @if ($errors->has('item_description'))
                                            <span class="invalid-feedback">
                                                      <strong>{{ $errors->first('item_description') }}</strong>
                                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="file-multiple-input" class=" form-control-label">Images</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="file" id="file-multiple-input" name="item_image[]" multiple="" class="form-control-file {{ $errors->has('item_image') ? ' is-invalid' : '' }}">
                                        <small class="form-text text-muted">Press Control to select multiple files</small>
                                        @if ($errors->has('item_image'))
                                            <span class="invalid-feedback">
                                                      <strong>{{ $errors->first('item_image') }}</strong>
                                                        </span>
                                        @endif
                                         <div class="gallery"></div>
                                    </div>
                                </div>




                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fa fa-dot-circle-o"></i> Submit
                                    </button>
                                    <button type="reset" class="btn btn-danger btn-sm" onclick="myFunction()">
                                        <i class="fa fa-ban"></i> Reset
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">

                    <div class="card">
                        <div class="card-header">
                            <strong>Items</strong> Details
                        </div>
                        <div class="card-body card-block">
                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-data2">
                                    <thead>
                                    <tr>

                                        <th>Name</th>
                                        <th>Code</th>

                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($items as $index => $i)
                                        <tr class="tr-shadow">

                                            <td>{{ $i->item_name }}</td>
                                            <td>
                                                {{ $i->item_code}}
                                            </td>

                                            <td>
                                                <div class="table-data-feature">

                                                     <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                       <a  href="{{route('edit-products',$i->id) }}"> <i class="zmdi zmdi-edit"></i></a>
                                                   </button>
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                        <a  href="{{route('items.delete',$i->item_code) }}"> <i class="zmdi zmdi-delete"></i></a>
                                                    </button>

                                                </div>
                                            </td>

                                        </tr>
                                        <tr class="spacer"></tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <?php include "includes/footer.php"; ?>
        </div>
    </div>
    </div>
    </div>

    </div>
    <style>
        input[type="file"] {
            display: block;
        }
        .imageThumb {
            max-height: 75px;
            border: 2px solid;
            padding: 1px;
            cursor: pointer;
        }
        .pip {
            display: inline-block;
            margin: 10px 10px 0 0;
        }
        .remove {
            display: block;
            background: #444;
            border: 1px solid black;
            color: white;
            text-align: center;
            cursor: pointer;
        }
        .remove:hover {
            background: white;
            color: black;
        }
    </style>


@endsection()
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    function myFunction() {
        document.getElementById("myForm").reset();
    }
//    function readURL(input) {
//        if (input.files && input.files[0]) {
//            var reader = new FileReader();
//
//            reader.onload = function (e) {
//                $('#blah')
//                        .attr('src', e.target.result)
//                        .width(50)
//                        .height(50);
//            };
//
//            reader.readAsDataURL(input.files[0]);
//        }
//    }
    // $(function() {
    //     // Multiple images preview in browser
    //     var imagesPreview = function(input, placeToInsertImagePreview) {

    //         if (input.files) {
    //             var filesAmount = input.files.length;

    //             for (i = 0; i < filesAmount; i++) {
    //                 var reader = new FileReader();

    //                 reader.onload = function(event) {
    //                     $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview).width(50).height(50);
    //                 }

    //                 reader.readAsDataURL(input.files[i]);
    //             }
    //         }

    //     };

    //     $('#file-multiple-input').on('change', function() {
    //         imagesPreview(this, 'div.gallery');
    //     });
    // });
    $(document).ready(function() {
        if (window.File && window.FileList && window.FileReader) {
            $("#file-multiple-input").on("change", function(e) {
                var files = e.target.files,
                        filesLength = files.length;
                for (var i = 0; i < filesLength; i++) {
                    var f = files[i];
                    var fileReader = new FileReader();
                    fileReader.onload = (function(e) {
                        var file = e.target;
                        $("<span class=\"pip\">" +
                                "<img  class=\"imageThumb\"  src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                                "<br/><span class=\"remove\" >X</span>" +
                                "</span>").insertAfter("#file-multiple-input");
                        $(".remove").click(function(){
                            $(this).parent(".pip").remove();
                       var x=  $('#file-multiple-inputs').val();
//                            alert(x);
                        });
//                        $(".remove").click(function(e){
////                            $(this).parent(".pip").remove();
//                            var file = $(this).data("file");
//                            for (var i = 0; i < filesLength.length; i++) {
//                                if (filesLength[i].name === file) {
//                                    filesLength.splice(i, 1);
//                                    break;
//                                }
//                            }
//                        $('.imageThumb').click(function() {
//
//                            var selectedImg = $(this);
//                            selectedImg.remove();
//                            return;
//                        });

                        // Old code here
                        /*$("<img></img>", {
                         class: "imageThumb",
                         src: e.target.result,
                         title: file.name + " | Click to remove"
                         }).insertAfter("#files").click(function(){$(this).remove();});*/

                    });
                    fileReader.readAsDataURL(f);
                }
            });
        } else {
            alert("Your browser doesn't support to File API")
        }
    });

</script>
<!-- end document-->