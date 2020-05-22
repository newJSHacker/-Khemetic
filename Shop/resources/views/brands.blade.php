@extends('app')
@section('content')
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- DATA TABLE -->
                            <h3 class="title-5 m-b-35">Brands</h3>
                            <div class="table-data__tool">
                                <div class="table-data__tool-left">
                                    <button class="au-btn-filter">
                                        <a href="{{ route('categorie')}}" style="color: #808080;"><i class="zmdi zmdi-filter-list"></i>Categories</a></button>
                                    <button class="au-btn-filter">
                                        <a href="{{ route('brands')}}" style="color: #808080;"><i class="zmdi zmdi-filter-list"></i>Brands</a></button>
                                    <button class="au-btn-filter">
                                        <i class="zmdi zmdi-filter-list"></i>Types</button>
                                </div>
                                </div>
                                <div class="table-data__tool-right">
                                    <a href="add-brands"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <i class="zmdi zmdi-plus"></i>Add Brands</button></a>
                                    <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                                        <select class="js-select2" name="type">
                                            <option selected="selected">Action</option>
                                            <option value="">Delete</option>
                                            <option value="">Toggle Status</option>
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
                                        <th>Name</th>
                                        <th>Logo</th>

                                        {{--<th>Parent Category</th>--}}
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($ca as $index => $c)
                                        <tr class="tr-shadow">
                                            <td>
                                                <label class="au-checkbox">
                                                    <input type="checkbox">
                                                    <span class="au-checkmark"></span>
                                                </label>
                                            </td>
                                            <td>{{ $c->brand_name }}</td>
                                            <td>
                                                {{--<img src="{{ asset('avatars/1542626237.jpeg') }}" style="width:30%" />--}}
                                                {{--<img src="{{ asset($c->brand_logo) }}" style="width:30%" />--}}
                                                <img src="{{ $c->brand_logo }}" style="width:30%">

                                            </td>
                                            <td>
                                                <div class="table-data-feature">
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <a  href="{{route('edit-brand',$c->id) }}">    <i class="zmdi zmdi-edit"></i></a>
                                                    </button>
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                        <a  href="{{route('brand.delete',$c->id) }}">  <i class="zmdi zmdi-delete"></i>
                                                        </a>
                                                    </button>
                                                </div>
                                            </td>
                                       </tr>
                                        <tr class="spacer"></tr>


                                    @endforeach
                                    </tbody>
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
@endsection()