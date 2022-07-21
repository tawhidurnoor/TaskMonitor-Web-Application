<?php

use App\PriceTier;
use App\Subscription;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionPriceTiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscription_price_tiers', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Subscription::class);
            $table->foreignIdFor(PriceTier::class);
            $table->double("tier_price", 6,1);
            $table->string('description')->nullable();
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
        Schema::dropIfExists('subscription_price_tiers');
    }
}
