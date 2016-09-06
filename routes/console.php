<?php

use Illuminate\Foundation\Inspiring;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');


Artisan::command('vtube:install', function () {


    $nodeVer = trim(exec('node --version'));
    $this->comment("--{$nodeVer}--");
    $ver = substr($nodeVer, 1, stripos($nodeVer, '.')-1);

    if ($ver < 4) {
        throw new RuntimeException("Node is not installed or not in the path/Version is not supported.");
    }
    
    $this->comment("Installing node.js modules, Please wait...");
    $this->comment("Command: npm install");
    passthru("npm install", $return);

    if ($return > 0) {
        throw new RuntimeException("Unable to install node modules.");
    }

    $env = trim(exec('php artisan env'));

    // Clean up response to get the value we actually want
    $env = substr($env, strrpos($env, ' ') + 1);

    $envFlag = ($env === 'production') ? '--production' : '';

    $this->comment("Compiling assets, Please wait...");
    $this->comment("Command: gulp {$envFlag}");
    passthru("gulp {$envFlag}", $return);

    if ($return > 0) {
        throw new RuntimeException("Unable to install node modules.");
    }
    
    $this->comment("Installing vtube, Please wait...");
    $this->comment("Command: php artisan migrate");
    Artisan::call('migrate');
    $this->comment("Application migrated...");
    $this->comment("Command: php artisan db:seed");
    Artisan::call('db:seed');
    $this->comment("Application Seeded...");

    $name = $this->ask('What is your name?');
    $email = $this->ask('What is your email?');
    $username = $this->ask('Set username for admin login?');
    $password = $this->secret('Set password for admin login?');

     App\Models\User::insert([
        		['display_name' => $name, 'username' => $username, 'email' => $email, 'password' => bcrypt($password), 'created_at' => date('Y-m-d H:i:s')]
        	]);

    $this->comment("Assigning user role..."); 
    App\Models\UserRole::insert([
    		['user_id' => 1, 'role_id' => 1]
    	]);

    $this->comment("Installation completed...");
    
})->describe('Install vtube application');