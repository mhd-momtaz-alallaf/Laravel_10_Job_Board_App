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
        Schema::create('employers', function (Blueprint $table) {
            $table->id();

            $table->string('company_name');
            $table->foreignIdFor(\App\Models\User::class) // some users will be the owners of the company, and some will be a job seeker, so this forignid is nullable (optional).
                ->nullable()->constrained();

            $table->timestamps();
        });

        Schema::table('jobs', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\Employer::class)->constrained(); // modify the jobs table to add the employer foreignId.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->dropForeignIdFor(\App\Models\Employer::class); // drop the employer foreignId on the kobs table first
        });

        Schema::dropIfExists('employers'); // then drobe the employers table
    }
};
