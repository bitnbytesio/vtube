<?php

use Illuminate\Database\Seeder;

class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try{
        	App\Models\UserRole::truncate();
        	App\Models\User::truncate();
        	App\Models\Role::truncate();
    	} catch(Exception  $e) {

    	}
        

        App\Models\Role::insert([
        		['name' => 'Super Admin', 'key' => 'super_admin'],
        		['name' => 'Admin', 'key' => 'admin'],
        		['name' => 'Member', 'key' => 'member']
        	]);

       
    }
}
