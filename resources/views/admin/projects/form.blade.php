<div class="form-group">
	<label for="name">Title</label>
	<input class="form-control" type="text" name="title" value="{{ old('title') ?? $project->title }}">

	<div>{{ $errors->first('title') }}</div>
</div>

<div class="row">
	<div class="col-4">
		<div class="form-group">
			<label for="price">Price</label>
			<input class="form-control" type="text" name="price" value="{{ old('price') ?? $project->price }}">

			<div>{{ $errors->first('price') }}</div>
		</div>
	</div>
	<div class="col-4">
		<div class="form-group">
			<label for="duration">Duration</label>
			<input class="form-control" type="text" name="duration" value="{{ old('duration') ?? $project->duration }}">

			<div>{{ $errors->first('duration') }}</div>
		</div>
	</div>
	<div class="col-4">
		<div class="form-group">
			<label for="website">Website</label>
			<input class="form-control" type="text" name="website" value="{{ old('website') ?? $project->website }}">

			<div>{{ $errors->first('website') }}</div>
		</div>
	</div>
</div>

<div class="form-group">
	<label for="description">Description</label>
	<textarea class="form-control my-editor" type="text" rows="7" name="description">{{ old('description') ?? $project->description }}</textarea>

	<div>{{ $errors->first('description')}}</div>
</div>

<div class="row">
	<div class="col-6">
		<div class="form-group">
			<label for="service_id">Service</label>
			<select name="service_id" id="service_id" class="form-control">
				@foreach ($services as $service)
					<option value="{{ $service->id }}" {{ $service->id == $project->service_id ? 'selected' : '' }}>{{ $service->name }}</option>
				@endforeach
			</select>
			<div>{{ $errors->first('service_id') }}</div>
		</div>
	</div>

	<div class="col-3">
		<div class="form-group d-flex flex-column">
			<label for="image">Project Image</label>
			<input type="file" name="image">
			<div>{{ $errors->first('image') }}</div>
		</div>
	</div>

	<div class="col-3">
		<div class="d-flex">
			<img class="w-100" src="{{ asset('storage/' . $project->image) }}">
		</div>
	</div>
</div>

@csrf