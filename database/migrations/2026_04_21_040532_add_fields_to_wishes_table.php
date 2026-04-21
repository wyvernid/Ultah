<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('wishes', function (Blueprint $table) {
            $table->string('name')->nullable()->change();
            $table->text('message')->nullable()->change();
            $table->string('hobby')->nullable()->after('name');
            $table->string('favorite_food')->nullable()->after('hobby');
            $table->string('favorite_color')->nullable()->after('favorite_food');
            $table->string('favorite_place')->nullable()->after('favorite_color');
            $table->string('favorite_friend')->nullable()->after('favorite_place');
            $table->string('favorite_partner')->nullable()->after('favorite_friend');
            $table->string('favorite_book')->nullable()->after('favorite_partner');
        });
    }

    public function down(): void
    {
        Schema::table('wishes', function (Blueprint $table) {
            $table->string('name')->nullable(false)->change();
            $table->text('message')->nullable(false)->change();
            $table->dropColumn([
                'hobby', 'favorite_food', 'favorite_color',
                'favorite_place', 'favorite_friend',
                'favorite_partner', 'favorite_book',
            ]);
        });
    }
};