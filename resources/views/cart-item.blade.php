@if(Session::has("Cart") !=null)
<div class="select-items">
    <table>
        <tbody>
            @foreach(Session::get("Cart")->products as $item)
            @php 
                $image = App\Helpers\Template::getFirstPicture($item['productInfo']->image);
            @endphp
            <tr>
                <td class="si-pic"><img src="{{ Storage::disk('public')->url('product/'. $image) }}" alt=""></td>
                <td class="si-text">
                    <div class="product-selected">
                        <p>{{ number_format($item['productInfo']->price) }},000đ x {{$item['quantity']}}</p>
                        <h6>{{$item['productInfo']->name }}</h6>
                    </div>
                </td>
                <td class="si-close">
                    <i class="fa fa-times" onclick="deleteItemCart({{$item['productInfo']->id}})"></i>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="select-total">
    <span>tổng:</span>
    <h5>{{  number_format(Session::get("Cart")->totalPrice) }},000đ</h5>
    <input type="number" hidden id="total-quantity-cart" value="{{Session::get('Cart')->totalQuantity}}">
</div>
@endif