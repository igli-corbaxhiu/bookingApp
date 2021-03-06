<?php

namespace Database\Seeders;

use App\Models\User;
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
        $firstUser = User::create(
            [
                'name' => 'User',
                'surname' => 'User',
                'email' => 'user@gmail.com',
                'birthDate' => '1990-01-01',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            ]);
        $firstUser->assignRole('user');

        $secondUser = User::create(
            [
                'name' => 'Test',
                'surname' => 'Test',
                'email' => 'test@gmail.com',
                'birthDate' => '2007-01-01',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            ]);
        $secondUser->assignRole('user');

        $thirdUser = User::create(
            [
                'name' => 'Admin',
                'surname' => 'Admin',
                'email' => 'admin@gmail.com',
                'birthDate' => '1990-01-01',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            ]);
        $thirdUser->assignRole('admin');

        $fourthUser = User::create(
            [
                'name' => 'Test2',
                'surname' => 'Test2',
                'email' => 'test2@gmail.com',
                'birthDate' => '2001-01-01',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            ]);

        $fourthUser->assignRole('user');
    }
}
