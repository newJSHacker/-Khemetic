@extends('app')

@section('content')
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                           
                            <div class="col-lg-6">
                                 
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Customer</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="{{ route('customer')}}" id="myForm" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            {!! csrf_field() !!}
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="customer_name" placeholder="Enter Customer Name" class="form-control  {{ $errors->has('customer_name') ? ' is-invalid' : '' }}" >
                                                    @if ($errors->has('customer_name'))
                                                        <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('customer_name') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Reg # /CNIC</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="customer_cnic" placeholder="Reg #" class="form-control  {{ $errors->has('customer_cnic') ? ' is-invalid' : '' }}">
                                                    @if ($errors->has('customer_cnic'))
                                                        <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('customer_cnic') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Address</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="customer_address" placeholder="Address" class="form-control  {{ $errors->has('customer_address') ? ' is-invalid' : '' }}">
                                                    @if ($errors->has('customer_address'))
                                                        <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('customer_address') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">City</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="customer_city" placeholder="City"  class="form-control  {{ $errors->has('customer_city') ? ' is-invalid' : '' }}">
                                                    @if ($errors->has('customer_city'))
                                                        <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('customer_city') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Country</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="customer_country" placeholder="Country" class="form-control  {{ $errors->has('customer_country') ? ' is-invalid' : '' }}">
                                                    @if ($errors->has('customer_country'))
                                                        <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('customer_country') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Mobile</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="customer_mobile_number" placeholder="Mobile # "  class="form-control  {{ $errors->has('customer_mobile_number') ? ' is-invalid' : '' }}">
                                                    @if ($errors->has('customer_mobile_number'))
                                                        <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('customer_mobile_number') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Email</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="customer_email" placeholder="Email" class="form-control  {{ $errors->has('customer_email') ? ' is-invalid' : '' }}">
                                                    @if ($errors->has('customer_email'))
                                                        <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('customer_email') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm"  onclick="myFunction()">
                                            <i class="fa fa-ban"></i> Reset
                                        </button>
                                    </div></form>
                                    </div>
                                </div>

                                
                            </div>
                            <div class="col-lg-6">
                              
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Customers</strong> Details
                                    </div>
                                    <div class="card-body card-block">
                                        <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                               
                                                <th>Name</th>
                                                <th>Contact#</th>
                                                {{--<th>Email</th>--}}

                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($customers as $index => $c)
                                            <tr class="tr-shadow">
                                                
                                                <td>{{ $c->	customer_name }}</td>
                                                <td>
                                                    {{ $c->	customer_mobile_number }}
                                                </td>
                                                {{--<td >  {{ $c->	customer_email }}--}}
                                                

                                               <td>
                                                    <div class="table-data-feature">
                                                        
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <a  href="{{route('edit-customer',$c->cid) }}">  <i class="zmdi zmdi-edit"></i></a>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <a  href="{{route('customer.delete',$c->cid) }}">  <i class="zmdi zmdi-delete"></i>
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
                                    </div>
                                    {{--<div class="card-footer">--}}
                                        {{--<button type="submit" class="btn btn-primary btn-sm">--}}
                                            {{--<i class="fa fa-dot-circle-o"></i> Save--}}
                                        {{--</button>--}}
                                        {{--<button type="reset" class="btn btn-success btn-sm">--}}
                                            {{--<i class="fa fa-ban"></i> Save & Print--}}
                                        {{--</button>--}}
                                    {{--</div>--}}
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
