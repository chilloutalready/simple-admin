<?php namespace Chilloutalready\SimpleAdmin\Database;

use Hash;
use Illuminate\Database\Seeder;
use Chilloutalready\SimpleAdmin\Models\Administrator;

class AdministratorsTableSeeder extends Seeder
{

	public function run()
	{
		Administrator::truncate();

		$default = [
			'username' => 'admin',
			'email' => 'admin@admin.com',
			'password' => Hash::make('password'),
			'name'     => 'Administrator'
		];

		try
		{
			Administrator::create($default);
		} catch (\Exception $e)
		{
		}
	}

}