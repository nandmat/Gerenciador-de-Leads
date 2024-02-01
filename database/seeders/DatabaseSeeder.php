<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\ContactHistory;
use App\Models\Lead;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Lead::factory(150)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        foreach (Lead::all() as $lead) {
            $lead->created_at = now()->subDays(150 - $lead->id);


            if ($lead->id % 2 == 0) {
                $lead->last_contact = now();
                $lead->status = 'success';
                ContactHistory::create([
                    'user_id' => 1,
                    'lead_id' => $lead->id,
                    'contact_date' => $lead->last_contact,
                    'resume' => fake()->text(50)
                ]);

                ContactHistory::create([
                    'user_id' => 1,
                    'lead_id' => $lead->id,
                    'contact_date' => now()->subDays(4),
                    'resume' => fake()->text(50)
                ]);

                ContactHistory::create([
                    'user_id' => 1,
                    'lead_id' => $lead->id,
                    'contact_date' => now()->subDays(5),
                    'resume' => fake()->text(50)
                ]);

                ContactHistory::create([
                    'user_id' => 1,
                    'lead_id' => $lead->id,
                    'contact_date' => now()->subDays(9),
                    'resume' => fake()->text(50)
                ]);
            }

            if($lead->id >= 70 && $lead->id < 97){
                $lead->status = 'failed';
            }

            $lead->save();
        }
    }
}
