<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

         // $this->call(UsersTableSeeder::class);

         $this->truncarTablas([
            "eventos", "clientes", "boletos",
         ]);

        $this->call(eventosSeeder::class);
        $this->call(clientesSeeder::class);
        $this->call(boletosSeeder::class);
    }

    private function truncarTablas(array $tables){
        DB::statement("SET FOREIGN_KEY_CHECKS = 0;");
        foreach($tables as $table){
            DB::table($table)->truncate();
        }
        DB::statement("SET FOREIGN_KEY_CHECKS = 1;");
    }
    
}
