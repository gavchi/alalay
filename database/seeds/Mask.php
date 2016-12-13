<?php

use Illuminate\Database\Seeder;

class Mask extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('masks')->delete();
        DB::update("ALTER TABLE masks AUTO_INCREMENT = 1;");
        \App\Mask::create([
            'name' => 'mask1'
        ]);
        \App\Mask::create([
            'name' => 'mask2'
        ]);
        \App\Mask::create([
            'name' => 'mask3'
        ]);
        \App\Mask::create([
            'name' => 'mask4'
        ]);
        \App\Mask::create([
            'name' => 'mask5'
        ]);
        \App\Mask::create([
            'name' => 'mask6'
        ]);
        \App\Mask::create([
            'name' => 'mask7'
        ]);
        \App\Mask::create([
            'name' => 'mask8'
        ]);
    }
}
