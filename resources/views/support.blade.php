<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>Support - Hu1 Store</title>
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
            <div class="support">
                <h2>Support</h2>
                <hr>
                <p>Hu1 Support team is open to assist you 24/7<br>For any issues, please contact:</p>
                <address>
                    <strong>Email:</strong> <a href="mailto:support@hu1.store">support@hu1.store</a><br>
                    <strong>Call:</strong> <span>+61468 540 410, +61423 061 364</span>
                    <p>Or write to us:</p>
                    <p>Hu1, J&M Trading (ABN: 96632935973)<br>S2B/29 McRitchie CCT, Nicholls, ACT 2913, Australia</p>
                </address>
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
        $(document).ready(function() {
            $("#giftButton").click(function() {
                $("#giftForm").toggle();
            });
            $("#checkButton").click(function() {
                $("#checkForm").toggle();
                $('input[name=cardno]').focus();
            });
        });
    </script>
</body>
</html>
