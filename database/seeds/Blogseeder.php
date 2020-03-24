<?php

use Illuminate\Database\Seeder;

class Blogseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        for ($i = 1; $i<100; $i++){
//            DB::table('blog')->insert([
//                'titulo' => Str::random(10),
//                'contenido' => Str::random(30),
//                'fecha_creacion' => date('Y-m-d'),
//                'imagen' => 'slide-'.$i.'.jpg',
//                'autor' => Str::random(10).'@gmail.com',
//            ]);
//        }
         DB::table('blog')->truncate();
        factory(App\Blog::class, 500)->create();
    }
}
