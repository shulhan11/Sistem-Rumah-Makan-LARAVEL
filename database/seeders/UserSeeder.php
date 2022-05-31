<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => '$2y$10$8iB2nQhrMVbb3Vp7hemi6etQ.fo0ZxuCN.u3eU.gWjRgjTR80wa0q',
            'is_admin' => true
        ]);
    }
}
