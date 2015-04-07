<?php
/**
 * Sets up the actual search form
 * @package neighborly
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<label>
		<span>Search for:</span>
		<input type="search" class="search-field" value="" name="s" />
	</label>
	<input type="submit" class="search-submit" value="Search" />
</form>