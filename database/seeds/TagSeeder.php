<?php

use App\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            'vegetariano',
            'carne',
            'piatto veloce',
            'slow food',
            'pesce',
            'senza glutine',
            'italiano',
            'fit'
        ];

        foreach($tags as $tag) {
            $new_tag = new Tag(); 
            $new_tag->name = $tag;
            $new_tag->slug = Str::slug($tag);
            $new_tag->save();
        }
    }
}
