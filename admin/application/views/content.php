<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
</head>
<body style="text-align:center;">
	<div>
		<a href='<?php echo site_url('manager/dashboard')?>'>Dashboard</a> |
		<a href='<?php echo site_url('manager/customers')?>'>Customers</a> |
		<a href='<?php echo site_url('manager/orders')?>'>Orders</a> |
		<a href='<?php echo site_url('manager/confirmations')?>'>Confirmations</a> |
		<a href='<?php echo site_url('manager/logout')?>'>Logout</a>
	</div>
	<div style='height:20px;'></div>  
    <div style="padding: 10px">
		<?php echo $output; ?>
    </div>
    <?php foreach($js_files as $file): ?>
        <script src="<?php echo $file; ?>"></script>
    <?php endforeach; ?>
</body>
</html>
