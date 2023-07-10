<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        // insert 1 data
        // $data = [
        //     'name_user' => 'Administrator',
        //     'email_user' => 'admin@admin.com',
        //     'password_user' => password_hash('123456', PASSWORD_BCRYPT)
        // ];
        // $this->db->table('users')->insert($data);

        // insert multi data
        $data = [
            [
                'name_user' => 'Adi Abdillah',
                'email_user' => 'adi@adi.com',
                'password_user' => password_hash('123456', PASSWORD_BCRYPT)
            ],
            [
                'name_user' => 'admin',
                'email_user' => 'admin@admin.com',
                'password_user' => password_hash('admin', PASSWORD_BCRYPT)
            ],
        ];
        $this->db->table('users')->insertBatch($data);
    }
}
