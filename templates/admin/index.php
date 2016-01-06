<div class="row">
	<div class="col-md-12">
		<?php foreach($flash as $type => $message) {
			if($type == 'error') {
				$type = "danger";
			}
			printf('<div class="alert alert-%s alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>%s</div>', $type, $message);
		} ?>
	</div>
</div>
<div class="row">
	<div class="col-md-6 col-md-offset-3 page-header">
		<h3>Login</h3>
	</div>
</div>
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<form class="form form-horizontal" method="post" action="/admin/login">
			<div class="form-group">
				<label class="col-md-3 control-label">Username</label>
				<div class="col-md-9">
					<input type="text" name="username" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label">Password</label>
				<div class="col-md-9">
					<input type="password" name="password" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-1 col-md-offset-5">
					<button type="submit" class="btn btn-primary">Login</button>
				</div>
			</div>
		</form>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>