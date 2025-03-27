<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use App\Services\FirebaseService;

class AdminSeeder extends Seeder
{
    protected $firebase;

    public function __construct(FirebaseService $firebase)
    {
        $this->firebase = $firebase->getDatabase();
    }

    public function run()
    {
        // Store in MySQL
        $admin = Admin::create([
            'email' => 'admin4.ewheels@gmail.com',
            'password' => Hash::make('admin123'),
        ]);

        // Store in Firebase Realtime Database
        $this->firebase->getReference('admins/' . $admin->id)->set([
            'email' => $admin->email,
            'password' => $admin->password,
        ]);
    }
}
