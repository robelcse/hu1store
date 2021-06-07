<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
</head>
<body>
    <div style="margin-bottom:20px;">{{$payment -> message}}</div>
    <div style="position:relative;width:600px;height:380px;background-color:#{{$payment -> theme}};background-image:url({{ url('/public/assets/images/gift-card2.png') }});background-size:cover;border-radius: 20px;">
        <div style="color: #ffffff;width: 280px;padding: 130px 0px 0px 240px;font-size: 16px;font-weight: bold;">
            <h5>Hey!</h5>
            <p>You got a gift card worth {{$payment -> amount}} {{strtoupper($payment -> currency)}}<br>Go to Hu1.store and redeem your<br>gift card.</p>
            <strong>Gift Card No {{$payment -> gift_no}}</strong>
        </div>
    </div>
</body>
</html>