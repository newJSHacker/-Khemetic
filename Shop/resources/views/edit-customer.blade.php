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
                                    <form action="{{ route('edit-customer', $customer->cid)}}" id="myForm" method="post" enctype="multipart/form-data" class="form-horizontal">
                                        {!! csrf_field() !!}
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="text-input" class=" form-control-label">Name</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="text-input" name="customer_name" placeholder="Enter Customer Name" class="form-control" value="{{ $customer->customer_name}}">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="text-input" class=" form-control-label">Reg # /CNIC</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="text-input" name="customer_cnic" placeholder="Req #" value="{{ $customer->customer_cnic}}" class="form-control" name="supplier-registration-num">

                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="text-input" class=" form-control-label">Address</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="text-input" name="customer_address" placeholder="Address" value="{{ $customer->customer_address}}" class="form-control">

                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="text-input" class=" form-control-label">City</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="text-input" name="customer_city" value="{{ $customer->customer_city}}" placeholder="City" name="supplier-address" class="form-control">

                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="text-input" class=" form-control-label">Country</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="text-input" name="customer_country" value="{{ $customer->customer_country}}" placeholder="Country" name="supplier-website" class="form-control">

                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="text-input" class=" form-control-label">Mobile</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="text-input" name="customer_mobile_number" placeholder="Mobile # "  value="{{ $customer->customer_mobile_number}}" name="email" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="text-input" class=" form-control-label">Email</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="text-input" name="customer_email" value="{{ $customer->customer_email}}" placeholder="Email" name="contact-person" class="form-control">
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

                        </div>

                    </div>
                    <?php include "includes/footer.php"; ?>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection()