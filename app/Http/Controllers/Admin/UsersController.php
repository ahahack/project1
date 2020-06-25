<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class UsersController extends Controller {

	public function index(Role $role) {

		$users = User::all();

		$roles = Role::all();

		return view('admin.users.index', compact('users', 'role'));
	}

	public function edit(User $user) {

		$roles = Role::all();
		return view('admin.users.edit', compact('user', 'roles'));
	}

	public function update(User $user, Request $request) {

		$roles = Role::all();

		$user->update($this->validateRequest());

		$this->storeImage($user);

		$user->roles()->sync($request->roles);

		return redirect('admin/users');
	}

	public function destroy(User $user) {
		$user->delete();
		$user->roles()->detach();
		return redirect('admin/users');
	}

	private function validateRequest() {

		return tap(request()->validate([
			'name' => 'required|min:3',
			'email' => 'required|email',
			'about' => 'required',

		]), function () {

			if (request()->hasFile('image')) {
				request()->validate([
					'image' => 'required|image|max:5000',
				]);
			}

		});

	}

	private function storeImage($user) {

		if (request()->has('image')) {
			$user->update([
				'image' => request()->image->store('uploads', 'public'),
			]);

			$image = Image::make(public_path('storage/' . $user->image))->fit(300, 300, null);
			$image->save();
		}

	}

}
