<!--form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
    <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="business" value="{{ $cart->count() > 0 ? $cart[0]->email : ""}}">
    <input type="hidden" name="lc" value="BM">
    <?php $count=0; ?>

    @foreach($cart as $c)
        <?php $count++ ?>
        <input type="hidden" name="item_name_{{$count}}" value="{{$c->item_name}}">
        <input type="hidden" name="item_number_{{$count}}" value="{{$c->item_qty}}">
        <input type="hidden" name="amount_{{$count}}"  value="{{$c->new_price}}">
    @endforeach
    <input type="hidden" name="currency_code" value="USD">
    <input type="hidden" name="button_subtype" value="services">
    <input type="hidden" name="no_note" value="0">
    <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHostedGuest">
    <button class="btn btn-color right-side">Paypal</button>
</form-->
