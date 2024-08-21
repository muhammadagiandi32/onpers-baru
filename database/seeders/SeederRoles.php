<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Category;
use Illuminate\Support\Str;

class SeederRoles extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Category::create([
            'id' => Str::uuid(),
            'name' => 'Adv',
        ]);
        // Buat role jika belum ada
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $userRole = Role::firstOrCreate(['name' => 'user']);

        // Buat permission jika belum ada
        $editArticlesPermission = Permission::firstOrCreate(['name' => 'edit articles']);
        $deleteArticlesPermission = Permission::firstOrCreate(['name' => 'delete articles']);

        // Assign permission ke role
        $adminRole->givePermissionTo($editArticlesPermission);
        $adminRole->givePermissionTo($deleteArticlesPermission);

        // Assign role ke user tertentu
        $user = User::find(1); // Gantilah ID ini sesuai dengan pengguna yang dimaksud
        if ($user) {
            $user->assignRole($adminRole);
        }
    }

    public function down()
    {
        // Hapus role dan permission
        $adminRole = Role::where('name', 'admin')->first();
        $userRole = Role::where('name', 'user')->first();

        if ($adminRole) {
            $adminRole->delete();
        }

        if ($userRole) {
            $userRole->delete();
        }

        $editArticlesPermission = Permission::where('name', 'edit articles')->first();
        $deleteArticlesPermission = Permission::where('name', 'delete articles')->first();

        if ($editArticlesPermission) {
            $editArticlesPermission->delete();
        }

        if ($deleteArticlesPermission) {
            $deleteArticlesPermission->delete();
        }
    }
}
