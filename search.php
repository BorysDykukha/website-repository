<form name='search' action='' method='POST' ENCTYPE='multipart/form-data'>
	Type a search request: 
	<input type='text' name='searchrequest'>
	<input type='submit' name='search' value='Search'>
</form>

<?php
	if($_POST[searchrequest] != null) {
		echo "Search result for \"$_POST[searchrequest]\":";
	}
?>