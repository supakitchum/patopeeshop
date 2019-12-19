<script type="text/javascript" src="{{ asset('js/frontend/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/frontend/tether.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/frontend/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/frontend/jquery-migrate.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/frontend/hidemaxlistitem.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/frontend/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/frontend/hidemaxlistitem.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/frontend/jquery.easing.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/frontend/scrollup.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/frontend/jquery.waypoints.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/frontend/waypoints-sticky.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/frontend/pace.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/frontend/slick.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/frontend/scripts.js') }}"></script>
<script src="{{ asset('js/frontend/sweetalert2.all.js') }}" type="text/javascript"></script>
<script src="{{ asset("js/cart.js") }}" type="text/javascript"></script>
<script>
    let details = [];
    let detail = [];
    var size = $('#size');
    var color = $('#color');
    var amount = $('#amount');
    var price = $('#price');
    var quality = 0;
    function calculate() {
        let amount = $("#amount").val()
        let price = $("#price").val()
        if (amount > quality){
            $("#amount").val(quality)
            amount = quality;
        }
        $("#total").html(amount * price)
    }
    $(document).ready(function () {
        size.on('change',function () {
            var id = $('#size option:selected').val()
            detail = details.filter(function(obj) {
                return obj.size_id == id;
            });
            color.html('');
            amount.attr('disabled',true);
            amount.val();
            $('#total').html('0')
            price.val(0)
            color.append($("<option>").attr('value',0).text('โปรดเลือกสี'));
            $(detail).each(function() {
                color.attr('disabled',false);
                color.append($("<option>").attr('value',this.color_id).text(this.color_name));
            });
            color.trigger("chosen:updated")
        })
        color.on('change',function () {
            var id = $('#color option:selected').val()
            detail = details.filter(function(obj) {
                return obj.color_id == id;
            });
            amount.attr('disabled',false);
            amount.val(1);
            quality = detail[0].quality;
            $('#quality').html(quality);
            $('#amount').attr('max',quality);
            $('#aid').val(detail[0].id)
            $('#total').html(detail[0].price)
            price.val(detail[0].price)
        })
    });
    $(document).on('show.bs.modal', '.modal', function (e) {
        var title = $(e.relatedTarget).data('title')
        $("#photo").val($(e.relatedTarget).data('photo'))
        $("#total").html(0)
        $("#color").attr('disabled',true);
        $("#color").html('')
        $("#color").trigger("chosen:updated");
        $("#amount").attr('disabled',true);
        $('#name_product').html(title);
        $("#amount").val(0)
        $("#price").val(0)
        $.get( "/api/product/"+ $(e.relatedTarget).data('product-id'), function( data ) {
            details = data;
        });
        $.get("/api/product/" + $(e.relatedTarget).data('product-id')+'/true',function (sizes) {
            size.html('');
            size.append($("<option>").attr('value',0).text('โปรดเลือกขนาด'));
            $(sizes).each(function() {
                size.append($("<option>").attr('value',this.size_id).text(this.size_name));
            });
            size.trigger("chosen:updated");
        })
    });
</script>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v5.0&appId=260246377791645&autoLogAppEvents=1"></script>
