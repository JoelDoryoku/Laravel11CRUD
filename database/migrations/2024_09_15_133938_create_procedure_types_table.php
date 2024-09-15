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
        Schema::create('procedure_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // We will seed the table with some data inside migration for simplicity in this case study, but it is not recommended
        // We create a new procedure types ('Evento', 'Trámite', 'Reclamo')
        DB::table('procedure_types')->insert([
            ['name' => 'Evento', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Trámite', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Reclamo', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('procedure_types');
    }
};
