<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<h2>Media</h2>

<!-- Media table. -->
<table id="files-table">
	<tr>
		<th>File name</th>
		<th>Size</th>
	</tr>
	<!-- Create a row for each file. -->
	<?php
	foreach ($files as $file)
	{
	?>
		<tr onclick="window.open('<?= $file->url ?>').focus();">
			<td><?= $file->name ?></td>
			<td><?= $file->size ?></td>
		</tr>
	<?php
	}
	?>
</table>