<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name'     => 'menna salah',
            'email'    => 'mennasalah@gmail.com',
            'password' => Hash::make('123456789'),
        ]);
    
       $user= User::create([
            'first_name'     => 'sohila',
            'last_name'      =>'salah',
            'phonenumber'=>'01010309819',
            
            'email'    => 'sohila@gmail.com',
            'password' => Hash::make('123456789'),

        ]);
        DB::table('carts')->insert([
            'user_Id'=> $user->id
        ]);
        
        DB::table('wishlist')->insert([
            'user_Id'=> $user->id
        ]);
        //
        
        DB::table('types')->insert([
            'name'     => 'Women'
        ]);
        
        DB::table('types')->insert([
            'name'     => 'Men'
        ]);
        
        DB::table('types')->insert([
            'name'     => 'Kids'
        ]);
    }
}
