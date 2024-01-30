<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;
class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $permissions =[
        "ADMIN", "CUSTOMER" , "MANAGER" , "SELLER"
       ];
       
       foreach($permissions as $permission){
        $savedPermission = Permission::where('name', $permission)->first();
        if(!$savedPermission){
            Permission::create([
                 'name' => $permission
             ]);
          }

        }

     }

 }
