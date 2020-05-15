<?php

use Illuminate\Database\Seeder;
use App\Channel;

class channeltableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Channel::create([
            'name'=>'Laravel 7.0',
            'slug'=> 'Laravel 7.0'
        ]);

        Channel::create([
            'name'=>'Vue 3.0',
            'slug'=>'vue 3.0'
        ]);

        Channel::create([
            'name'=>'React js',
            'slug'=> 'react js'
        ]);

        Channel::create([
            'name'=>'Angualar js',
            'slug'=> 'Angular js'
        ]);
    }
}
