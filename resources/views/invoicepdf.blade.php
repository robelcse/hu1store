<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>Thank You For Purchase - Hu1 Store</title>
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
    <section class="container printdata">

        <div class="row">
            <div class="col-md-12" style="flex: 0 0 100%; max-width: 100%;">
                <div style="height: 120px;">
                    <div class="col-md-3" style="float: left;flex: 0 0 25%; max-width: 25%;">
                        <img width="80" src="{{ url('/public/assets/images/logo.png') }}" class="rounded" alt="hu1-store" title="Hu1 Store">
                    </div>
                    <div class="col-md-9" style="float: right;flex: 0 0 75%;max-width: 75%;">
                        <p>Hu1, J&amp;M Trading (ABN: 96632935973)
                        <br>S2B/29 McRitchie CCT, Nicholls, ACT 2913, Australia
                        <br>Support: support@hu1.store (Mon - Fri, 8am - 8pm)</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                
                <h2>Thank you!</h2>
                <div class="alert alert-success">
                    <p>Dear <strong>{{$payment -> name}}</strong>,</p>
                    <p>You have place order successfully. Your order ID #{{$payment -> order}}</p>
                </div>
                <h3>Purchase Receipt:</h3>
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <td>Invoice ID:</td>
                            <td>#{{$payment -> order}}</td>
                        </tr>
                        <tr>
                            <td>Transaction time:</td>
                            <td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $payment->datetime)->format('h:iA F, d Y') }}</td>
                        </tr>
                        <tr>
                            <td>Payment Status:</td>
                            <td style="text-transform: capitalize;">{{$payment -> tx_status}}</td>
                        </tr>
                        <tr>
                            <td>Payment Method:</td>
                            <td style="text-transform: capitalize;">{{$payment -> payment_method}}</td>
                        </tr>
                        <tr>
                            <td>Card Name:</td>
                            <td style="text-transform: capitalize;">{{$payment -> data -> creditCard -> cardType}}</td>
                        </tr>
                        <tr>
                            <td>Card Number:</td>
                            <td>**************{{$payment -> data -> creditCard -> cardLastFourDigits}}</td>
                        </tr>
                        <tr>
                            <td>Amount:</td>
                            <td>${{$payment -> amount}}</td>
                        </tr>
                        <tr>
                            <td>Currency:</td>
                            <td style="text-transform: uppercase;">{{$payment -> currency}}</td>
                        </tr>
                        <tr>
                            <td>Country:</td>
                            <td>{{$payment -> country}}</td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>

    </section>
</body>
</html>