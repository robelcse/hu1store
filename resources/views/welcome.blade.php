<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>Welcome to Hu1 Store</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="referrer" content="no-referrer-when-downgrade" />
    <meta name="description" content="The small framework with powerful features">

    <!-- Hu1 App Styles -->
    <link rel="stylesheet" type="text/css" href="{{ url('/public/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/public/assets/css/style.css') }}">

    <!-- Hu1 Store Website Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ url('/public/assets/images/icons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('/public/assets/images/icons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('/public/assets/images/icons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ url('/public/assets/images/icons/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ url('/public/assets/images/icons/safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
</head>
<body>
    <div class="wrapper">
        <header class="header">
            <nav class="navbar navbar-expand-sm hu1-bg navbar-dark fixed-top">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ url('/public/assets/images/logo.png') }}" width="42" alt="hu1-logo" title="Hu1 Store"></a>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <p>Reviewed in</p>
                        </li>
                        <li class="nav-item">
                            <img src="{{ url('/public/assets/images/forbes.png') }}" width="65" height="35">
                        </li>
                        <li class="nav-item">
                            <img src="{{ url('/public/assets/images/business-insider.png') }}" width="70" height="35">
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="container">
                <div class="hu-menu"><a href="{{ url('/') }}">Products</a> | <a href="{{ url('/giftcard/') }}">Gift Cards</a></div>
                <hr>
            </div>
        </header>

        <section class="container">
            <div id="item-data">
                @include('data')
            </div>
            <div class="ajax-load text-center" style="display:none">
                <div class="hu1loader">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </section>


        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h5><a href="{{ url('/') }}">Hu1 Ltd</a></h5>
                        <ul>
                            <li><a href="{{ url('/support/') }}">Support</a></li>
                            <li><a href="{{ url('/userterms/') }}">User Terms</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4 copyright">
                        <p>© <?php echo date("Y") ?> <a href="{{ url('/') }}">Hu1 Ltd</a> | All Rights Reserved.</p>
                    </div>
                    <div class="col-md-4 secured-by">
                        <small>Secured By</small>
                        <img src="{{ url('/public/assets/images/secured-by.png') }}" alt="secured-by" title="Secured By">
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="{{ url('/public/assets/js/jquery.min.js') }}"></script>
    <script src="{{ url('/public/assets/js/popper.min.js') }}"></script>
    <script src="{{ url('/public/assets/js/bootstrap.min.js') }}"></script>


    <script type="text/javascript">
        var page = 1;
        var allItemLoaded = false; //flag will set true when all item loaded screen
        $(window).scroll(function() {
            if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
                page++;
                if(!allItemLoaded){
                    loadMoreData(page);
                }
            }
        });

        function loadMoreData(page) {
            $.ajax( {
                url: '?page=' + page,
                type: "get",
                beforeSend: function() {
                    $('.ajax-load').show();
                }
            })
            .done(function(data) {
                $('.ajax-load').hide();
                if (data.html == "") {
                    allItemLoaded = true;
                    return;
                }
                $("#item-data").append(data.html);
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                //alert('server not responding...');
            });
        }

        isPaymentFormLoaded = false; //set true when payment form loaded
        $(document).on('click', '.modalopen', function() {

            $("#paymentFrm input").prop("disabled", false);
            $("#paymentFrm input[type='submit']").show();//show submit button.
            $("#paymentFrm")[0].reset();
            isPaymentFormLoaded = false;
            /**
             * disable all payment method info input & hide all payment method info div
             * so user can select one
             */
            $('.payment-info-input-wrapper input').prop("disabled", true);
            $('.payment-info-input-wrapper').hide();

            var title = $(this).data('title');
            var image = $(this).data('image');
            var details = $(this).data('details');
            var price = $(this).data('price');
            var regprice = $(this).data('regprice');
            var itemid = $(this).data('itemid');
            var provider = $(this).data('provider');

            $("#modalheading").html(title);
            $("#modaldetails").html(details);
            $("#modalprice").html(price);
            $("#regmodalprice").html(regprice);
            $("#itemid").val(itemid);
            $("#modalimage").attr('src', 'public/assets/images/products/' + image);

        });

        $("#paymentFrm").submit(function (){

            /*
            * if isPaymentFormLoaded is false
            * that mean user just fillup the order form and clicked buy btn Payment form is not displayed yet
            * show we have to show payment form now.
            */
            if(!isPaymentFormLoaded){

                $("#paymentFrm input").prop("disabled", true);
                $('.order-proccess').show();
                setTimeout(function (){

                    $('.order-proccess').hide();
                    $(".payment-info-input-wrapper").hide();
                    $('.payment-info-input-wrapper input').prop("disabled", true);

                    if($("#paymentMethod:checked").val() == "card"){

                        $("#stripediv").show();
                        $('#stripediv input').prop("disabled", false);
                        $("#paymentFrm input[type='submit']").prop("disabled", false);
                        $("#paymentFrm input[type='submit']").val("Submit");

                    }else if($("#paymentMethod:checked").val() == "paypal"){
                        $("#paypaldiv").show();
                        $("#paymentFrm input[type='submit']").hide();
                        $('#paypaldiv input').prop("disabled", false);
                    }
                    isPaymentFormLoaded = true;

                }, 1500);

            }else{

                //Enable all input field for a moment to serialize the form data
                $("#paymentFrm input").prop("disabled", false);

                $.getJSON({
                    url: "./order",
                    method: "post",
                    data: $(this).serialize(),
                    headers: {
                        'X-CSRF-TOKEN': '{{csrf_token()}}'
                    },
                    beforeSend: function(){
                        $("#paymentFrm input").prop("disabled", true);
                        $("#order-result").html("");
                        $('.order-proccess').show();
                    },
                    success: function(resp){
                        if(resp.error == ""){
                            window.location = '{{url("/product-thankyou")}}/'+resp.txId;
                        }else{
                            $("#order-result").html("<div class='alert alert-danger'>"+resp.error+"</div>");
                        }
                    },
                    error: function (){
                        $("#order-result").html("<div class='alert alert-danger'>An error while processing your order!</div>");
                    },
                    complete: function (){
                        $('.payment-info-input-wrapper input').prop("disabled", false);
                        $("#paymentFrm input[type='submit']").prop("disabled", false);
                        $('.order-proccess').hide();
                    }
                });

            }

            return false;
        });
        //handle input card expire date
        $(document).on("keyup", "#cardExpDate", function (){
            var val = $(this).val().replaceAll(/[^0-9]/g, '');
            if(val.length >= 2){
                $(this).val(val.substr(0, 2)+" / "+val.substr(2, 2));
                if($(this).val().length >= 7){
                    $(this).next("input").focus();
                }
            }else{
                $(this).val(val);
            }

        });
    </script>
</body>
</html>
