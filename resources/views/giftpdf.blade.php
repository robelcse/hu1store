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
    <link rel="stylesheet" type="text/css" href="{{ url('/public/assets/css/style.css') }}">

    <!-- Hu1 Store Website Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ url('/public/assets/images/icons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('/public/assets/images/icons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('/public/assets/images/icons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ url('/public/assets/images/icons/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ url('/public/assets/images/icons/safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <style>
        html, body{
            width: 600px;
            height: 380px;
        }
        .hu1-card{
            position: relative;
        }
        @page{
            size: 650px 430px;
            margin: 25px 25px 0px 25px;
        }
    </style>
</head>
<body>
    <div class="hu1-card m-0">
        <img src="{{ url('/public/assets/images/gift-card2.png') }}" alt="gift-card" title="Hu1 Gift Card" style="width:100%;background: #{{$payment -> theme}};">
        <div class="centered" style="color: #ffffff">
            <h5>Hey!</h5>
            <p>You got a gift card worth {{$payment -> amount}} {{strtoupper($payment -> currency)}}<br>Go to Hu1.store and redeem your<br>gift card.</p>
            <strong>Gift Card No {{$payment -> gift_no}}</strong>
        </div>
    </div>
</body>
</html>
