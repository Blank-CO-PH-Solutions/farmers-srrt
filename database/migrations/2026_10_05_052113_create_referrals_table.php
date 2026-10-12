<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("referrals", function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId("service_request_id")
                ->constrained("service_requests");

            $table
                ->foreignId("from_office_id")
                ->constrained("offices");
            $table
                ->foreignId("to_office_id")
                ->constrained("offices");

            $table
                ->foreignId("referred_by")
                ->constrained("users");

            $table->text("reason");
            $table->enum("status", ["pending", "accepted", "completed", "rejected"]);

            $table->timestamp('accepted_at')->nullable();
            $table->timestamp('completed_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("referrals");
    }
};
