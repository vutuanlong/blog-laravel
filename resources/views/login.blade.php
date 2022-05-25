@extends( 'layouts.app' )

@section( 'main' )
	<main class="max-w-lg mx-auto mt-6 bg-gray-100 border border-gray-200 p-6 rounded-xl">
		<h1 class="text-center font-bold text-xl">Login</h1>
		<form method="POST" action="/login">
			@csrf

			<div class="mb-6">
				<label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="username">Username</label>
				<input type="text"
					class="border border-gay-400 p-2 w-full"
					name="username"
					value="{{ old( 'username' ) }}"
					id="username">
			</div>
			@error( 'username' )
				<p class="text-red-500 text-xs mt-2">{{ $message }}</p>
			@enderror

			<div class="mb-6">
				<label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password">Password</label>
				<input
					type="password"
					class="border border-gay-400 p-2 w-full"
					name="password"
					id="password">
			</div>
			<div class="mb-6">
				<button type="submit" class="bg-blue-400 text-white rounded py-2 px-4">
					Submit
				</button>
			</div>
		</form>
	</main>
@endsection
