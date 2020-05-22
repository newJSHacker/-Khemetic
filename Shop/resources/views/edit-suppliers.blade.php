@extends('app')
@section('content')
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-lg-8">

                            <div class="card">
                                <div class="card-header">
                                    <strong>Suppliers</strong>
                                </div>
                                <div class="card-body card-block">
                                    <form  action="{{ route('edit-suppliers', $supplier->id)}}" method="post" id="myForm" enctype="multipart/form-data" class="form-horizontal">
                                        {!! csrf_field() !!}
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="text-input" class=" form-control-label">Name</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="text-input" name="supplier_name" value="{{ $supplier->supplier_name }}" placeholder="Enter Supplier Name" class="form-control" name="supplier-name">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="text-input" class=" form-control-label">Reg #</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="text-input" name="supplier_reg_no" value="{{ $supplier->supplier_reg_no }}" placeholder="Req #" class="form-control" name="supplier-registration-num">

                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="text-input" class=" form-control-label">Phone</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="text-input" name="phone" value="{{ $supplier->phone }}" placeholder="supplier-phone" class="form-control">

                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="text-input" class=" form-control-label">Address</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="text-input" name="address" value="{{ $supplier->address }}" placeholder="Address"class="form-control">

                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="text-input" class=" form-control-label">Wesbite</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="text-input" name="website" value="{{ $supplier->website }}" placeholder="Website"  class="form-control">

                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="text-input" class=" form-control-label">Email</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="text-input" name="email" value="{{ $supplier->email }}" placeholder="Email" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="text-input" class=" form-control-label">Contact Person</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="text-input" name="contact_person" value="{{ $supplier->contact_person }}" placeholder="Contact Person"  class="form-control">

                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="text-input" class=" form-control-label">Designation</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="text-input" name="cp_designation" value="{{ $supplier->cp_designation }}" placeholder="Designation"  class="form-control">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="text-input" class=" form-control-label">Phone</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="text-input" name="phone"  value="{{ $supplier->phone }}" placeholder="Phone"  class="form-control">

                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="text-input" class=" form-control-label">Mobile</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="text-input" name="cp_phone" placeholder="mobile" value="{{ $supplier->cp_phone}}"  class="form-control">

                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="text-input" class=" form-control-label">Email</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="text-input" name="cp_email" value="{{ $supplier->cp_email }}" placeholder="Email" class="form-control">

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
