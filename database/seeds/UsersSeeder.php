<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder {

	public function run() {
		// factory(\App\User::class, 1)->create();

		User::truncate();
		DB::table('role_user')->truncate();

		$adminRole = Role::where('name', 'admin')->first();
		$userRole = Role::where('name', 'user')->first();

		$admin = User::create([
			'name' => 'Bogdan Sy',
			'email' => 'b.syniachenko@gmail.com',
			'email_verified_at' => now(),
			'about' => 'Laravel 7, Yii2, Vue.js',
			'image' => '/uploads/avatar.jpg',
			'password' => bcrypt('1234567890'),
			'remember_token' => Str::random(10),
		]);

		$user = User::create([
			'name' => 'John Doe',
			'email' => 'johndoe@gmail.com',
			'email_verified_at' => now(),
			'image' => '/uploads/default.jpg',
			'password' => bcrypt('1234567890'), // password
			'remember_token' => Str::random(10),
		]);

		$admin->roles()->attach($adminRole);
		$user->roles()->attach($userRole);

		DB::table('role_user')->insert([
			['role_id' => '1',
				'user_id' => '1'],
			['role_id' => '2',
				'user_id' => '2'],
		]);
	}
}
