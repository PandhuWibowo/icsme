<div id="register-page">
	
	<nav class="navbar navbar-expand-md navbar-light bg-white">
		<div class="container">
			<a href="<?php echo $base; ?>" class="navbar-brand">
				<img src="assets/uploads/logo_icsme.png" />
			</a>
			<ul class="navbar-nav ml-auto">
	          	<li class="nav-item">
	            	<a class="nav-link" href="register">Back to Registration</a>
	          	</li>
	        </ul>
		</div>
	</nav>

	<div id="ticket-section" class="section bg-img" style="background-image: url('assets/uploads/slide_conference.png')">
		<div class="overlay-blue overlay-gradient-blue-bottom">
			<div class="container">
				<div class="title-section title-white">
					<div class="iconbox">
						<i class="fa fa-ticket"></i>
					</div>
					Select Ticket
				</div>
				<div class="row justify-content-md-center">
					<div class="col-md-12 col-lg-12">
						<div class="row justify-content-md-center">
							<div class="col-md-7 col-lg-7 ticket-area">
								<h1 class="text-bebas title-section-ticket">Presenter</h1>
								<div class="row list-ticket">
									<div class="col-md-6 col-lg-6">
										<div class="item">
											<h4><strong>Early Bird</strong></h4>
											up until 31/8/2018
											<div class="price">US$ 250</div>
											<button ticketid="1" price="250" class="btn btn-primary btn-buy-ticket">BUY TICKET</button>
										</div>
									</div>
									<div class="col-md-6 col-lg-6">
										<div class="item">
											<h4><strong>Regular</strong></h4>
											1/9/2018 onwards
											<div class="price">US$ 300</div>
											<button ticketid="2" price="300" class="btn btn-primary btn-buy-ticket">BUY TICKET</button>
										</div>
									</div>
								</div>
								<h1 class="text-bebas title-section-ticket">Observer / Non presenter</h1>
								<div class="row list-ticket">
									<div class="col">
										<div class="item">
											<div class="price">US$ 250</div>
											<button ticketid="3" price="250" class="btn btn-primary btn-buy-ticket">BUY TICKET</button>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-5 col-lg-5 cart-area">
								<h1 class="text-bebas title-section-ticket">Your Cart</h1>
								<form method="post" action="payment" id="syxform" class="boxcart" data-uri="admin/manager/submit/cart">
									<div class="list-cart">
										<div id="ticket-1" class="item">
											<div class="row">
												<div class="col-6 col-md-8 col-lg-8 align-self-center">
													PRESENTER - Early Bird
												</div>
												<div class="col-3 col-md-2 col-lg-2 align-self-center text-right">
													x <font class="value">0</font>
													<input id="ticket-input-1" type="hidden" name="ticket_1" value="" />
												</div>
												<div class="col-3 col-md-2 col-lg-2 pl-0 align-self-center">
													<div class="btn-plus-min">
														<button type="button" class="btn btn-primary btn-plus" ticketid="1" price="250">
															<i class="fa fa-plus"></i>
														</button>
														<button type="button" class="btn btn-danger btn-minus" ticketid="1" price="250">
															<i class="fa fa-minus"></i>
														</button>
													</div>
												</div>
											</div>
										</div>
										<div id="ticket-2" class="item">
											<div class="row">
												<div class="col-6 col-md-8 col-lg-8 align-self-center">
													PRESENTER - Regular
												</div>
												<div class="col-3 col-md-2 col-lg-2 align-self-center text-right">
													x <font class="value">0</font>
													<input id="ticket-input-2" type="hidden" name="ticket_2" value="" />
												</div>
												<div class="col-3 col-md-2 col-lg-2 pl-0 align-self-center">
													<div class="btn-plus-min">
														<button type="button" class="btn btn-primary btn-plus" ticketid="2" price="300">
															<i class="fa fa-plus"></i>
														</button>
														<button type="button" class="btn btn-danger btn-minus" ticketid="2" price="300">
															<i class="fa fa-minus"></i>
														</button>
													</div>
												</div>
											</div>
										</div>
										<div id="ticket-3" class="item">
											<div class="row">
												<div class="col-6 col-md-8 col-lg-8 align-self-center">
													Observer / Non presenter
												</div>
												<div class="col-3 col-md-2 col-lg-2 align-self-center text-right">
													x <font class="value">0</font>
													<input id="ticket-input-3" type="hidden" name="ticket_3" value="" />
												</div>
												<div class="col-3 col-md-2 col-lg-2 pl-0 align-self-center">
													<div class="btn-plus-min">
														<button type="button" class="btn btn-primary btn-plus" ticketid="3" price="250">
															<i class="fa fa-plus"></i>
														</button>
														<button type="button" class="btn btn-danger btn-minus" ticketid="3" price="250">
															<i class="fa fa-minus"></i>
														</button>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="total">
										<div class="row">
											<div class="col">
												<h4 class="text-bebas text-uppercase text-total">Total</h4>
											</div>
											<div class="col">
												<h4 class="text-bebas text-uppercase text-right text-total">US$ <font class="value">0</font></h4>
												<input id="total-price" type="hidden" name="total_price" value="" />
											</div>
										</div>
									</div>
									<div class="btn-submit-box">
										<button type="submit" name="submit" class="btn btn-primary btn-submit">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
<script src="admin/assets/js/syxform.js"></script>
<script type="text/javascript">
	$(function(){
		var widthScreen = $(window).width();

		function addTicket(ticketID, ticketPrice) {			
			var recentTicketValue = parseInt($('.list-cart #ticket-' + ticketID + ' .value').html());
			var newTicketValue = recentTicketValue + 1;
			$('.list-cart #ticket-' + ticketID + ' .value').html(newTicketValue);
			$('.list-cart #ticket-' + ticketID).show();

			$('#ticket-input-' + ticketID).val(newTicketValue);

			var recentPrice = parseInt($('.boxcart .total .value').html());
			var totalPrice = recentPrice + ticketPrice;
			$('.boxcart .total .value').html(totalPrice);
			$('.boxcart .total').show();

			$('#total-price').val(totalPrice);

			$('#ticket-section .cart-area').show();
		}

		function removeTicket(ticketID, ticketPrice) {
			var recentTicketValue = parseInt($('.list-cart #ticket-' + ticketID + ' .value').html());
			var newTicketValue = recentTicketValue - 1;
			$('.list-cart #ticket-' + ticketID + ' .value').html(newTicketValue);

			if(newTicketValue == 0) {
				$('.list-cart #ticket-' + ticketID).hide();
			}

			$('#ticket-input-' + ticketID).val(newTicketValue);

			var recentPrice = parseInt($('.boxcart .total .value').html());
			var totalPrice = recentPrice - ticketPrice;
			$('.boxcart .total .value').html(totalPrice);

			$('#total-price').val(totalPrice);

			if(totalPrice == 0) {
				$('.boxcart .total').hide();
				$('#ticket-section .cart-area').hide();
			}
		}

		$('.btn-buy-ticket').on('click', function(){
			var ticketID = $(this).attr('ticketid');
			var ticketPrice = parseInt($(this).attr('price'));
			addTicket(ticketID, ticketPrice);

			if(widthScreen <= 480) {
				$('html, body').animate({
					scrollTop: $('#syxform').offset().top
				}, 500);
			}
		});

		$('.btn-plus').on('click', function(){
			var ticketID = $(this).attr('ticketid');
			var ticketPrice = parseInt($(this).attr('price'));
			addTicket(ticketID, ticketPrice);
		});

		$('.btn-minus').on('click', function(){
			var ticketID = $(this).attr('ticketid');
			var ticketPrice = parseInt($(this).attr('price'));
			removeTicket(ticketID, ticketPrice);
		});
	});
</script>