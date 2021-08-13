<?php

namespace Database\Seeders;

use App\Models\Login;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Seeder;

class DemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Tenant::factory()->count(3)->create();

        foreach (Tenant::all() as $tenant) {

            User::factory()->count(5)->create();

            foreach (User::all() as $user) {
                Login::create([
                    'user_id' => $user->id,
                    'tenant_id' => $tenant->id,
                ]);
            }
        }

        // administrator
        User::factory()->count(1)->create([
            'email' => 'admin@admin.com',
        ]);

        $tenant = Tenant::first();
        $admin = User::where('email', '=', 'admin@admin.com')->first();
        Login::create([
            'user_id' => $admin->id,
            'tenant_id' => $tenant->id,
        ]);

    }
}
