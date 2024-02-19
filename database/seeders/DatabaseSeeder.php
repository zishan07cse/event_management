<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        // \App\Models\User::factory(10)->create();
        \App\Models\User::factory()->create([
            'name' => 'Arif Rizvee',
            'email' => 'zishan@gmail.com',
            'password'=>bcrypt('12345678'),
            'type'=>'1'
        ]);

        // \App\Models\Categories::factory()->create([
        //     'name' => 'Sports',
        //     'note' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        //     'status'=>'active',
        //     'type'=>'1'
        // ]);  
        // DB::table('categories')->insert([
        //     'name' => 'Sports',
        //     'note' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        //     'status'=>'0',
        // ]);

        // DB::table('speakers')->insert([
        //     'name' => 'Test',
        //     'image'=>'',
        //     'description'=>'Lorem Ipsum is simply dummy text',
        //     'mobile'=>'+8801825414747',
        //     'address'=>'Dhaka,Bangladesh',
        //     'email' => 'test@gmail.com',
        //     'status'=>'0',
        // ]);
        // DB::table('venues')->insert([
        //     'venue_name' => 'Test',
        //     'venue_image'=>'',
        //     'venue_address'=>'Dhaka,Bangladesh',
        // ]);
        // DB::table('hotels')->insert([
        //         'hotel_name' => 'Test',
        //         'hotel_image'=>'',
        //         'hotel_address'=>'Dhaka,Bangladesh',
        //         'hotel_review'=>'3',
        //         'hotel_description'=>'loream ipsum',
        // ]);
    }
}
