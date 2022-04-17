function AddCart(id) {
    $.ajax({
        url: 'addCart/' + id,
        type: 'GET',
    }).done(function (respone) {
        renderCart(respone);
        alertify.success('Đã thêm sản phẩm vào giỏ hàng!');
    });
}
function deleteItemCart(id) {
    $.ajax({
        url: 'deleteItemCart/' + id,
        type: 'GET',
    }).done(function (respone) {
        renderCart(respone);
        alertify.success('Đã xóa sản phẩm khỏi giỏ hàng!');
    });
};

function addCartFromDetail(id) {
    $.ajax({
        url: 'addCartFromDetail/' + id + '/' + $("#quantity-item-" + id).val(),
        type: 'GET',
    }).done(function (respone) {
        renderCart(respone);
        alertify.success('Đã thêm sản phẩm vào giỏ hàng!');
    });
};

function renderCart(respone) {
    $("#change-item-cart").empty();
    $("#change-item-cart").html(respone);
    $('#total-quantity-show').text($('#total-quantity-cart').val());

}

function deleteListItemCart(id) {
    $.ajax({
        url: 'deleteListCart/' + id,
        type: 'GET',
    }).done(function (respone) {
        renderListCart(respone);
        alertify.success('Đã xóa sản phẩm khỏi giỏ hàng!');
    });
};

function saveQtyItemCart(id) {
    $.ajax({
        url: 'saveQtyItemCart/' + id + '/' + $("#quantity-item-" + id).val(),
        type: 'GET',
    }).done(function (respone) {
        renderListCart(respone);
        alertify.success('Đã cập nhật sản phẩm!');
    });
};

function renderListCart(respone) {
    $("#list-cart").empty();
    $("#list-cart").html(respone);
    var proQty = $('.pro-qty');
    proQty.prepend('<span class="dec qtybtn">-</span>');
    proQty.append('<span class="inc qtybtn">+</span>');
    proQty.on('click', '.qtybtn', function () {
        var $button = $(this);
        var oldValue = $button.parent().find('input').val();
        if ($button.hasClass('inc')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        $button.parent().find('input').val(newVal);
    });
}