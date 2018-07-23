<div id="register-page">
	
	<nav class="navbar navbar-expand-md navbar-light bg-white">
		<div class="container">
			<a href="<?php echo $base; ?>" class="navbar-brand">
				<img src="assets/uploads/logo_icsme.png" />
			</a>
			<ul class="navbar-nav ml-auto">
	          	<li class="nav-item">
	            	<a class="nav-link" href="<?php echo $base; ?>">Back to Home</a>
	          	</li>
	        </ul>
		</div>
	</nav>

	<div id="form-section" class="section bg-img" style="background-image: url('assets/uploads/slide_conference.png')">
		<div class="overlay-blue overlay-gradient-blue-bottom">
			<div class="container">
				<div class="title-section title-white">
					<div class="iconbox">
						<i class="fa fa-address-card-o"></i>
					</div>
					Confirm Payment
				</div>
				<div class="row justify-content-md-center">
					<div class="col-md-7 col-lg-7">
						<form method="post" enctype="multipart/form-data" encoding="multipart/form-data" action="admin/manager/submit/confirmation" class="form-horizontal">
							<div class="row">
								<div class="col-md-6 col-lg-6 material-input">
									<div class="group input-field">      
										<input type="text" name="sender_name" id="sender_name" required />
										<span class="highlight"></span>
										<span class="bar"></span>
										<label for="sender_name">Sender Name *</label>
									</div>
								</div>
								<div class="col-md-6 col-lg-6 material-input">
									<div class="group input-field">      
										<input type="text" name="tranfser_date" id="tranfser_date" data-toggle="datetimepicker" data-target="#tranfser_date" required />
										<span class="highlight"></span>
										<span class="bar"></span>
										<label for="tranfser_date">Transfer Date *</label>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 col-lg-6 material-input">
									<div class="group input-field">      
										<input type="text" name="bank" id="bank" required />
										<span class="highlight"></span>
										<span class="bar"></span>
										<label for="bank">Name of Bank *</label>
									</div>
								</div>
								<div class="col-md-6 col-lg-6 material-input">
									<div class="group input-field">      
										<input type="text" name="account_number" id="account_number" required />
										<span class="highlight"></span>
										<span class="bar"></span>
										<label for="account_number">Account Number *</label>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col material-input">
									<div class="group input-field">      
										<input type="text" name="amount" id="amount" required />
										<span class="highlight"></span>
										<span class="bar"></span>
										<label for="amount">Amount *</label>
									</div>
								</div>
							</div>
							<div class="row professional-input">
								<div class="col-md-3 col-lg-3 material-input">
									<div class="group input-field">
										<label for="payment_slip">Payment Slip *</label>
									</div>
								</div>
								<div class="col-md-9 col-lg-9 material-input">
									<div class="group input-field">
										<input type="file" name="file" id="payment_slip" required />
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col text-center">
									<button type="submit" name="submit" class="btn btn-primary">Submit</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>

<script type="text/javascript">
	$(function(){
		$('#tranfser_date').datetimepicker({
			dateFormat: 'Y-M-D',
            format: 'Y-M-D',
			autoclose : true
        });
	});
</script>