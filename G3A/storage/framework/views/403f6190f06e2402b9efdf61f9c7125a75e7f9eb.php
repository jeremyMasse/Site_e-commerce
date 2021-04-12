

<?php $__env->startSection('contenu'); ?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">



</article> <!-- card.// -->
	</aside> <!-- col.// -->
	<aside class="col-sm-6">
<article class="card">
<div class="card-body p-5">

<ul class="nav bg-light nav-pills rounded nav-fill mb-3" role="tablist">
	<li class="nav-item">
		<a class="nav-link active" data-toggle="pill" href="#nav-tab-card">
		<i class="fa fa-credit-card"></i> Credit Card</a></li>
	<li class="nav-item">
		<a class="nav-link" data-toggle="pill" href="#nav-tab-paypal">
		<i class="fab fa-paypal"></i>  Paypal</a></li>
	<li class="nav-item">
		<a class="nav-link" data-toggle="pill" href="#nav-tab-bank">
		<i class="fa fa-university"></i>  Bank Transfer</a></li>
</ul>

<div class="tab-content">
<div class="tab-pane fade show active" id="nav-tab-card">
	<p class="alert alert-success">Some text success or error</p>
	<form role="form">
	<div class="form-group">
		<label for="nom">Full name (on the card)</label>
		<input type="text" class="form-control" name="nom" placeholder="" required="">
	</div> <!-- form-group.// -->

	<div class="form-group">
		<label for="numero">Card number</label>
		<div class="input-group">
			<input type="text" class="form-control" name="numero" placeholder="">
			<div class="input-group-append">
				<span class="input-group-text text-muted">
					<i class="fab fa-cc-visa"></i>   <i class="fab fa-cc-amex"></i>   
					<i class="fab fa-cc-mastercard"></i> 
				</span>
			</div>
		</div>
	</div> <!-- form-group.// -->

	<div class="row">
	    <div class="col-sm-8">
	        <div class="form-group">
	            <label><span class="hidden-xs">Expiration</span> </label>
	        	<div class="input-group">
	        		<input id="date" type="number" class="form-control" placeholder="MM" name="">
		            <input id="date" type="number" class="form-control" placeholder="YY" name="">
	        	</div>
	        </div>
	    </div>
	    <div class="col-sm-4">
	        <div class="form-group">
	            <label data-toggle="tooltip" title="" data-original-title="3 digits code on back side of the card">CVV <i class="fa fa-question-circle"></i></label>
	            <input id="crypto" type="number" class="form-control" required="">
	        </div> <!-- form-group.// -->
	    </div>
	</div> <!-- row.// -->
	<button class="subscribe btn btn-primary btn-block" type="button"> Confirm  </button>
	</form>
</div> <!-- tab-pane.// -->
<div class="tab-pane fade" id="nav-tab-paypal">
<p>Paypal is easiest way to pay online</p>
<p>
<button type="button" class="btn btn-primary"> <i class="fab fa-paypal"></i> Log in my Paypal </button>
</p>
<p><strong>Note:</strong> Connect to your account and pay, it's so easy </p>
</div>
<div class="tab-pane fade" id="nav-tab-bank">
<p>Bank accaunt details</p>
<dl class="param">
  <dt>BANK: </dt>
  <dd> Sociéte Général</dd>
</dl>
<dl class="param">
  <dt>Accaunt number: </dt>
  <dd> 68973953036</dd>
</dl>
<dl class="param">
  <dt>IBAN: </dt>
  <dd> FR14 2004 1010 0505 0001 3M02 606</dd>
</dl>
<p><strong>Note:</strong>
    Already connected to your bank, seen paying </p>
</div> <!-- tab-pane.// -->
</div> <!-- tab-content .// -->

</div> <!-- card-body.// -->
</article> <!-- card.// -->


	</aside> <!-- col.// -->
</div> <!-- row.// -->

</div> 
<!--container end.//-->

</article>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jerem\Documents\CoursYnov\2020_2021\Projet web\projet_dev_web_b2\G3A\resources\views/card.blade.php ENDPATH**/ ?>