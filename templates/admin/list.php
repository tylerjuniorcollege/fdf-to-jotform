<div class="row">
	<div class="col-md-6 col-md-offset-3 page-header">
		<h3>Your Available Forms</h3>
	</div>
</div>
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="list-group">
			<?php foreach($data['forms'] as $form) {
				printf('<a href="/admin/list/%s" class="list-group-item">%s</a>', $form['jotformid'], $form['name']);
			} ?>
		</div>
	</div>
</div>