<nav class="md:flex md:justify-between md:items-center">
	<div>
		<a href="/">
			<img src="/images/logo.svg" alt="Laracasts Logo" width="165" height="16">
		</a>
	</div>

	<div class="mt-8 md:mt-0 flex items-center">
		@auth
			<div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl">
				<select class="flex-1 appearance-none bg-transparent py-2 pl-3 pr-9 text-sm font-semibold">
					<option disabled selected>
						<span class="text-xs font-bold uppercase">Welcome {{ auth()->user()->name }}</span>
					</option>
					<option><a href="/admin/posts">Dashboard</a></option>
				</select>

				<svg class="transform -rotate-90 absolute pointer-events-none" style="right: 12px;" width="22"
					height="22" viewBox="0 0 22 22">
					<g fill="none" fill-rule="evenodd">
						<path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
						</path>
						<path fill="#222"
							d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
					</g>
				</svg>
			</div>
			<a href="/admin/posts">Dashboard</a>
			<form method="POST" action="/logout" class="text-xs ml-3">
				@csrf
				<button type="submit">Log Out</button>
			</form>
		@else
			<a href="/register" class="text-xs font-bold uppercase">Register</a>
			<a href="/login" class="ml-3 text-xs font-bold uppercase">Login</a>
		@endauth

		<a href="#" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
			Subscribe for Updates
		</a>
	</div>
</nav>
