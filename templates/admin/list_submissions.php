<div class="row">
	<div class="col-md-8 col-md-offset-2 page-header">
		<h3>Submissions for Form: <?=$data['form']->name; ?></h3>
	</div>
</div>
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<form class="form" action="/admin/delete" method="POST">
		<table class="table table-condensed table-striped table-hover">
			<thead>
				<tr>
					<th></th>
					<th>Id</th>
					<th>Name</th>
					<th>A Number</th>
					<th>Email</th>
					<th>Download PDF</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach($data['submissions']['data'] as $submission) {
				printf('<tr><td><div class="checkbox"><input type="checkbox" name="delete[]" value="%s"></div></td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td><a href="/retrieve/%s?flatten=1" class="btn btn-primary">Download PDF</a></td></tr>',
					$submission['submission_id'],
					$submission['submission_id'],
					$submission['name'],
					$submission['a_number'],
					$submission['email'],
					$submission['submission_id']
				);
			} ?>
			</tbody>
		</table>
		</form>
	</div>
</div>