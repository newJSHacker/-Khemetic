@extends('app')

@section('content')
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                           
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Suppliers</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <form  action="{{ route('suppliers')}}" method="post" id="myForm" enctype="multipart/form-data" class="form-horizontal">
                                            {!! csrf_field() !!}
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="supplier_name" placeholder="Enter Supplier Name" class="form-control  {{ $errors->has('supplier_name') ? ' is-invalid' : '' }}" name="supplier-name">
                                                    @if ($errors->has('supplier_name'))
                                                        <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('supplier_name') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Reg #</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="supplier_reg_no" placeholder="Reg #" class="form-control  {{ $errors->has('supplier_reg_no') ? ' is-invalid' : '' }}" name="supplier-registration-num">
                                                    @if ($errors->has('supplier_reg_no'))
                                                        <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('supplier_reg_no') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Phone</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="phone" placeholder="supplier-phone" class="form-control  {{ $errors->has('phone') ? ' is-invalid' : '' }}">
                                                    @if ($errors->has('phone'))
                                                        <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('phone') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Address</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="address" placeholder="Address"class="form-control  {{ $errors->has('address') ? ' is-invalid' : '' }}">
                                                    @if ($errors->has('address'))
                                                        <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('address') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Wesbite</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="website" placeholder="Website"  class="form-control  {{ $errors->has('website') ? ' is-invalid' : '' }}">
                                                    @if ($errors->has('website'))
                                                        <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('website') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Email</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="email" placeholder="Email" class="form-control  {{ $errors->has('email') ? ' is-invalid' : '' }}">
                                                    @if ($errors->has('email'))
                                                        <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Contact Person</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="contact_person" placeholder="Contact Person"  class="form-control  {{ $errors->has('contact_person') ? ' is-invalid' : '' }}">
                                                    @if ($errors->has('contact_person'))
                                                        <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('contact_person') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Designation</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="cp_designation" placeholder="Designation"  class="form-control  {{ $errors->has('cp_designation') ? ' is-invalid' : '' }}">
                                                    @if ($errors->has('cp_designation'))
                                                        <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('cp_designation') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Phone</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="phone" placeholder="Phone"  class="form-control  {{ $errors->has('phone') ? ' is-invalid' : '' }}">
                                                    @if ($errors->has('phone'))
                                                        <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('phone') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Mobile</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="cp_phone" placeholder="mobile"  class="form-control  {{ $errors->has('cp_phone') ? ' is-invalid' : '' }}">
                                                    @if ($errors->has('cp_phone'))
                                                        <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('cp_phone') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Email</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="cp_email" placeholder="Email" class="form-control  {{ $errors->has('cp_email') ? ' is-invalid' : '' }}">
                                                    @if ($errors->has('cp_email'))
                                                        <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('cp_email') }}</strong>
                                                    </span>
                                                    @endif
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
                                        <strong>Suppliers</strong> Details
                                    </div>
                                    <div class="card-body card-block">
                                        <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                               
                                                <th>Name</th>
                                                <th>Contact</th>
                                                {{--<th>Email</th>--}}
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                         @foreach($supplier as $index => $s)
                                            <tr class="tr-shadow">
                                                
                                                <td>{{ $s->supplier_name }}</td>

                                                <td class="desc">{{ $s->phone }}</td>
                                                
                                                {{--<td>--}}
                                                   {{--1700--}}
                                                {{--</td>--}}
                                               <td>
                                                    <div class="table-data-feature">
                                                        
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <a  href="{{route('edit-suppliers',$s->id) }}"><i class="zmdi zmdi-edit"></i></a>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <a  href="{{route('suppliers.delete',$s->id) }}"><i class="zmdi zmdi-delete"></i></a>
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
                @endsection()
    <script>
        function myFunction() {
            document.getElementById("myForm").reset();
        }
    </script>

<!-- end document-->