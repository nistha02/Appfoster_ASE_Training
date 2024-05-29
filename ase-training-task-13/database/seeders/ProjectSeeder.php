<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all users from the database
        $users = User::all();

        foreach ($users as $user) {
            // Generate a random number of projects for each user (between 1 and 3)
            $numProjects = rand(1, 3);

            for ($i = 0; $i < $numProjects; $i++) {
                Project::create([
                    'title' => 'Project ' . ($i + 1) . ' for ' . $user->name,
                    'user_id' => $user->id,
                    'description' => 'Description for Project ' . ($i + 1),
                    // Add more fields as needed
                ]);
            }
        }
    }
}
