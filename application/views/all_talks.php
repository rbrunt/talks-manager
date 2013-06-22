<?php
	$this->load->view("_header");
?>

		<ul>
<?php foreach($talks as $talk): ?>
			<li><?php echo $talk->title;?></li>
<?php endforeach; ?>
		</ul>

<?php
$this->load->view("_footer");
?>