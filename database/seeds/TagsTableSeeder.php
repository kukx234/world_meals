<?php

use Illuminate\Database\Seeder;
use App\Models\Language;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Tag::class,10)->create();
    }
}
