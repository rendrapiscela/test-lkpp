<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Membuat role admin jika belum ada
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        // Membuat user admin
        $admin = User::firstOrCreate([
            'name' => 'Admin',
            'email' => 'pusdatin@lkpp.go.id',
            'password' => Hash::make('pusdatin') // Ganti 'password' dengan password yang diinginkan
        ]);

        // Mengassign role admin ke user admin
        $admin->assignRole($adminRole);

        // Membuat role guest jika belum ada
        $guestRole = Role::firstOrCreate(['name' => 'guest']);

        // Membuat user admin
        $admin = User::firstOrCreate([
            'name' => 'Guest',
            'email' => 'guest1@lkpp.go.id',
            'password' => Hash::make('pusdatin') // Ganti 'password' dengan password yang diinginkan
        ]);

        // Mengassign role admin ke user admin
        $admin->assignRole($guestRole);
    }
}
