@extends('app')
@section('content')
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                  
                    <div class="table-data__tool">

                        <div class="table-data__tool-left">
                              <h3 class="title-5 m-b-35">Inventory Records</h3>
                            <!--<div class="rs-select2--light rs-select2--md">-->
                            <!--    <select class="js-select2 test" name="property" >-->
                            <!--        <option selected="selected" class="all" value="all" >All Categories</option>-->
                            <!--        @foreach($cat as $c)-->
                            <!--            <option value="{{$c->category_parent_category	}}">{{$c->category_parent_category	}}</option>-->
                            <!--        @endforeach-->
                            <!--    </select>-->
                            <!--    <div class="dropDownSelect2"></div>-->

                            <!--</div>-->

                            <!--<div class="rs-select2--light rs-select2--sm">-->
                            <!--    <select class="js-select2 brands" name="time">-->
                            <!--        <option selected="selected">Brands</option>-->
                            <!--        @foreach($brands as $brand)-->
                            <!--            <option value="{{$brand->brand_name}}">{{$brand->brand_name}}</option>-->
                            <!--        @endforeach-->


                            <!--        {{--<option value="">1 Week</option>--}}-->
                            <!--    </select>-->
                            <!--    <div class="dropDownSelect2"></div>-->
                            <!--</div>-->
                            <!--<button class="au-btn-filter s">-->
                            <!--    <i class="zmdi zmdi-filter-list"></i>filters</button>-->
                        </div>
                        <div class="table-data__tool-right">
                            <a href="items"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                    <i class="zmdi zmdi-plus"></i>Add Item</button></a>
                            <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                                <select class="js-select2 bulk_delete" name="type" id="bulk_delete">
                                    <option selected="selected">Action</option>
                                    <option value="delete"  >Delete Items</option>
                                    {{--<option value="">Out of Stock</option>--}}
                                    <!--<option value="">Sales Report</option>-->
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2"id="ttt">
                            <thead>
                            <tr>
                                <th>
                                    <label class="au-checkbox">
                                        <input type="checkbox">
                                        <span class="au-checkmark"></span>
                                    </label>
                                </th>
                                <th>Name</th>
                                <!--<th>Description</th>-->
                                <th>Code</th>
                                {{--<th>Brand </th>--}}
                                {{--<th>Category</th>--}}
                                <th>Colors</th>
                                <th>Quantity</th>
                                <th>Old price</th>
                                <th>New price</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody id="xy">
                            @foreach($items as $index => $i)

                                <tr class="tr-shadow new" >
                                    <td>
                                        <label class="au-checkbox ">
                                            <input type="checkbox" name="student_checkbox[]" class="student_checkbox" value="{{$i->id}}" >
                                            <span class="au-checkmark"></span>
                                        </label>
                                    </td>
                                    <td>{{ $i->item_name }}</td>
                                    <!--<td>-->
                                    <!--    {{str_limit( $i->item_description,8) }}-->
                                    <!--</td>-->
                                    <td class="desc"> {{ $i->item_code }}</td>
                                    {{--<td>--}}
                                        {{--{{ $i->item_brand }}--}}
                                    {{--</td>--}}
                                    {{--<td>{{ $i->item_category }}</td>--}}
                                    <td>{{ $i->colors }}</td>
                                    <td>{{ $i->quantity }}</td>
                                    <td>{{ $i->old_price }}</td>
                                    <td>{{ $i->new_price }}</td>

                                    <td>
                                        <div class="table-data-feature">
                                            {{--<button class="item" data-toggle="tooltip" data-placement="top" title="Send">--}}
                                            {{--<i class="zmdi zmdi-mail-send"></i>--}}
                                            {{--</button>--}}
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <a  href="{{route('edit-products',$i->id) }}"> <i class="zmdi zmdi-edit"></i></a>
                                            </button>
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                <a class="createe-modal nav-link"  href="{{route('items.delete',$i->item_code) }}"> <i class="zmdi zmdi-delete"></i></a>
                                            </button>
                                            {{--<button class="item imagee" data-toggle="modal" data-target="#updated{{$i->item_code}}"   title="More" id="imagee" value="{{$i->item_code}}">--}}
                                            {{--<i class="zmdi zmdi-more"></i>--}}
                                            {{--</button>--}}
                                            <button class="item imagee" data-toggle="modal" data-target="#updated"   title="More" id="imagee" value="{{$i->item_code}}">
                                                <i class="zmdi zmdi-more"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="spacer"></tr>

                            @endforeach

                            </tbody>
                            <tbody id="forTable"></tbody>


                        </table>
                    </div>
                    <!-- END DATA TABLE -->
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- END MAIN CONTENT-->
    <!-- END PAGE CONTAINER-->
    </div>


    </div>
    <div id="updated" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Item Details</h4>
                </div>
                <div class="modal-body">
                    <div class="container mt-8">
                        <div class="col-lg-15" style="padding-left: 15%;padding-right: 10%">
                            {{--<span id="img-test" name="itm"></span>--}}
                            <table class="table table-striped">
                                <thead>
                                {{--<tr>--}}
                                {{--<th>Customer Name</th>--}}
                                {{--<th>Items</th>--}}
                                {{--<th>Quantity</th>--}}
                                {{--<th>price</th>--}}
                                {{--</tr>--}}
                                </thead>
                                <tr>
                                    <td id ="c-name"> </td>
                                    <td id ="c-item"> </td>
                                    <td id ="quantity"> </td>
                                    <td id ="price" > </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <style>
        .img{
            /*max-height: 12vw;*/
            /*min-height: 12vw;*/
            /*max-width:12vw;*/
            /*min-width: 12vw;*/
            display: inline-block;
            max-width: 98%;
            height: 30%;
            width: 30%;
            margin: 1%;
        }
    </style>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>

        $(document).ready(function () {

//            $(".test").on('change', function () {
//                var val = $(this).val();
//                if (val == "all") {
//                    location.reload();
//                }
//                $.ajax({
//                    type: 'get',
//                    url: '/inventory/search/' + $(this).val(),
//                    dataType: "json",
//                    success: function (data) {
//                        $("#xy").hide();
////                        if ( this.value == 'all')
////                        {
////                            $("#xy").show();
////                        }
//                       // $("#z").show();
//
//
//                        var eTable="";
//
//                        for (var a = 0; a < data.length; a++) {
//                            var u=data[a]["id"];
//                            var c=data[a]["item_code"];
//
//                            eTable += "<tr class='tr-shadow' style='box-shadow: 0px 10px 20px 0px rgba(0, 0, 0, 0.03'>";
//                            eTable  +=     eTable  +='<td><label class="au-checkbox"><input type="checkbox"  name="student_checkbox[]" class="student_checkbox"" value= "'+ u +'"><span class="au-checkmark"></span> </label></td>';
//                            eTable += "<td>" + data[a]["item_name"]+ "</td>";
//                            eTable += "<td>" + data[a]["item_description"]+ "</td>";
//                            eTable += "<td>" + data[a]["item_code"]+ "</td>";
//                            eTable += "<td>" + data[a]["item_type"]+ "</td>";
//                            eTable += "<td>" + data[a]["item_brand"]+ "</td>";
//                            eTable += "<td>" + data[a]["item_category"]+ "</td>";
//                            eTable += '<td><div class="table-data-feature"><button class="item" data-toggle="tooltip" data-placement="top" title="Edit"> <a  href="edit-items/' + u + '"> <i class="zmdi zmdi-edit"></i></a> </button><button class="item" data-toggle="tooltip" data-placement="top" title="Delete"><a  class="createe-modal nav-link" href ="inventory/delete/' + u + '"><i class="zmdi zmdi-delete"></i></a></button><button class="item imagee" data-toggle="modal" data-target="#updated" title="More" id="imagee" value="' + c + '"> <i class="zmdi zmdi-more"></i></button></div></td>';
////                            $('.descip').text(data[a]["item_description"]);
////                            $('.code').text(data[a]["item_code"]);
////                            $('.type').text(data[a]["item_type"]);
////                            $('.type').text(data[a]["item_type"]);
////                            $('.brand').text(data[a]["item_brand"]);
////                            $('.category').text(data[a]["item_category"]);
//                        }
//                        eTable +="</tbody></table>";
//                        $('#forTable').html(eTable);
//                    }
//                });
//            });
            $(".s").on('click', function () {
                var b = $('.brands').val();
                var t = $('.test').val();
                //  alert(t);
                $.ajax({
                    type: 'get',
                    url: '/inventory/searchBrand/'+b+'/'+t,
                    dataType: "json",
                    success: function (data) {
                        $("#xy").hide();
                        var eTable = "";
                        for (var a = 0; a < data.length; a++) {
                            var u = data[a]["id"];
                            eTable += "<tr class='tr-shadow' style='box-shadow: 0px 10px 20px 0px rgba(0, 0, 0, 0.03'>";
                            eTable += '<td><label class="au-checkbox"><input type="checkbox"  name="student_checkbox[]" class="student_checkbox"" value= "' + u + '"><span class="au-checkmark"></span> </label></td>';
                            eTable += "<td>" + data[a]["item_name"] + "</td>";
                            eTable += "<td>" + data[a]["item_description"] + "</td>";
                            eTable += "<td>" + data[a]["item_code"] + "</td>";
                            eTable += "<td>" + data[a]["item_type"] + "</td>";
                            eTable += "<td>" + data[a]["item_brand"] + "</td>";
                            eTable += "<td>" + data[a]["item_category"] + "</td>";
                            eTable += '<td><div class="table-data-feature"><button class="item" data-toggle="tooltip" data-placement="top" title="Edit"> <a  href="edit-items/' + u + '"> <i class="zmdi zmdi-edit"></i></a> </button><button class="item" data-toggle="tooltip" data-placement="top" title="Delete"><a  class="createe-modal nav-link" href ="inventory/delete/' + u + '"><i class="zmdi zmdi-delete"></i></a></button><button class="item imagee" data-toggle="modal" data-target="#updated' + data[a]["item_code"] + '"    title="More" id="imagee" value= "' + data[a]["item_code"] + ' "><i class="zmdi zmdi-more"></i></button></div></td>';
                        }
                        eTable += "</tbody></table>";
                        $('#forTable').html(eTable);

                    }
                });
            });
            $(".imagee").on('click', function (e) {
                e.preventDefault();
                var x= $(this).val();
                // alert(x);
                $.ajax({
                    type: 'get',
                    url: '/all-items/' +x,
                    dataType: "json",

                    success: function (data) {
                        $('#c-name').empty();
                        for (var i = 0; i < data.length; i++) {
                            var t = data[i]["item_image"];
                            var u = data[i]["id"];
                            //       var x= $('#c-name').text(data[i]["id"])
                            $('#c-name').append('<img class="img" style="width:auto" src="'+ t + '" /><button ><a href="all-items/deleteimg/' + u + '" > <i class="zmdi zmdi-delete btn"></i></a></button>');
                        }
                        $('#updated').modal('show');
                    }
                });
            });
            $(document).on('change', '#bulk_delete', function () {
                // var x = [];
                var val = $(this).val();
                if (val == "delete") {
                    if (confirm("Are you sure you want to Delete this data?")) {
                        $('.student_checkbox:checked').each(function () {
                            var s = $(this).val();
                            // alert(s);
                            if (s.length > 0) {
                                $.ajax({
                                    url: 'all-items/massremovee/' + s,
                                    type: 'get',
                                    // data:{id:s},
                                    success: function (data) {
                                        location.reload();
                                    }
                                });
                            }
                            else {
                                alert("Please select atleast one checkbox");
                            }
                        });
                    }
                }
            });

        });
    </script>
    @endsection
            <!-- end document-->