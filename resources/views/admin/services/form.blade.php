<div class="form-group">
	<label for="name">Name</label>
	<input class="form-control" type="text" name="name" value="{{ old('name') ?? $service->name }}">

	<div>{{ $errors->first('name') }}</div>
</div>

<div class="form-group">
	<label for="description">Description</label>
	<textarea class="form-control my-editor" type="text" rows="7" name="description">{{ old('description') ?? $service->description }}</textarea>

	<div>{{ $errors->first('description')}}</div>
</div>

<div class="row">
	<div class="col-3">
		<div class="d-flex">
			<img class="w-100" src="{{ asset('storage/' . $service->image) }}">
		</div>
	</div>
	<div class="col-9">
		<div class="form-group d-flex flex-column">
			<label for="image">Service Image</label>
			<input type="file" name="image">
			<div>{{ $errors->first('image') }}</div>
		</div>
	</div>
</div>

@csrf