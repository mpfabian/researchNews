<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class,75)->create()->each(function(App\User $user){
            $user->products()->attach([
                rand(1,10),
                rand(11,20),
                rand(21,30),
                rand(31,40)
            ]);

            $user->investigation_groups()->attach([
                rand(1,10),
                rand(11,20),
                rand(21,30),
            ]);

            $user->projects()->attach([
                rand(1,10),
                rand(11,20),
                rand(21,30),
            ]);
        });

        App\User::create([
            'email' => 'carlos.mena@alumnos.ucn.cl',
            'password' => bcrypt('pichiconcaca'),
            'userType' => 'Administrador'
        ]);

        App\User::create([
            'email' => 'ignacio.miranda01@alumnos.ucn.cl',
            'password' => bcrypt('elcarlosselacome'),
            'userType' => 'Administrador'
        ]);

        App\User::create([
            'email' => 'ignacio.santander@alumnos.ucn.cl',
            'password' => bcrypt('toypensando'),
            'userType' => 'Administrador'
        ]);

        App\User::create([
            'email' => 'fmp009@alumnos.ucn.cl',
            'password' => bcrypt('pichiconcaca2'),
            'userType' => 'Administrador'
        ]);

        App\User::create([
            'email' => 'eduardo.alvarez@alumnos.ucn.cl',
            'password' => bcrypt('novoyalajunta'),
            'userType' => 'Administrador'
        ]);

    }
}