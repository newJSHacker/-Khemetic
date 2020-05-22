<aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="{!! url('/') !!}">
                    <img src="{!! asset('../../public/img/logo.png') !!}" alt="" style="width: 75%;"/>
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                     <li>
                            <a href="{!! url('/manage-zarna') !!}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tasks"></i>Inventory</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="{{route('inventory') }}">Items</a>
                                </li>
                                <li>
                                    <a href="{{route('categorie') }}">Category/Brands/Types</a>
                                </li>
                                <li>
                                    <a href="{!! route('current-inventory') !!}">Current Inventory</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fab fa-ethereum"></i>Purchase</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="{{route('po') }}">Purchase orders</a>
                                </li>
                                <li>
                                    <a href="{{route('purchases') }}">Purchases</a>
                                </li>
                                <li>
                                    <a href="{!! route('current-inventory') !!}">Current Stock</a>
                                </li>
                                 {{--<li>--}}
                                    {{--<a href="request-for-quotation">Request For Quotation</a>--}}
                                {{--</li>--}}
                                 <li>
                                    <a href="{!! route('purchase-return') !!}">Purchase Return</a>
                                </li>
                                <li>
                                    <a href="{!! route('grn') !!}">Goods Receive Note</a>
                                </li>
                                <li>
                                    <a href="{{route('suppliers') }}">Supplier</a>
                                </li>
                            </ul>
                        </li>
                        <!--li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-chart-bar"></i>Sales</a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                 <li>
                                    <a href="{!! url('sales-quotation') !!}">Quotation</a>
                                </li>
                                <li>
                                    <a href="{!! url('sales-invoice') !!}sales-invoice">Invoices</a>
                                </li>
                                <li>
                                    <a href="{!! url('purchase-request') !!}">Purchase Request</a>
                                </li>
                                <li>
                                    <a href="{!! url('current-inventory') !!}">Current Stock</a>
                                </li>
                                <li>
                                    <a href="{{ url('customer') }}">Customers</a>
                                </li>
                                <li>
                                    <a href="{!! url('sales-return') !!}">Sales Return</a>
                                </li>
                              	<li>
                                    <a href="{!! url('sdn') !!}">SDN</a>
                                </li>

                            </ul>
                        </li-->

                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-th-large"></i>Orders</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                 <li>
                                    <a href="{!! url('guest-orders') !!}">Guest Orders</a>
                                </li>
                                <li>
                                    <a href="{!! url('orders') !!}">Placed Orders</a>
                                </li>
                                <li>
                                    <a href="{{route('confirmed-orders') }}">Confirmed Orders</a>
                                </li>
                                {{--<li>--}}
                                    {{--<a href="orders-status">Order Status</a>--}}
                                {{--</li>--}}
                                <li>
                                     <li>
                                    <a href="{{ route('request-for-return') }}">Request for Return</a>
                                </li>
                                    <a href="">Order Completed</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="{!! route('posts') !!}">
                                <i class="fas fa-tasks"></i>Posts</a>
                        </li>
                         <li>
                            <a href="{!! route('all-items') !!}">
                                <i class="fas fa-chart-bar"></i>Items</a>
                        </li>


                    </ul>
                </nav>
            </div>
        </aside>
