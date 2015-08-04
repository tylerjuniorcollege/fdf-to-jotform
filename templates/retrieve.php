<div class="row">
	<div class="col-md-6 col-md-offset-3 page-header">
		<h3>Retrieve Generated PDF</h3>
	</div>
</div>
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<form class="form form-horizontal" method="post">
			<div class="form-group">
				<label class="col-md-3 control-label">Submission ID</label>
				<div class="col-md-9">
					<input type="text" name="subid" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label">Make the PDF Editable?</label>
				<div class="col-md-9">
					<div class="radio">
						<label>
							<input type="radio" value="0" name="flat"> Yes
						</label>
					</div>
					<div class="radio">
						<label>
							<input type="radio" value="1" name="flat"> No
						</label>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-1 col-md-offset-5">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</div>
		</form>
	</div>
</div>