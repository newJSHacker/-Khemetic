<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('addmoney/stripe', array('as' => 'addmoney.paywithstripe','uses' => 'AddMoneyController@payWithStripe'));
Route::post('addmoney/stripe', array('as' => 'addmoney.stripe','uses' => 'AddMoneyController@postPaymentWithStripe'));



/* Routing for home */
// Route::get('/sms','ShipmentController@sms')->name('sms');
Route::get('/','IndexController@create');
Route::get('/brokenlinks','IndexController@links');
Route::get('/order-now','GuestController@guest')->name('order-now');
Route::post('/order-now','GuestController@store');
Route::get('/about-zarna','IndexController@about')->name('about-zarna');
Route::get('/event-management','IndexController@eventmanagement')->name('event-management');
Route::post('comments','IndexController@comments')->name('comments');
Route::get('/replies/{code}/{id}', 'IndexController@replies')->name('replies');
Route::post('/re', 'IndexController@reply')->name('re');

/*routing for shop */
Route::get('/shop','IndexController@shop')->name('shop');
Route::post('/get-product','IndexController@getProduct')->name('get-product');
Route::get('/shopp/{item_category}','IndexController@shopp')->name('shopp');
Route::post('/shop','IndexController@sort')->name('shop');
Route::post('/sort','IndexController@sort')->name('sort');
Route::get('/sorts','IndexController@sorts')->name('sorts');
Route::get('/product-details/{item_code}','IndexController@details')->name('product-details');
Route::get('/type','IndexController@type');
Route::post('/search','IndexController@search')->name('searchResult');
Route::post('/searchh','IndexController@searchPro')->name('searchproduct');
//Route::post('/search/item_name','IndexController@search');

/* Routing for contact*/
Route::get('/contact-zarna','ContactController@create')->name("contact-us");
Route::post('/contact-zarna','ContactController@store');



/*Routing for cart */
Route::get('/shop/{item_code}','CartController@cart')->name('cart');
Route::post('/product-details','CartController@cartt')->name('cartt');
Route::get('/your-shoping-cart','CartController@create')->name('your-shoping-cart');
Route::get('/your-shoping-cart/delete/{cid}', 'CartController@delete')->name("your-shoping-cart.delete");
Route::post('cart/update/{cid}/{item_qty}/{item_current_selling_price}', 'CartController@update')->name('cart.update');
Route::post('carts/updates/{cid}/{user_measurment_id}', 'CartController@updated')->name('carts.updates');
/*Routing for shipment */
Route::get('/shipment-details','ShipmentController@create')->name('shipment-details');
Route::post('/shipment-details','ShipmentController@store')->name('shipment-details');
Route::post('/shipment','ShipmentController@storee')->name('shipment');
Route::get('/order-overview','ShipmentController@viewOrder')->name('order-overview');
Route::get('/order-overview/delete/{cid}', 'ShipmentController@delete')->name("order-overview.delete");
Route::get('/proceed-payment','ShipmentController@payment')->name('proceed-payment');
Route::get('/place-order','ShipmentController@placeOrder')->name('place-order');
Route::post('/proceed-payment','ShipmentController@placeOrder')->name('proceed-payment');
Route::get('/complete-order','ShipmentController@order')->name('complete-order');
Route::get('/truncate','ShipmentController@truncate')->name('truncate');

/*Routing for change password*/
Route::get('/password','PasswordController@create')->name('password');
Route::post('/password','PasswordController@changepassword');

/* my orders*/
Route::get('/view-order/{id}','ShipmentController@orderDetails')->name('view-order');
Route::get('/my-orders','IndexController@myOrders')->name('my-orders');
Route::get('/cancel/{id}','IndexController@cancel')->name('cancel');
 /* blog */
Route::get('/blog','IndexController@blog')->name("blog");
Route::get('/single-blog/{id}','IndexController@singleBlog')->name('single-blog');
Route::get('/return-items/{order_no}','IndexController@ReturnItems')->name('return-items');
Route::post('/submit-return','IndexController@SubmitReturn')->name('submit-return');
//Route::get('/blog', function () {
//    return view('blog');
//});

Route::get('test',function(){
   return App\item_categories::with('childs')->where('category_parent_category', 0)->get();
});


Auth::routes();
Route::middleware(['auth'])->group( function() {

//    Route::get('/manage-zarna', function () {
//        return view('index');
//    });
    Route::get('/manage-zarna','DashboardController@create')->name("manage-zarna");

//    Route::get('orders-status', function () {
//        return view('sales-invoice');
//    });

    /* Routing for Items */
    Route::get('/inventory', 'ItemsController@display')->name("inventory");
    Route::get('/all-items', 'ItemsController@displayAll')->name("all-items");
    Route::get('add-items', 'ItemsController@create')->name("add-items");
    Route::get('/all-items/{item_code}','ItemsController@imagesPro');
    Route::get('/all-items/massremovee/{id}', 'ItemsController@massremovee');
    Route::get('/all-items/deleteimgs/{id}', 'ItemsController@deleteimgs')->name("all-items.deleteimgs");
    Route::post('add-items', 'ItemsController@store');
    Route::get('items', 'ItemsController@items')->name("items");
    Route::post('items', 'ItemsController@storeItems');
    Route::post('edit-products/{id}', 'ItemsController@updatePro');
    Route::get('edit-products/{id}', 'ItemsController@editPro')->name("edit-products");
    Route::get('/items/delete/{item_code}', 'ItemsController@deleteItems')->name("items.delete");
    Route::get('edit-items/{id}', 'ItemsController@edit')->name("edit-items");
    Route::post('edit-items/{id}', 'ItemsController@update');
    Route::get('/inventory/delete/{id}', 'ItemsController@delete')->name("inventory.delete");
    Route::get('/inventory/search/{category_name}','ItemsController@search')->name('search');
    Route::get('/inventory/searchBrand/{item_brand}/{category_name}','ItemsController@searchBrand');
    Route::get('/inventory/{item_code}','ItemsController@images');
    Route::get('/inventory/deleteimg/{id}', 'ItemsController@deleteimg')->name("inventory.deleteimg");
    Route::get('/inventory/massremove/{id}', 'ItemsController@massremove');

    /* Routing for categories*/
    Route::get('/categorie', 'CategoryController@display')->name("categorie");
    Route::get('add-categories-brannds', 'CategoryController@create')->name("add-categories-brannds");
    Route::post('add-categories-brannds', 'CategoryController@store');
    Route::get('/categorie/delete/{id}', 'CategoryController@delete')->name("category.delete");
    Route::get('edit-category/{id}', 'CategoryController@edit')->name("edit-category");
    Route::post('edit-category/{id}', 'CategoryController@update');

    /* Routing  for brands*/
    Route::get('/brands', 'BrandController@display')->name("brands");
    Route::get('add-brands', 'BrandController@create')->name("add-brands");
    Route::post('add-brands', 'BrandController@store');
    Route::get('/brands/delete/{id}', 'BrandController@delete')->name("brand.delete");
    Route::get('edit-brand/{id}', 'BrandController@edit')->name("edit-brand");
    Route::post('edit-brand/{id}', 'BrandController@update');

    /* Routing for suppliers */
    Route::get('/suppliers', 'SuppliersController@create')->name("suppliers");
    Route::post('/suppliers', 'SuppliersController@store');
    Route::get('/suppliers/delete/{id}', 'SuppliersController@delete')->name("suppliers.delete");
    Route::get('edit-suppliers/{id}', 'SuppliersController@edit')->name("edit-suppliers");
    Route::post('edit-suppliers/{id}', 'SuppliersController@update');

    /*Routing for purchase Order*/
    Route::get('/po', 'PurchaseOrderController@create')->name("po");
    Route::post('/po', 'PurchaseOrderController@store');
      Route::get('/po/pdetails/{purchase_requested_item}/{purchase_request_number}', 'PurchaseOrderController@pdetails');
    Route::post('/pod', 'PurchaseOrderController@storeDetails')->name("pod");
    Route::get('/po/delete/{id}', 'PurchaseOrderController@delete')->name("po.delete");
    Route::get('edit-po/{id}', 'PurchaseOrderController@edit')->name("edit-po");
    Route::post('edit-po/{id}', 'PurchaseOrderController@update');
    Route::get('/downloadPDF', 'PurchaseOrderController@downloadPDF')->name("pdf");
    Route::post('/purr', 'PurchaseOrderController@storepur')->name('purr');
    Route::get('/po/details/{purchase_request_number}', 'PurchaseOrderController@details');

    /* Routing for Customers */
    Route::get('/customer', 'CustomersController@create')->name("customer");
    Route::post('/customer', 'CustomersController@store');
    Route::get('/customer/delete/{cid}', 'CustomersController@delete')->name("customer.delete");
    Route::get('edit-customer/{cid}', 'CustomersController@edit')->name("edit-customer");
    Route::post('edit-customer/{cid}', 'CustomersController@update');

    /* Routing for purchase-request */
    Route::get('/purchase-request', 'PurchaseReqController@create')->name("purchase-request");
    Route::post('/purchase-request', 'PurchaseReqController@store');
    Route::get('/purchase-request/delete/{id}', 'PurchaseReqController@delete')->name("purchase-request.delete");
    Route::get('edit-pr/{id}', 'PurchaseReqController@edit')->name("edit-pr");
    Route::post('edit-pr/{id}', 'PurchaseReqController@update');
    Route::post('/purRe', 'PurchaseReqController@storepurR')->name('purRe');
    Route::get('/purchase_request/details/{item_name}', 'PurchaseReqController@details');
    Route::get('/downloadPurchaseReq', 'PurchaseReqController@downloadPDF')->name("downloadPurchaseReq");

    /*Routing for purchases */
    Route::get('/purchases', 'PurchasesController@create')->name("purchases");
    Route::post('/purchases', 'PurchasesController@store');
    Route::get('/purchases/details/{po_code}', 'PurchasesController@details');
    Route::get('/purchases/delete/{id}', 'PurchasesController@delete')->name("purchases.delete");
    Route::post('/purR', 'PurchasesController@storepur')->name('pur');
    Route::get('/purchasesPDF', 'PurchasesController@downloadPDF')->name("purchasesPDF");

    /*Routing for grn */
    Route::get('/grn', 'GrnController@create')->name("grn");
    Route::post('/grn', 'GrnController@store');
    Route::get('/grn/details/{purchase_number}', 'GrnController@details');
    Route::get('edit-grn/{id}', 'GrnController@edit')->name("edit-grn");
    Route::post('edit-grn/{id}', 'GrnController@update');
    Route::get('/grn/delete/{id}', 'GrnController@delete')->name("grn.delete");
    Route::post('/grns', 'GrnController@storegrn')->name('grns');
    Route::get('/grnPDF', 'GrnController@downloadPDF')->name("grnPDF");

    /*Routing for inventory */
    Route::get('/current-inventory', 'InventoryController@create')->name("current-inventory");
    Route::get('/current-inventory/search/{item_brand}/{category_name}','InventoryController@search');

    /*Routing for Invoices */
    Route::get('/sales-invoice', 'InvoiceController@create')->name("sales-invoice");
    Route::post('/sales-invoice', 'InvoiceController@store');
    Route::post('/sales-invoices', 'InvoiceController@storeDetails')->name("sales-invoices");
    Route::post('/invoices', 'InvoiceController@save')->name("invoices");
    Route::get('/sales-invoice/delete/{id}', 'InvoiceController@delete')->name("sales-invoices.delete");
    Route::get('/sales_invoice/details/{item_name}', 'InvoiceController@details');
    Route::get('/invoicePDF', 'InvoiceController@downloadPDF')->name("invoicePDF");
    Route::get('edit-invoice/{id}', 'InvoiceController@edit')->name("edit-invoice");
    Route::post('edit-invoice/{id}', 'InvoiceController@update');

    /*Routing for purchase Return */
    Route::get('/purchase-return', 'PurchaseReturnController@create')->name("purchase-return");
    Route::post('/purchase-return', 'PurchaseReturnController@store');
    Route::get('/purchase-return/details/{po_code}', 'PurchaseReturnController@details');

    /*Routing for sales Return  */
    Route::get('/sales-return','SalesReturnController@create')->name("sales-return");
    Route::post('/sales-return', 'SalesReturnController@store');
    Route::get('/sales-return/details/{po_code}', 'SalesReturnController@details');

    /* Routing for sdn */
    Route::get('/sdn','SdnController@create')->name("sdn");
    Route::post('/sdn', 'SdnController@store');
    Route::get('/sdn/details/{sales_inv_code}', 'SdnController@details');
    Route::get('/sdn/delete/{id}', 'SdnController@delete')->name("sdn.delete");
    Route::post('/sdns', 'SdnController@storesdn')->name('sdns');
    Route::get('/sdnPDF', 'SdnController@downloadPDF')->name("sdnPDF");
    Route::get('edit-sdn/{id}', 'SdnController@edit')->name("edit-sdn");
    Route::post('edit-sdn/{id}', 'SdnController@update');


    /*routing for sales quotation*/
    Route::get('/sales-quotation','SalesQuotationController@create')->name("sales-quotation");
    Route::post('/sales-quotation', 'SalesQuotationController@store');
    Route::post('/sales-quotations', 'SalesQuotationController@storeDetails')->name("sales-quotations");
    Route::get('/sales-quotation/details/{item_name}', 'SalesQuotationController@details');
    Route::post('/quotations', 'SalesQuotationController@save')->name("quotations");
    Route::get('/quotationsPDF', 'SalesQuotationController@downloadPDF')->name("quotationsPDF");
    Route::get('/sales-quotation/delete/{id}', 'SalesQuotationController@delete')->name("sales-quotation.delete");
    Route::get('edit-quotation/{id}', 'SalesQuotationController@edit')->name("edit-quotation");
    Route::post('edit-quotation/{id}', 'SalesQuotationController@update');

    /*Routing for order*/
    Route::get('/orders','OrderController@create')->name("orders");
     Route::get('/guest-orders','OrderController@guestcreate');
    Route::get('guestorder-details/{order_no}', 'OrderController@guestorderDetails')->name("guestorder-details");
    Route::get('orders/{id}', 'OrderController@confirm')->name("o");
      Route::get('order/{id}', 'OrderController@deliver')->name("d");
        Route::get('order-details/{order_no}', 'OrderController@orderDetails')->name("order-details");
    Route::get('/confirmed-orders','OrderController@confirmed')->name("confirmed-orders");
     Route::get('request-for-return', 'OrderController@returnRequest')->name("request-for-return");


   /*Routing for Posts */
    Route::get('/posts','PostsController@create')->name("posts");
    Route::post('/posts','PostsController@store');
    Route::get('/posts/{id}', 'PostsController@delete')->name("posts.delete");
    Route::get('edit-post/{id}', 'PostsController@edit')->name("edit-post");
    Route::post('edit-post/{id}', 'PostsController@update');



});
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

/*Routing for user Registration*/

Route::get('/login-with-zarna', 'RegistrationController@create')->name('login-with-zarna');
Route::post('/login-with-zarna', 'RegistrationController@store');
Route::post('/loginn', 'RegistrationController@getstore')->name("logged");
Route::get('/logoutt', 'RegistrationController@destroy')->name('logoutt');






