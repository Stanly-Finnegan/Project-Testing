<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Ramsey\Uuid\Uuid;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'uuid' => Uuid::uuid4(),
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => password_hash('123', PASSWORD_BCRYPT),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => null,
            'deleted_at' => null

        ];

        $this->db->table('user_ms')->insert($data);
    }
}
