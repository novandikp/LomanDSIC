<?php

use App\Models\category;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonationProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donation_programs', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->double("target_amount");
            $table->double("total_amount");
            $table->date("target_date");
            $table->text("description");
            $table->foreignIdFor(category::class)->constrained();
            $table->foreignIdFor(User::class)->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donation_programs');
    }
}
