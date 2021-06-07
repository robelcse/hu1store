<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>Thank You For Purchase Gift - Hu1 Store</title>
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
            <div class="thank-you">
                <h3>Thank you</h3>
                <hr>
                <strong>Payment Receipt: #{{$payment -> id}}</strong>
                <div class="row">
                    <div class="col-md-6">
                        <strong>Date:</strong> <span>{{date("d M Y", strtotime($payment -> datetime))}}</span><br>
                        <strong>Buyer:</strong> <span>{{$payment -> name}}</span><br>
                        <strong>Note:</strong> <span>{{$payment -> message}}</span>
                    </div>
                    <div class="col-md-6">
                        <strong>Currency:</strong> <span>{{strtoupper($payment -> currency)}}</span><br>
                        <strong>Amount:</strong> <span>{{$payment -> amount}}.00</span><br>
                        <strong>Status:</strong> <span>{{ucfirst($payment -> tx_status)}}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="hu1-card">
                            <img src="{{ url('/public/assets/images/gift-card2.png') }}" alt="gift-card" title="Hu1 Gift Card" class="img-responsive" style="width:100%;background: #{{$payment -> theme}};">
                            <div class="centered" style="color: #ffffff">
                                <h5>Hey!</h5>
                                <p>You got a gift card worth {{$payment -> amount}} {{strtoupper($payment -> currency)}}<br>Go to Hu1.store and redeem your<br>gift card. Check your card <a id="checkButton"><u>balance</u></a>.</p>
                                <strong>Gift Card No {{$payment -> gift_no}}</strong>
                            </div>
                        </div>
                    </div>
                </div>
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

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <a href="{{url()->full()}}?dp">Save this gift</a>&nbsp;OR&nbsp;<a href="#" onclick="$('#sendemail').toggle(); return false;">Email this gift</a>
                        <form id="sendemail" class="mt-3" style="display:none;">
                            <div class="form-group">
                                <label for="emai">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placcholder="Enter email address" required>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Submit" class="btn btn-primary">
                            </div>
                            <div id="send-result"></div>
                            <div class="sending text-center" style="display:none">
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
                        <p>Â© <?php echo date("Y") ?> <a href="{{ url('/') }}">Hu1 Ltd</a> | All Rights Reserved.</p>
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
        $(document).ready(function() {
            $("#giftButton").click(function() {
                $("#giftForm").toggle();
            });
            $("#checkButton").click(function() {
                $("#checkForm").toggle();
                $('input[name=cardno]').focus();
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
            $("#sendemail").submit(function (){
                $.getJSON({
                    url: "{{url()->full()}}?email="+$("#email").val(),
                    beforeSend: function (){
                        $("#send-result").html("");
                        $('.sending').show();
                        $("#sendemail input").prop("disabled", true);
                    },
                    success: function (resp){
                        if(resp.success == "true"){
                            $("#send-result").html("<div class='alert alert-success'>Gift card sent to "+$("#email").val()+"</div>");
                        }else{
                            $("#send-result").html("<div class='alert alert-danger'>An error while sending email!</div>");
                        }
                    },
                    error: function (){
                        $("#send-result").html("<div class='alert alert-danger'>An error while sending email!</div>");
                    },
                    complete: function (){
                        $('.sending').hide();
                        $("#sendemail input").prop("disabled", false);
                    }
                });
                return false;
            });
        });
    </script>
</body>
</html>