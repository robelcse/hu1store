<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>Buy Gift Card - Hu1 Store</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="referrer" content="no-referrer-when-downgrade" />    
    <meta name="description" content="The small framework with powerful features">

    <!-- Hu1 App Styles -->
    <link rel="stylesheet" type="text/css" href="{{ url('/public/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/public/assets/css/font-awesome.min.css') }}">
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
            <div class="gift-cards">
                <a id="giftButton"><strong>Buy Gift Card <i class="fa fa-arrow-circle-down"></i></strong></a>
                <form id="giftForm" class="form-horizontal" method="post" action="">
                    <hr>
                    <div class="form-group row">
                        <label class="control-label col-sm-3" for="amount">Enter the amount :</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">$</div>
                                </div>
                                <input type="number" class="form-control" id="amount" placeholder="Enter the amount" name="amount" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-3" for="theme">Select a theme :</label>
                        <div class="col-sm-9">
                            <div class="hu1-radio">
                                <input type="radio" name="theme" id="red" value="7f7f7f" <?php if (isset($_POST['theme']) == '7f7f7f') { echo "checked='checked'"; } ?>>
                                <label for="red"><span class="red"></span></label>
                                <input type="radio" name="theme" id="green" value="ed1c24" <?php if (isset($_POST['theme']) == 'ed1c24') { echo "checked='checked'"; } ?>>
                                <label for="green"><span class="green"></span></label>
                                <input type="radio" name="theme" id="gray" value="22b14c" <?php if (isset($_POST['theme']) == '22b14c') { echo "checked='checked'"; } ?>>
                                <label for="gray"><span class="gray"></span></label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-3" for="message">Send a message :</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="message" placeholder="Enter the message" name="message" required></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-3" for="agree"></label>
                        <div class="col-sm-9">
                            <div class="checkbox">
                                <label><input type="checkbox" id="agreeterms" value="" required="required"> I read and agreed the site <a href="userterms.php">User Terms</a></label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-3" for="submit"></label>
                        <div class="col-sm-9">
                            <button type="submit" class="btn btn-primary" id="verify" name="save">BUY</button>
                        </div>
                    </div>

                </form>
                <br>

                <a id="checkButton"><strong>Check Gift Card Balance  <i class="fa fa-arrow-circle-down"></i></strong></a>

                <form id="checkForm" class="form-horizontal" action="" method="post" style="display:none;">
                    <hr>
                    <div class="form-group row">
                        <label class="control-label col-sm-3" for="cardno">Enter gift card number :</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="cardno" placeholder="Enter Gift Card Number" name="cardno">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-3" for="submit"></label>
                        <div class="col-sm-9">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                    <div id="check-result"></div>
                    <div class="checking-loader text-center" style="display:none">
                        <div class="hu1loader">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </form>
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

    <div class="modal fade" id="payment-modal">

        <div class="modal-dialog modal-dialog-centered modal">

            <div class="modal-content">

                <div class="modal-header">
                    <h6 class="modal-title">Buy Gift Card</h6>
                    <a href="#" data-dismiss="modal">&times;</a>
                </div>

                <div class="modal-body">
                    <form action="" id="payment-from">
                        <div class="form-group">
                            <div class="d-flex justify-content-between align-items-end">
                                <label for="nameOnCard">Name On Card</label>
                                <img src="{{ url('/public/assets/images/accepted.png') }}">
                            </div>
                            <input type="text" id="nameOnCard" name="nameOnCard" class="form-control" placeholder="Enter name on card" required>
                        </div>
                        <div class="input-type-card form-group">
                            <input type="number" id="cardNumber" name="cardNumber" class="form-control" placeholder="Card Number" required>
                            <input type="text" id="cardExpDate" name="cardExpDate" class="form-control" placeholder="MM / YY" required>
                            <input type="number" id="cardvc" name="cardvc" class="form-control" placeholder="CVC" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Submit" class="btn btn-primary">
                        </div>
                        <div id="order-result"></div>
                    </form>
                    <div class="order-proccess text-center" style="display:none">
                        <div class="hu1loader">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <script src="{{ url('/public/assets/js/jquery.min.js') }}"></script>
    <script src="{{ url('/public/assets/js/popper.min.js') }}"></script>
    <script src="{{ url('/public/assets/js/bootstrap.min.js') }}"></script>

    
    <script type="text/javascript">
        $(document).ready(function() {
            $("#giftButton").click(function() {
                $("#giftForm").toggle();
            });
            $("#checkButton").click(function() {
                $("#checkForm").toggle();
                $('input[name=cardno]').focus();
            });
            $("#giftForm").submit(function (){
                if($("input[name='theme']:checked").length == 0){
                    alert('Please select a theme.');
                }else{
                    $("#payment-from").hide();
                    $(".order-proccess").show();
                    $("#payment-modal").modal();
                    setTimeout(function (){
                        $(".order-proccess").hide();
                        $("#payment-from").show();
                    }, 1500);
                }
                return false;
            });
            $("#payment-from").submit(function (){
                $.getJSON({
                    url:"",
                    method: "post",
                    data: {
                        "amount": $("input[name='amount']").val(),
                        "theme": $("input[name='theme']:checked").val(),
                        "message": $("textarea[name='message']").val(),
                        "nameOnCard": $("input[name='nameOnCard']").val(),
                        "cardNumber": $("input[name='cardNumber']").val(),
                        "cardExpDate": $("input[name='cardExpDate']").val(),
                        "cardvc": $("input[name='cardvc']").val(),
                        "paymentMethod": "card" //for future use if we use multiple gateway
                    },
                    headers: {
                        'X-CSRF-TOKEN': '{{csrf_token()}}'
                    },
                    beforeSend: function(){
                        $("#payment-from input").prop("disabled", true);
                        $("#order-result").html("");
                        $(".order-proccess").show();
                    },
                    success: function(resp){
                        if(resp.error == ""){
                            window.location = '{{url("/thankyou")}}/'+resp.txId;
                        }else{
                            $("#order-result").html("<div class='alert alert-danger'>"+resp.error+"</div>");
                        }
                    },
                    error: function (){
                        $("#order-result").html("<div class='alert alert-danger'>An error while processing your gift!</div>");
                    },
                    complete: function (){
                        $("#payment-from input").prop("disabled", false);
                        $(".order-proccess").hide();
                    }
                });
                return false;
            });
            $("#checkForm").submit(function (){
                $.getJSON({
                    url:"{{url('/check-giftcard')}}/"+$("input[name='cardno']").val(),
                    beforeSend: function(){
                        $("#checkForm input").prop("disabled", true);
                        $("#check-result").html("");
                        $(".checking-loader").show();
                    },
                    success: function(resp){
                        if(resp.error == ""){
                            $("#check-result").html("<div class='alert alert-success'>Your Gift card balance is $"+resp.balance+"</div>");
                        }else{
                            $("#check-result").html("<div class='alert alert-danger'>"+resp.error+"</div>");
                        }
                    },
                    error: function (){
                        $("#check-result").html("<div class='alert alert-danger'>An error while processing your request!</div>");
                    },
                    complete: function (){
                        $("#checkForm input").prop("disabled", false);
                        $(".checking-loader").hide();
                    }
                });
                return false;
            });
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
        });
    </script>
</body>
</html>
