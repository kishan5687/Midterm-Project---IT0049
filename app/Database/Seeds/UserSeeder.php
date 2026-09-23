<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'username'   => 'admin',
            'full_name'  => 'System Administrator',
            // password_hash ensures security compliance outlined in the instructions
            'password'   => password_hash('password123', PASSWORD_DEFAULT),
            'avatar'     => null,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        // Simple Queries logic to place data directly into the users table
        $this->db->table('users')->insert($data);
    }
}
