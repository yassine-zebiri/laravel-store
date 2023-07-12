<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\CardsRows;
use App\Models\Categorie;
use App\Models\CategoriesProduct;
use App\Models\Products;
use App\Models\ProductStore;
use App\Models\Rows;
use App\Models\Sliders;
use App\Models\store;
use Database\Factories\CategoriesProductFactory;
use Database\Factories\ProductStoreFactory;
use Database\Factories\RowsFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * :Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name'=>'yassine',
            'email'=>'yassine@aa.com',
            'password'=>bcrypt('0796047166'),
        ]);
       // \App\Models\User::factory(10)->create();

        //CategoriesProduct::factory(3)->create();
      /*   $categorie= CategoriesProduct::factory()->create([
            'name'=>'نظارات رجالية',
            'path_pic'=>'images/b1.png'
        ]);
        Products::factory(3)->create(
            ['categorie_id'=>$categorie->id]
        );
        Rows::factory()->create(
            ['title'=>'خاص للصيف']
        ); */

        /* CardsRows::factory()->create(
            
                [
                    'product_id'=>'4',
                    'row_id'=>'2'
                ]
            
        ); */


       // ProductStore::factory(10)->create(['categorie_id'=>$categorie->id]);
        //CategoriesProductFactory
        //ProductStoreFactory::factoryForModel(ProductStore::class);
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        /* Rows::factory()->create([
            'title'=>'نظارات للصيف'
        ]); */

        //Sliders::factory(4)->create();
    }
}
