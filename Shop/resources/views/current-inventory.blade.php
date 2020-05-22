@extends('app')
@section('content')
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">Current Inventory</h3>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">

                                        <div class="rs-select2--light rs-select2--md">
                                            <select class="js-select2 test" name="property">
                                                <option selected="selected">All Categories</option>
                                                @foreach($cat as $c)
                                                    <option value="{{$c->category_parent_category	}}">{{$c->category_parent_category	}}</option>
                                                @endforeach
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <div class="rs-select2--light rs-select2--sm">
                                            <select class="js-select2 brands" name="time">
                                                <option selected="selected">Brands</option>
                                                @foreach($brands as $brand)
                                                    <option value="{{$brand->brand_name}}">{{$brand->brand_name}}</option>
                                                @endforeach
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                        <tr>
                                            <th>
                                                <label class="au-checkbox">
                                                    <input type="checkbox">
                                                    <span class="au-checkmark"></span>
                                                </label>
                                            </th>
                                            <th>Item</th>
                                            <th>Current Qty</th>
                                            <th>Selling Price</th>
                                            <th>purchase Price</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>
                                        <tbody id="xy">
                                        @foreach($inventory as $index => $inventory)
                                        <tr class="tr-shadow">
                                            <td>
                                                <label class="au-checkbox">
                                                    <input type="checkbox">
                                                    <span class="au-checkmark"></span>
                                                </label>
                                            </td>
                                            <td>{{ $inventory->item_code }}</td>
                                            <td class="desc">{{ $inventory->item_qty_in_hand }}</td>
                                            <td>{{$inventory->item_current_selling_price}}</td>
                                            <td>{{$inventory->item_current_purchase_price}}</td>
                                            <td> <span class="status--process">Active</span></td>

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
                        <?php include "includes/footer.php"; ?>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>
    </div>
                <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
                <script>

                    $(document).ready(function () {
                        $(".brands").on('change', function () {
                            var b = $('.brands').val();
                            var t = $('.test').val();
                            //  alert(t);
                            $.ajax({
                                type: 'get',
                                url: '/current-inventory/search/' + b + '/' + t,
                                dataType: "json",
                                success: function (data) {
                                    $("#xy").hide();

                                        var eTable = "";
                                        for (var a = 0; a < data.length; a++) {
                                            var u = data[a]["id"];
                                            eTable += "<tr class='tr-shadow' style='box-shadow: 0px 10px 20px 0px rgba(0, 0, 0, 0.03'>";
                                            eTable += '<td><label class="au-checkbox"><input type="checkbox"  name="student_checkbox[]" class="student_checkbox"" value= "' + u + '"><span class="au-checkmark"></span> </label></td>';
                                            eTable += "<td>" + data[a]["item_code"] + "</td>";
                                            eTable += "<td>" + data[a]["item_qty_in_hand"] + "</td>";
                                            eTable += "<td>" + data[a]["item_current_selling_price"] + "</td>";
                                            eTable += "<td>" + data[a]["item_current_purchase_price"] + "</td>";
                                            eTable += "<td><span class='status--process'>Active</span> </td>";
                                        }
                                        eTable += "</tbody></table>";
                                        $('#forTable').html(eTable);

                                }
                            });
                        });
                    });
    </script>
   @endsection()