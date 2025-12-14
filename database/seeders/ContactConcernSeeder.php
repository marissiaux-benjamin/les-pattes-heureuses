<?php

namespace Database\Seeders;

use App\Models\Animal;
use App\Models\Contact;
use App\Models\ContactConcern;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactConcernSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $contacts = Contact::all()->count();
        ContactConcern::factory(10)->create(['contact_id' => random_int(0, $contacts)]);
    }
}
