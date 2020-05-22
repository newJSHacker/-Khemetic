@extends('app')

@section('content')
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                      {{--@include ("pages/top-boxes")--}}
                        {{--@include ("pages/graphs-report")--}}
                        @include ("pages/top-sold-items")
<!--                        --><?php //include "pages/inventory-display.php"; ?>
                        <?php include "includes/footer.php"; ?>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>
@endsection()

