<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;


class DatabaseSeeder extends Seeder

{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Eliminar registros
        Storage::deleteDirectory('articles');
        Storage::deleteDirectory('categories');
        //CREAR DIRECTORIOS
        Storage::makeDirectory('articles');
        Storage::makeDirectory('categories');

        //Llamar al seeder
        $this->call([
            UserSeeder::class,
        ]);

        //Factories
        Category::factory(8)->create();
        Article::factory(20)->create();
        Comment::factory(20)->create();
    }
}
