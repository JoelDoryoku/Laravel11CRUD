<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('dni');
            $table->timestamps();
        });

        // We will seed the table with some data inside migration for simplicity in this case study, but it is not recommended
        // We create a new clients ('Juan', 'Pérez', '12345678') and ('María', 'González', '87654321')
        DB::table('clients')->insert([
            ['firstname' => 'Juan', 'lastname' => 'Pérez', 'dni' => '12345678', 'created_at' => now(), 'updated_at' => now()],
            ['firstname' => 'María', 'lastname' => 'González', 'dni' => '87654321', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
