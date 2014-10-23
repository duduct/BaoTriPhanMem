<div id="content">
	<?php
		echo validation_errors();
		echo form_open();
			echo form_input('vl_search');
			echo form_submit('search', 'Search');
		echo form_close();
	?>
</div><!--End content-->