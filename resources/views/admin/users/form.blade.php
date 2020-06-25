<div class="row mt-3">
	<div class="col-2 form-group d-flex flex-column pr-4">
		<img class="w-100 rounded-circle" src="{{ asset('storage/' . $user->image) }}">
	</div>
	<div class="col-10 form-group d-flex flex-column">
		<label for="image">Profile Image</label>
		<input type="file" name="image" class="py-3">
		<div>{{ $errors->first('image') }}</div>
	</div>
</div>

<div class="form-group">
	<label for="name">Name</label>
	<input class="form-control" type="text" name="name" value="{{ old('name') ?? $user->name }}">

	<div>{{ $errors->first('name') }}</div>
</div>

<div class="form-group">
	<label for="email">Email</label>
	<input class="form-control" type="email" name="email" value="{{ old('email') ?? $user->email }}">

	<div>{{ $errors->first('email')}}</div>
</div>

<div class="form-group">
	<label for="email">About</label>
	<input class="form-control" type="about" name="about" value="{{ old('about') ?? $user->about }}">

	<div>{{ $errors->first('about')}}</div>
</div>

<div class="form-group">
	<label for="roles[]">Roles</label>
	@foreach ($roles as $role)
		<div class="form-check">
			<input type="checkbox" name="roles[]" value="{{ $role->id }}" {{ $user->roles->pluck('id')->contains($role->id) ? 'checked' : '' }}>
			<label>{{ $role->name }}</label>
		</div>
	@endforeach
	<div>{{ $errors->first('roles[]')}}</div>
</div>

@csrf