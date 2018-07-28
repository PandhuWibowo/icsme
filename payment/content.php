<div id="register-page">
	
	<nav class="navbar navbar-expand-md navbar-light bg-white">
		<div class="container">
			<a href="<?php echo $base; ?>" class="navbar-brand">
				<img src="assets/uploads/logo_icsme.png" />
			</a>
			<ul class="navbar-nav ml-auto">
	          	<li class="nav-item">
	            	<a class="nav-link" href="ticket">Back to Ticket</a>
	          	</li>
	        </ul>
		</div>
	</nav>

	<div id="ticket-section" class="section bg-img" style="background-image: url('assets/uploads/slide_conference.png')">
		<div class="overlay-blue overlay-gradient-blue-bottom">
			<div class="container">
				<div class="title-section title-white">
					<div class="iconbox">
						<i class="fa fa-credit-card"></i>
					</div>
					Payment
				</div>
				<div class="row justify-content-md-center">
					<div class="col-md-7 col-lg-7">
						<div class="row payment-amount-box">
							<div class="col-md-6 col-lg-6 colm">
								<h1 class="text-bebas title-section-ticket">Payment Amount</h1>
							</div>
							<div class="col-md-6 col-lg-6 colm">
								<h1 class="text-bebas text-right title-section-ticket payment-amount">US$ <?php echo @$_COOKIE['total'];?></h1>
							</div>
						</div>

						<div class="text-center boxrekening">
							<h4>Please transfer your payment to</h4>
							<h1 class="text-bebas norek">800140073400</h1>
							<h2 class="text-bebas">Indonesia Strategic Management Society</h2>
							<h3 class="text-bebas">CIMB Niaga Bank</h3>
						</div>

						<div class="text-center">
							<p>&nbsp;</p>
							<p>After transfer your payment, please confirm your payment.</p>
							<a href="confirm-payment" class="btn btn-lg btn-primary">Click Here to Confirm Payment</a>
						</div>

						<!--
						<h1 class="text-bebas title-section-ticket">Credit Card</h1>
						<div class="box-logo-payment">
							<div class="row">
								<div class="col-10 col-md-10 col-lg-10">
									<div class="logo-payment">
										<img src="assets/img/mastercard.png" alt="Mastercard" />
										<img src="assets/img/visa.jpg" alt="VISA" />
									</div>
								</div>
								<div class="col-2 col-md-2 col-lg-2">
									<button type="button" class="btn btn-link btn-creditcard">
										<i class="fa fa-angle-right"></i>
									</button>	
								</div>
							</div>
							<div class="box-form-creditcard">
								<form method="post" action="payment" class="form-horizontal">
									<div class="row">
										<div class="col">
											<div class="group input-field input-black">      
												<input type="text" name="card_number" id="card_number" required />
												<span class="highlight"></span>
												<span class="bar"></span>
												<label for="card_number">Card Number *</label>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col">
											<div class="group input-field input-black">      
												<input type="text" name="cardholder_name" id="cardholder_name" required />
												<span class="highlight"></span>
												<span class="bar"></span>
												<label for="cardholder_name">Cardholder Name *</label>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col">
											<div class="group input-field input-black">      
												<select name="month">
													<option value="">Month</option>
													<option value="1">01</option>
													<option value="2">02</option>
													<option value="3">03</option>
													<option value="4">04</option>
													<option value="5">05</option>
													<option value="6">06</option>
													<option value="7">07</option>
													<option value="8">08</option>
													<option value="9">09</option>
													<option value="10">10</option>
													<option value="11">11</option>
													<option value="12">12</option>
												</select>
											</div>
										</div>
										<div class="col">
											<div class="group input-field input-black">      
												<select name="year">
													<option value="">Year</option>
													<option value="2018">2018</option>
													<option value="2019">2019</option>
													<option value="2020">2020</option>
													<option value="2021">2021</option>
													<option value="2022">2022</option>
												</select>
											</div>
										</div>
										<div class="col">
											<div class="group input-field input-black">      
												<input type="text" name="cvv" id="cvv" required />
												<span class="highlight"></span>
												<span class="bar"></span>
												<label for="cvv">CVV *</label>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col">
											<button type="button" class="btn btn-primary text-uppercase fullwidth">Confirm</button>
										</div>
									</div>
								</form>
							</div>
						</div>

						<h1 class="text-bebas title-section-ticket">Virtual Account</h1>
						<div class="box-logo-payment">
							<div class="row">
								<div class="col-10 col-md-10 col-lg-10">
									<div class="logo-payment">
										<img src="assets/img/bni.png" alt="BNI" />
										<img src="assets/img/bri.png" alt="BRI" />
										<img src="assets/img/mandiri.png" alt="Mandiri" />
										<img src="assets/img/atm_bersama.jpg" alt="ATM Bersama" />
									</div>
								</div>
								<div class="col-2 col-md-2 col-lg-2">
									<button type="button" class="btn btn-link btn-pay">
										<i class="fa fa-angle-right"></i>
									</button>	
								</div>
							</div>
						</div>

						<h1 class="text-bebas title-section-ticket">Alfamart</h1>
						<div class="box-logo-payment">
							<div class="row">
								<div class="col-10 col-md-10 col-lg-10">
									<div class="logo-payment">
										<img src="assets/img/alfamart.png" alt="Alfamart" />
										<img src="assets/img/alfamidi.png" alt="Alfamidi" />
										<img src="assets/img/alfaexpress.jpg" alt="Alfa Express" />
										<img src="assets/img/dandan.png" alt="Dandan" />
									</div>
								</div>
								<div class="col-2 col-md-2 col-lg-2">
									<button type="button" class="btn btn-link btn-pay">
										<i class="fa fa-angle-right"></i>
									</button>	
								</div>
							</div>
						</div>
						-->
					</div>
				</div>
			</div>
		</div>
	</div>

</div>

<!-- TODO: Remove ".sandbox" from script src URL for production environment. Also input your client key in "data-client-key" -->
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-PVqphh-fWI0SeVof"></script>
<script type="text/javascript">
	$(function(){
		$('.btn-creditcard').on('click', function(){
			$('.box-form-creditcard').show();
		});

		// midtrans
		snap.pay('<?php echo $snapToken; ?>', {
          // Optional
          onSuccess: function(result){
            /* You may add your own js here, this is just example */ 
            // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            console.log('onSuccess');
          },
          // Optional
          onPending: function(result){
            /* You may add your own js here, this is just example */ 
            // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            console.log('onPending');
          },
          // Optional
          onError: function(result){
            /* You may add your own js here, this is just example */ 
            // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            console.log('onError');
          },
          // Optional
          onClose: function(result){
            /* You may add your own js here, this is just example */ 
            // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            console.log('onClose');
          }
        });
	});
</script>
<script type="text/javascript">
      document.getElementById('pay-button').onclick = function(){
        // SnapToken acquired from previous step
        
      };
    </script>