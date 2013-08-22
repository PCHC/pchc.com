<?php
	/*
	Author: Chris Violette
	Customized search form
	*/
?>
<div class="clearfix"></div>
<form role="search" method="get" class="searchform clearfix" action="<?php echo home_url( '/' ); ?>">
	<label class="screen-reader-text" for="s">Search for:</label>
	<input type="search" value="" name="s" class="s" id="s" placeholder="Search...">
	<button type="submit" class="button btn"><i class="icon-search icon-light"></i></button>
</form>
