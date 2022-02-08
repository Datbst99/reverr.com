<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            [
                'name' => 'system_admin',
            ],
            [
                'name' => 'admin_post',
            ],
            [
                'name' => 'admin_product',
            ]
        ];
        foreach($data as $val) {
            $role = Role::create($val);
        }
    }
}
