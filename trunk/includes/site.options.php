<?php
// get options from db
$sqllink = mysql_connect($host, $dbuser, $dbpass)or die('Cant connect to database');
mysql_select_db($dbname)or die('Database not found');

// get admin email address for upload notifications
$sql= @mysql_query('SELECT * FROM tbl_users WHERE user="admin"');
while($row = @mysql_fetch_array($sql)) {
	$admin_email_address = $row['email'];
}

// here we get the system options
$options_values = array(); $q = "SELECT * FROM tbl_options"; $resu = @mysql_query($q);
while ($row = @mysql_fetch_array($resu)) { $options_values[$row['name']] = $row['value']; }
	$baseuri = $options_values['base_uri'];
	$max_thumbnail_width = $options_values['max_thumbnail_width'];
	$max_thumbnail_height = $options_values['max_thumbnail_height'];
	$thumbnails_folder = $options_values['thumbnails_folder'];
	$thumbnail_default_quality = $options_values['thumbnail_default_quality'];
	$max_logo_width = $options_values['max_logo_width'];
	$max_logo_height = $options_values['max_logo_height'];
	$this_install_title = $options_values['this_install_title'];
	$selected_clients_template = $options_values['selected_clients_template'];
	$timezone = $options_values['timezone'];
	$timeformat = $options_values['timeformat'];
mysql_close($sqllink);

date_default_timezone_set($timezone);
?>