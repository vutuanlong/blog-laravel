@extends( 'layouts.app' )

@section( 'main' )
	<main class="max-w-lg mx-auto mt-6 border border-gray-200 p-6 rounded-xl">
		<h1 class="text-center font-bold text-xl">Create Post</h1>
		<form method="POST" action="/admin/posts">
			@csrf
			<div class="mb-6">
				<label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="title">Title</label>
				<input
					type="text"
					class="border border-gay-400 p-2 w-full"
					name="title"
					value="{{ old( 'title' ) }}"
					id="title">
			</div>
			@error( 'title' )
				<p class="text-red-500 text-xs mt-2">{{ $message }}</p>
			@enderror

			<div class="mb-6">
				<label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="slug">Slug</label>
				<input
					type="text"
					class="border border-gay-400 p-2 w-full"
					name="slug"
					value="{{ old( 'slug' ) }}"
					id="slug">
			</div>
			@error( 'slug' )
				<p class="text-red-500 text-xs mt-2">{{ $message }}</p>
			@enderror

			<div class="mb-6">
				<label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="excerpt">Excerpt</label>
				<textarea
					class="border border-gay-400 p-2 w-full"
					name="excerpt"
					value="{{ old( 'excerpt' ) }}"
					id="excerpt">
				</textarea>
			</div>
			@error( 'excerpt' )
				<p class="text-red-500 text-xs mt-2">{{ $message }}</p>
			@enderror

			<div class="mb-6">
				<label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="body">Body</label>
				<textarea
					class="border border-gay-400 p-2 w-full"
					name="body"
					value="{{ old( 'body' ) }}"
					id="body">
				</textarea>
			</div>
			@error( 'excerpt' )
				<p class="text-red-500 text-xs mt-2">{{ $message }}</p>
			@enderror

			<div class="mb-6">
				<label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="category">Category</label>
				<div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl">
					<select name="category_id" id="category_id" class="flex-1 appearance-none bg-gray-100 py-2 pl-3 pr-9 text-sm font-semibold rounded-xl">
						@foreach ( \App\Models\Category::all() as $category )
							<option
							value="{{ $category->id }}"
							>{{ ucwords( $category->name ) }}</option>
						@endforeach
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
			</div>

			<div class="mb-6">
				<button type="submit" class="bg-blue-400 text-white rounded py-2 px-4">
					Submit
				</button>
			</div>
		</form>
	</main>
@endsection
