<ul class="sidebar-nav">
	@if(Auth::user()->UserProvider->count() > 0)
		@include('layouts.users.sidebar-menu.provider')
	@else
		@include('layouts.users.sidebar-menu.client')
	@endif
</ul>