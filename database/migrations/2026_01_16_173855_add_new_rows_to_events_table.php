<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->foreignId('id_organisation')
                ->nullable()
                ->constrained('organizations');

            $table->foreignId('id_event_type')
                ->nullable()
                ->constrained('type_events');

            $table->foreignId('id_place')
                ->nullable()
                ->constrained('places');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            //
        });
    }
};
