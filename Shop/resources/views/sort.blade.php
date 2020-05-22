
<div class="product-listing">
    <div class="inner-listing">
        <div class="row">
            @foreach($i as $items)
                <div class="col-md-4 col-6 item-width mb-30">
                    <div class="product-item">
                        <div class="" style=""> <a href="{{route('product-details',$items->item_code) }}"> <img src="{{$items->item_image}}" style="height:250px;" alt="Stylexpo"> </a>
                            <div class="product-detail-inner">
                                <div class="detail-inner-left align-center">
                                    <ul>
                                        <li class="pro-cart-icon">
                                            <form method="get" action="{{route('cart',$items->item_code)}}">
                                                {{--<input type="hidden" value="{{$items->item_code}}">--}}
                                             
                                                 <input type="hidden" value="{{$items->item_code}}">
                                                @if($items->quantity>0)
                                                <button title="Add to Cart"><span></span>Add to Cart</button>
                                                   @endif
                                             
                                                 @if($items->quantity==0)
                                                    <span style="color: #ff3030; font-weight: bold;background-color: white">Out Of Stock</span>
                                                @endif
                                            </form>
                                        </li>
                                        {{--<li class="pro-wishlist-icon "><a href="wishlist.html" title="Wishlist"></a></li>--}}
                                        {{--<li class="pro-compare-icon"><a href="compare.html" title="Compare"></a></li>--}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="product-item-details">
                            <div class="product-item-name"> <a href="{{route('product-details',$items->item_code) }}">{{$items->item_description}}</a> </div>
                            <!--<div class="price-box"> <span class="price">PKR {{$items->item_current_selling_price}}</span></div>-->
                             <div class="price-box"> <span class="price">PKR {{$items->new_price}}</span></div>
                        </div>
                    </div>
                </div>
            @endforeach


</div>
</div>
    <div class="row">
        <div class="col-12">
            <div class="pagination-bar" id="pagination">
                <ul>
                     
                    {{$i->links()}}
                    {{--<li><a href="#"><i class="fa fa-angle-left"></i></a></li>--}}
                    {{--<li class="active"><a href="#">1</a></li>--}}
                    {{--<li><a href="#">2</a></li>--}}
                    {{--<li><a href="#">3</a></li>--}}
                    {{--<li><a href="#"><i class="fa fa-angle-right"></i></a></li>--}}
                </ul>
            </div>
        </div>
    </div>

    </div>

<script>
document.getElementById('pagination').onchange = function() {
$.ajax({
url: '/shop' ,
type: "POST",
data: new FormData(this),
contentType: false,
// cache: false,
processData: false,

success: function (response) {
$("#list").hide();
$("#targetLayer").html(response);
}, error: function (jqXHR, textStatus, errorThrown) {
$("#targetLayer").html(errorThrown + textStatus);
}
});
};

</script>