<div class="shoping__cart__table">
    <table>
        <thead>
            <tr>
                <th class="shoping__product">Sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Tổng</th>
                <th>Lưu</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
            @if(Session::has('Cart') !=null)
                @foreach(Session::get('Cart')->products as $item)
                    @php 
                        $image = App\Helpers\Template::getFirstPicture($item['productInfo']->image);
                    @endphp
                    <tr>
                        <td class="shoping__cart__item">
                            <img style="width: 150px;" src="{{ Storage::disk('public')->url('product/'. $image) }}" alt="">
                            <h5>{{$item['productInfo']->name }}</h5>
                        </td>
                        <td class="shoping__cart__price">
                        {{ number_format($item['productInfo']->price) }},000đ
                        </td> 
                        <td class="shoping__cart__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input id="quantity-item-{{$item['productInfo']->id}}" type="text" value="{{$item['quantity']}}">
                                </div>
                            </div>
                        </td>
                        <td class="shoping__cart__total">
                        {{ number_format($item['price']) }},000đ
                        </td>
                        <td class="shoping__cart__total">
                            <span class="icon_check"onclick="saveQtyItemCart({{$item['productInfo']->id}})" ></span>
                        </td>
                        <td class="shoping__cart__total">
                            <span class="icon_close" onclick="deleteListItemCart({{$item['productInfo']->id}})"></span>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>