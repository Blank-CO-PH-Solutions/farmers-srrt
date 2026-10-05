<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Type\Decimal;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("service_requests", function (Blueprint $table) {
            $table->id();
            $table->string("reference_number")->unique();
            $table->foreignId("farmer_id")->constrained("users");
            $table
                ->foreignId("service_types_id")
                ->constrained("service_types");
            $table
                ->foreignId("current_office_id")
                ->constrained("offices")
                ->nullable();

            $table->text("description");
            $table->boolean("is_calamity")->default(false);
            $table->string("priority")->default("normal");
            $table
                ->enum("status", [
                    "submitted",
                    "validated",
                    "routed",
                    "under_review",
                    "referred",
                    "resolved",
                    "closed",
                    "rejected",
                    "cancelled",
                ])
                ->default("submitted");

            $table->decimal("latitude", 10, 7)->nullable();
            $table->decimal("longitude", 10, 7)->nullable();

            $table->timestamp("submitted_at")->nullable();
            $table->timestamp("resolved_at")->nullable();
            $table->timestamp("closed_at")->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("service_requests");
    }
};
