<div class="form-group">
	<label for="name">Name</label>
	<input class="form-control" type="text" name="name" value="{{ old('name') ?? $category->name }}">

	<div>{{ $errors->first('name') }}</div>
</div>

@csrf