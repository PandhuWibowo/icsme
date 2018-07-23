<div id="register-page">
	
	<nav class="navbar navbar-expand-md navbar-light bg-white">
		<div class="container">
			<a href="<?php echo $base; ?>" class="navbar-brand">
				<img src="assets/uploads/logo_icsme.png" />
			</a>
			<ul class="navbar-nav ml-auto">
	          	<li class="nav-item">
	            	<a class="nav-link" href="professional">Back to Professional</a>
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
					Registration
				</div>
				<div class="row justify-content-md-center">
					<div class="col-md-7 col-lg-7">
						<form method="post" action="ticket" class="form-horizontal" id="syxform" data-uri="admin/manager/submit/register">
							<div class="row type-box">
								<div class="col-md-12 col-lg-3 align-self-center">
									<p class="fs-18">Select Type</p>
								</div>
								<div class="col-md-6 col-lg-3 align-self-center">
									<div class="custom-control custom-radio custom-control-inline">
										<input type="radio" id="professional" name="user_type" required checked class="custom-control-input" value="professional">
										<label class="custom-control-label" for="professional">Professional</label>
									</div>

								</div>
								<div class="col-md-6 col-lg-3 align-self-center">
									<div class="custom-control custom-radio custom-control-inline">
										<input type="radio" id="academic" required name="user_type" class="custom-control-input" value="academic">
										<label class="custom-control-label" for="academic">Academic</label>
									</div>
								</div>
							</div>
							<div class="row academic-input" style="display: none;">
								<div class="col material-input">
									<div class="group input-field">      
										<input type="text" name="submission_id" id="submission_id" />
										<span class="highlight"></span>
										<span class="bar"></span>
										<label for="submission_id">Submission ID *</label>
										<em class="notes">Submit your paper to <a href="https://goo.gl/oUjkRd" target="_blank">https://goo.gl/oUjkRd</a> to get submission ID</em>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col material-input">
									<div class="group input-field">      
										<input type="text" name="fullname" id="fullname" required />
										<span class="highlight"></span>
										<span class="bar"></span>
										<label for="fullname">Full Name *</label>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 col-lg-6 material-input">
									<div class="group input-field">      
										<input type="text" name="email" id="email" required />
										<span class="highlight"></span>
										<span class="bar"></span>
										<label for="email">Email Address *</label>
									</div>
								</div>
								<div class="col-md-6 col-lg-6 material-input">
									<div class="group input-field">      
										<input type="text" name="phone" id="phone" required />
										<span class="highlight"></span>
										<span class="bar"></span>
										<label for="phone">Phone Number *</label>
									</div>
								</div>
							</div>
							<div class="row professional-input">
								<div class="col material-input">
									<div class="group input-field">      
										<textarea name="address" id="address" rows="3" required></textarea>
										<span class="highlight"></span>
										<span class="bar"></span>
										<label for="address">Address *</label>
									</div>
								</div>
							</div>
							<div class="row professional-input">
								<div class="col material-input">
									<div class="group input-field">
										<input type="text" name="institution" id="institution" required />
										<span class="highlight"></span>
										<span class="bar"></span>
										<label for="institution">Institution</label>
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
<script src="admin/assets/js/syxform.js"></script>
<script type="text/javascript">
	$(function(){
		$('input[name=user_type]').on('change', function(){
			var thisValue = $(this).val();
			if(thisValue == 'professional') {
				$('.academic-input').hide();
				$('.professional-input').show();
				$('#professional').attr('checked',true);
			} else if(thisValue == 'academic') {
				$('.professional-input').hide();
				$('.academic-input').show();
				$('#academic').attr('checked',true);
			}
		});

		$('input[name=user_type]:checked').each(function(){
			var thisValue = $(this).val();
			if(thisValue == 'professional') {
				$('.academic-input').hide();
				$('.professional-input').show();
			} else if(thisValue == 'academic') {
				$('.professional-input').hide();
				$('.academic-input').show();
			}
		});
	});
</script>