<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('Todo')->insert([
            [
                'judul' => 'Belajar Laravel',
                'isi' => 'Mengerjakan Proyej To-Do List',
                'tanggal' => now(),
                'status' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Belajar React',
                'isi' => 'Mengerjakan Proyek API catch',
                'tanggal' => now(),
                'status' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Belajar React Native',
                'isi' => 'Mengerjakan Proyek web film',
                'tanggal' => now(),
                'status' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
