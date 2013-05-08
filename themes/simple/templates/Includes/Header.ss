<header class="header" role="banner">
	<div class="inner">
		<div class="unit size4of4 lastUnit">
			<div class="unit size1of2">
			<a href="$BaseHref" class="brand" rel="home">
				<img src="assets/Uploads/assets/logo1.png" alt="Let's Poop" class="logo" />
			</a>
			</div>
			<% if $SearchForm %>
				<span class="search-dropdown-icon">L</span>
				<div class="search-bar">
					$SearchForm
				</div>
			<% end_if %>
			<% include Navigation %>
		</div>
	</div>
</header>
