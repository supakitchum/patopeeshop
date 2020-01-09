// ************************************************
// Shopping Cart API
// ************************************************

var shoppingCart = (function () {
    // =============================
    // Private methods and propeties
    // =============================
    cart = [];

    // Constructor
    function Item(name, price, count, aid, photo) {
        this.name = name;
        this.price = price;
        this.count = count;
        this.aid = aid;
        this.photo = photo;
    }

    // Save cart
    function saveCart() {
        sessionStorage.setItem('shoppingCart', JSON.stringify(cart));
    }

    // Load cart
    function loadCart() {
        cart = JSON.parse(sessionStorage.getItem('shoppingCart'));
    }

    if (sessionStorage.getItem("shoppingCart") != null) {
        loadCart();
    }


    // =============================
    // Public methods and propeties
    // =============================
    var obj = {};

    // Add to cart
    obj.addItemToCart = function (name, price, count, aid, photo) {
        for (var item in cart) {
            if (cart[item].aid == name) {
                cart[item].count++;
                saveCart();
                return;
            }
        }
        var item = new Item(name, price, count, aid, photo);
        cart.push(item);
        saveCart();
    }
    // Set count from item
    obj.setCountForItem = function (name, count) {
        for (var i in cart) {
            if (cart[i].aid == name) {
                cart[i].count = count;
                saveCart()
                break;
            }
        }
    };
    // Remove item from cart
    obj.removeItemFromCart = function (name) {
        for (var item in cart) {
            if (cart[item].aid == name) {
                cart[item].count--;
                if (cart[item].count === 0) {
                    cart.splice(item, 1);
                }
                break;
            }
        }
        saveCart();
    }

    // Remove all items from cart
    obj.removeItemFromCartAll = function (name) {
        for (var item in cart) {
            if (cart[item].aid == name) {
                cart.splice(item, 1);
                break;
            }
        }
        saveCart();
    }

    // Clear cart
    obj.clearCart = function () {
        cart = [];
        saveCart();
    }

    // Count cart
    obj.totalCount = function () {
        var totalCount = 0;
        for (var item in cart) {
            totalCount += cart[item].count;
        }
        return totalCount;
    }

    // Total cart
    obj.totalCart = function () {
        var totalCart = 0;
        for (var item in cart) {
            totalCart += cart[item].price * cart[item].count;
        }
        return Number(totalCart.toFixed(2));
    }

    // List cart
    obj.listCart = function () {
        var cartCopy = [];
        for (i in cart) {
            item = cart[i];
            itemCopy = {};
            for (p in item) {
                itemCopy[p] = item[p];

            }
            itemCopy.total = Number(item.price * item.count).toFixed(2);
            cartCopy.push(itemCopy)
        }
        return cartCopy;
    }

    // cart : Array
    // Item : Object/Class
    // addItemToCart : Function
    // removeItemFromCart : Function
    // removeItemFromCartAll : Function
    // clearCart : Function
    // countCart : Function
    // totalCart : Function
    // listCart : Function
    // saveCart : Function
    // loadCart : Function
    return obj;
})();


// *****************************************
// Triggers / Events
// *****************************************
// Add item
function add_item() {
    var size = $('#size option:selected').text();
    var color = $('#color option:selected').text();
    var name = $('#name_product').html();
    var photo = $('#photo').val();
    name = `${name} (${color})(${size})`;
    var amount = Number($("#amount").val())
    var price = Number($("#price").val())
    var aid = $("#aid").val()
    if (aid === '') {
        Swal.fire(
            'กรุณาเลือกสินค้า',
            '',
            'warning'
        );
    } else {
        $("#total").html(amount * price)
        shoppingCart.addItemToCart(name, price, amount, aid, photo);
        Swal.fire(
            'เพิ่มสินค้าสำเร็จ',
            'เพิ่ม ' + name + ' ลงรถเข็นของคุณเรียบร้อยแล้ว',
            'success'
        )
        displayCart();
    }
}

$('.add-to-cart').click(function (event) {
    event.preventDefault();
    var size = $('#size option:selected').text();
    var color = $('#color option:selected').text();
    var name = $('#name_product').html();
    var photo = $('#photo').val();
    name = `${name} (${color})(${size})`;
    let amount = Number($("#amount").val())
    let price = Number($("#price").val())
    let aid = $("#aid").val()
    $("#total").html(amount * price)
    shoppingCart.addItemToCart(name, price, amount, aid, photo);
    Swal.fire(
        'เพิ่มสินค้าสำเร็จ',
        'เพิ่ม ' + name + ' ลงรถเข็นของคุณเรียบร้อยแล้ว',
        'success'
    )
    displayCart();
});

// Clear items
$('.clear-cart').click(function () {
    shoppingCart.clearCart();
    displayCart();
});


function displayCart() {
    var cartArray = shoppingCart.listCart();
    var output = "";
    var output2 = "";
    var output3 = "";
    if (cartArray.length > 0){
        for (var i in cartArray) {
            output += "<li class='woocommerce-mini-cart-item mini_cart_item'>" +
                "<button style='background-color: transparent !important;margin-top: -15px;color: black !important;' class='remove' onclick='deleteItem(" + cartArray[i].aid + ")' aria-label='Remove this item' data-product_id='65' data-product_sku=''>×</button>" +
                "<a href='single-product-sidebar.html'>" +
                "<img src='"+ cartArray[i].photo +"' class='attachment-shop_thumbnail size-shop_thumbnail wp-post-image' alt=''>"+ cartArray[i].name +
                "</a>" +
                "<span class='quantity'>"+ cartArray[i].count +" ×" +
                "<span class='woocommerce-Price-amount amount'>" +
                cartArray[i].price + "<span class='woocommerce-Price-currencySymbol'>บาท</span></span>" +
                "</span>" +
                "</li>";
            output2 += "<li>"
                + "<div class='thumb'>"
                + "<img src='" + cartArray[i].photo + "' alt='" + cartArray[i].name + "'>"
                + "</div>"
                + "<div class='info'>"
                + "<h4 class='product-name'><a href='#'>" + cartArray[i].name + "</a></h4>"
                + "<span class='price'>" + cartArray[i].count + "x" + cartArray[i].price + "</span>"
                + "<button style='border: none;background-color: transparent;' class='remove-item' onclick='deleteItem(" + cartArray[i].aid + ")' data-name='" + cartArray[i].aid + "'><i class='fa fa-close'></i></button>"
                + "</div>"
                + "</li>";
            output3 += '<tr class="cart_item">' +
                "<input type='hidden' value='" + cartArray[i].aid + "' name='aid[]' >" +
                '<td class="product-name">' +
                "<input type='hidden' value='" + cartArray[i].count + "' name='amount[]' >" +
                '<strong class="product-quantity">'+cartArray[i].count+'x </strong>' + cartArray[i].name +
                '</td>' +
                '<td class="product-total">' +
                '<span class="woocommerce-Price-amount amount">' +
                (cartArray[i].count * cartArray[i].price) +'<span class="woocommerce-Price-currencySymbol"> บาท</span></span>' +
                '</td>' +
                '</tr>';
        }
    } else{
        output = "<li class='woocommerce-mini-cart-item mini_cart_item text-center w-100vw-sm'>ไม่มีสินค้าในตะกร้า</li>";
    }
    $('.show-cart').html(output);
    if ($("#order-detail")) {
        // output3 += '<tr>'
        //     + '<td class="product-name">ค่าจัดส่ง</td>'
        //     + '<td class="total"><span class="price">ฟรี</span></td>'
        //     + '</tr>'
        //     + '<tr class="order-total">'
        //     + '<td class="subtotal">ราคารวม</td>'
        //     + '<td class="total">' + shoppingCart.totalCart() + ' บาท</td>'
        //     + '</tr>';
        $("#order-detail").html(output3);
    }
    if ($('.list-product')) {
        $('.list-product').html(output2);
    }
    $('.total-cart').html(shoppingCart.totalCart());
    $('.total-count').html(shoppingCart.totalCount());
}

// Delete item button

$('.show-cart').on("click", ".delete-item", function (event) {
    var name = $(this).data('name')
    shoppingCart.removeItemFromCartAll(name);
    displayCart();
})

function deleteItem(name) {
    shoppingCart.removeItemFromCartAll(name);
    displayCart();
}


// -1
$('.show-cart').on("click", ".minus-item", function (event) {
    var name = $(this).data('name')
    shoppingCart.removeItemFromCart(name);
    displayCart();
})
// +1
$('.show-cart').on("click", ".plus-item", function (event) {
    var name = $(this).data('name')
    shoppingCart.addItemToCart(name);
    displayCart();
})

// Item count input
$('.show-cart').on("change", ".item-count", function (event) {
    var name = $(this).data('name');
    var count = Number($(this).val());
    console.log(count);
    shoppingCart.setCountForItem(name, count);
    displayCart();
});

displayCart();
