<?php
$sidebar_content = '';

if ( arg(0) == 'node' && is_numeric(arg(1)) && ! arg(2) ) {

  $node = node_load(arg(1));

	// sidebar image from node
	if (is_array($node->field_sidebar_image[0]) && $field_values = $node->field_sidebar_image[0]) {
		if ($field_values['filename'] != '') {
			$sidebar_content .= '<img src="/'.$field_values['filepath'].'" alt="'.$field_values['data']['alt'].'" /><br class="clear" />';
		}
	}
	// sidebar callout text
	if (isset($node->field_sidebar_callout[0]['value']) && $node->field_sidebar_callout[0]['value'] != '') {
		$sidebar_content .= $node->field_sidebar_callout[0]['value'];
	}
}
?>
<?php
if ($sidebar_content) {
	echo $sidebar_content;
} else {
?>
<img src="/sites/asappublicaffairs.com/themes/asap/images/asap_static_43a.jpg" alt="" /><br class="clear" />
<p>ASAP works with the best people in America in research, data, and analysis serving clients across the partisan and idealogical spectrum.</p>
<?php
}
?>