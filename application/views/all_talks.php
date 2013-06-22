<?php
	$this->load->view("_header");
?>

<ul>
	<?php
		foreach($talks as $talk){
			echo"<li>".$talk->title."</li>";
		}
	?>
</ul>

<?php
$this->load->view("_footer");
?>