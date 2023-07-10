<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id_user';
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $allowedFields    = ['name_user', 'username', 'id_bg', 'email_user', 'password_user', 'role', 'info_user'];
    protected $useTimestamps = true;

    protected $validationRules = [
        'name_user'   => 'required',
        'username' => 'required',
        'id_bg' => 'required',
        'password_user' => 'required',
        'password_user2' => 'required|matches[password_user]',
        'role' => 'required',
    ];
    protected $validationMessages = [
        'name_user' => [
            'required' => 'Nama harus dipilih.',
            'min_length' => 'Nama minimal 3 karakter.',
        ],
        'username' => [
            'required' => 'Username jobdesk harus diisi.',
            'min_length' => 'Nama minimal 3 karakter.',
        ],
        'id_bg' => [
            'required' => 'Bagian harus dipilih.',
        ],
        'password_user' => [
            'required' => 'Password harus diisi.',
            'min_length' => 'Password minimal 5 karakter.',
        ],
        'password_user2' => [
            'required' => 'Password harus diisi.',
            'matches' => 'Password berbeda.',
        ],
        'role' => [
            'required' => 'Role harus dipilih.',
        ],
    ];

    function getAll()
    {
        $builder = $this->db->table('users');
        $builder->join('unit_kerja', 'unit_kerja.id_uk = bagian.id_uk');
        $query   = $builder->get();
        return $query->getResult();
    }
    function getAll2()
    {
        $builder = $this->db->table('users');
        $builder->join('bagian', 'bagian.id_bg = users.id_bg');
        $query   = $builder->get();
        return $query->getResult();
    }
}
