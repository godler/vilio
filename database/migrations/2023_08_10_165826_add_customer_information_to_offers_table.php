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
        Schema::table('offers', function (Blueprint $table) {
            $table->foreignId('customer_id')->nullable()->change();
            $table->string('customer_name');
            $table->string('phone_number')->nullable();
            $table->string('email')->nullable();
            $table->boolean('is_company')->default(false);
            $table->string('tax_number')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('post_code')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('offers', function (Blueprint $table) {
            $table->dropColumn('customer_name');
            $table->dropColumn('phone_number');
            $table->dropColumn('email');
            $table->dropColumn('is_company');
            $table->dropColumn('tax_number');
            $table->dropColumn('address');
            $table->dropColumn('city');
            $table->dropColumn('post_code');
        });
    }
};
