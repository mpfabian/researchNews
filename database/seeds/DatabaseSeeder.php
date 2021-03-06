<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(InvestigationGroupsTableSeeder::class);
        $this->call(ProjectsTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(UnitsTableSeeder::class);
        $this->call(PublicationsTableSeeder::class);
        $this->call(ResearchersTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        
    }
}
