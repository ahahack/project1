<div class="form-group">
	<label for="name">Title</label>
	<input class="form-control" type="text" name="title" value="{{ old('title') ?? $article->title }}">

	<div>{{ $errors->first('title') }}</div>
</div>

<div class="form-group">
	<label for="subtitle">Subtitle</label>
	<input class="form-control" type="text" name="subtitle" value="{{ old('subtitle') ?? $article->subtitle }}">

	<div>{{ $errors->first('subtitle') }}</div>
</div>

<div class="form-group">
	<label for="content">Content</label>
	<textarea class="form-control my-editor" type="text" rows="7" name="content">{{ old('content') ?? $article->content }}</textarea>

	<div>{{ $errors->first('content')}}</div>
</div>

<div class="row">
	<div class="col-6">
		<div class="form-group">
			<label for="active">Status</label>
			<select name="active" id="active" class="form-control">
				<option value="" disabled>Select article status</option>
				<option value="1" {{ $article->active == 'Active' ? 'selected' : '' }}>Active</option>
				<option value="0" {{ $article->active == 'Inactive' ? 'selected' : '' }}>Inactive</option>
				{{-- @foreach ($article->activeOptions() as $activeOptionKey => $activeOptionValue)
				<option value="{{ $activeOptionKey }}" {{ $article->active == '$activeOptionValue' ? 'selected' : '' }}>{{ $activeOptionValue }}</option>
				@endforeach --}}
			</select>
		</div>
	</div>
	<div class="col-6">
		<div class="form-group">
			<label for="popular">Popular</label>
			<select name="popular" id="popular" class="form-control">
				<option value="" disabled>Select popular status</option>
				<option value="1" {{ $article->popular == 'Popular' ? 'selected' : '' }}>Popular</option>
				<option value="0" {{ $article->popular == 'Unpopular' ? 'selected' : '' }}>Unpopular</option>
			</select>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-6">
		<div class="form-group">
			<label for="category_id">Category</label>
			<select name="category_id" id="category_id" class="form-control">
				@foreach ($categories as $category)
					<option value="{{ $category->id }}" {{ $category->id == $article->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
				@endforeach
			</select>
			<div>{{ $errors->first('category_id') }}</div>
		</div>
	</div>

	<div class="col-3">
		<div class="form-group d-flex flex-column">
			<label for="image">Article Image</label>
			<input type="file" name="image">
			<div>{{ $errors->first('image') }}</div>
		</div>
	</div>

	<div class="col-3">
		<div class="d-flex">
			<img class="w-100" src="{{ asset('storage/' . $article->image) }}">
		</div>
	</div>
</div>

<div class="form-group">
	<label for="tags[]">Tags</label>
	<select class="form-control select2-multi" name="tags[]" multiple="multiple">
	    @foreach ($tags as $tag)
			<option value="{{ $tag->id }}" {{ $article->tags->pluck('id')->contains($tag->id) ? 'selected' : '' }}>{{ $tag->name }}</option>
	    @endforeach
    </select>
    <div>{{ $errors->first('tags[]') }}</div>
</div>

@csrf