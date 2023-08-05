<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Rating;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        Category::factory(10)->create();
        Brand::factory(10)->create();
        Product::factory(100)->create();
        ProductImage::factory(300)->create();
        Rating::factory(1000)->create();

        $roleUser = Role::factory()->create([
            'id' => 1,
            'name' => 'user'
        ]);

        $roleAdmin = Role::factory()->create([
            'id' => 2,
            'name' => 'admin'
        ]);

        $user = User::factory()->create([
            'id' => 50,
            'name' => 'Name',
            'email' => 'admin',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);

        RoleUser::factory()->create([
            'user_id' => 50,
            'role_id' => $roleAdmin->id
        ]);
    }
}
