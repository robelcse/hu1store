<div class="row">
	@foreach ($items as $item)
	<div class="col-md-3">
		<a data-provider="{{ $item->provider }}" data-itemid="{{$item->id}}" data-price="{{ $item->price }}" data-regprice="{{ $item->reg_price }}" data-details="{{ $item->details }}" data-title="{{ $item->title }}" data-image="{{ $item->image }}" data-toggle="modal" data-target="#myModal" class="modalopen " href="#!">
			<div class="card text-center">
				<img class="card-img-top" src="{{ url('/') }}/public/assets/images/products/{{ $item->image }}" alt="Card image" style="width:100%">
				<div class="card-body">
					<h4 class="card-title">{{ $item->title }}</h4>
					<strong><del style="color: #d61d1d;">${{ $item->reg_price }}.00</del> <span style="color: #7171dc;">${{ $item->price }}.00</span></strong>
				</div>
			</div>
		</a>
	</div>
	@endforeach
</div>

<div class="modal" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"><span id="modalheading"></span></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <div class="form-group" style="background: #741fa2;">
                            <img src="" class="img-fluid" alt="" id="modalimage">
                        </div>
                        <label for=""><b>Price: <del style="color: #d61d1d;">$<span id="regmodalprice"></span>.00</del> <span style="color: #7171dc;">$<span id="modalprice"></span>.00</span></b></label><br>
                        <label for=""><b>Details: </b></label>
                        <p id="modaldetails"></p>
                    </div>
                    <div class="col-md-8">
                        <form action="" method="post" id="paymentFrm">
                            <strong>Delivery Address:</strong>
                            <hr>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="fullname">Full Name</label>
                                    <input type="text" class="form-control" required name="fullname" id="fullname" placeholder="Your Full Name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" required name="email" id="email" placeholder="Your Valid Email Address">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="address1">Address Line 1</label>
                                    <input type="text" class="form-control" required name="addressLine1" id="addressLine1" placeholder="Enter Your Address 1">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="address2">Address Line 2</label>
                                    <input type="text" class="form-control" name="addressLine2" id="addressLine2" placeholder="Enter Your Address 2 (Optional)">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="country">Country</label>
                                    <input type="text" class="form-control" required name="country" id="country" placeholder="Enter Your Country">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="state">State</label>
                                    <input type="text" class="form-control" required name="state" id="state" placeholder="Enter Your State">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control" required name="city" id="city" placeholder="Enter Your City">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="zip">Zip</label>
                                    <input type="text" class="form-control" required name="zip" id="zip" placeholder="Enter Your Zip">
                                </div>
                            </div>

                            <!-- <div class="form-group">
                                <label for=""><b>Enter Receiver's Email</b></label>
                                <input required name="receiver_email" type="email" class="form-control" id="email">
                            </div> -->

                            <div class="form-group">
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        Pay by:
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" id="paymentMethod" name="paymentMethod" value="card" required>Card
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" id="paymentMethod" name="paymentMethod" value="paypal" required>PayPal
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="agreeterms" value="" required> I read and agreed site <a href="userterms.php">terms of use</a>
                                </label>
                            </div>

                            <div id="stripediv" class="payment-info-input-wrapper">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <h4><span class="float-right"><img src="{{ url('/public/assets/images/accepted.png') }}"></span></h4>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="hidden" name="itemid" id="itemid">
                                        <div class="form-group">

                                            <label for="nameOnCard">Name On Card</label>
                                            <input type="text" id="nameOnCard" name="nameOnCard" class="form-control" placeholder="Enter name on card" required>

                                        </div>

                                        <div class="input-type-card form-group">

                                            <input type="number" id="cardNumber" name="cardNumber" class="form-control" placeholder="Card Number" required>
                                            <input type="text" id="cardExpDate" name="cardExpDate" class="form-control" placeholder="MM / YY" required>
                                            <input type="number" id="cardvc" name="cardvc" class="form-control" placeholder="CVC" required>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div id="paypaldiv" class="payment-info-input-wrapper">
                                <img src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/checkout-logo-large.png" alt="Check out with PayPal" />
                            </div>

                            <div class="form-group">
                                <input type="submit" value="Buy" class="btn btn-primary">
                            </div>

                        </form>

                        <div id="order-result"></div>

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
    </div>
</div>
