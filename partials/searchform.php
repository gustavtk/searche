<form class="row align-items-center" role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>">
  <div class="col-md mb-3">
	<input type="text" value="<?php echo $_GET['s']; ?>" name="s" id="s" placeholder="What are you looking for?" class="form-control rounded" />
  </div>
	<div class="col-md-2 mb-3">
	  <button type="submit" id="searchsubmit" class="btn btn-sm rounded w-100" type="button">Search</button>
	</div>
</form>