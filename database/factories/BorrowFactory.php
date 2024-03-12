<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Librarian;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Borrow>
 */
class BorrowFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $statusOptions = ['PENDING', 'ACCEPTED', 'REJECTED', 'RETURNED'];
        $status = fake()->randomElement($statusOptions);
        $requestProcessedAt = ($status === 'PENDING') ? null : fake()->dateTimeBetween('-1 month', 'now');

        return [
            'reader_id' => random_int(1, 4),
            'book_id' => random_int(1, 100),
            'status' => $status,
            'request_processed_at' => ($status == "PENDING") ? null : $requestProcessedAt,
            'request_managed_by' => ($status == "PENDING") ? null : 1,
            'deadline' => ($status == 'PENDING' || $status == 'REJECTED') ? null : fake()->dateTimeBetween($requestProcessedAt , ' +2 weeks'),
            'returned_at' => ($status == 'RETURNED') ? fake()->dateTimeBetween($requestProcessedAt, 'now') : null,
            'return_managed_by' => ($status == 'RETURNED') ? 1 : null,
        ];
    }
}
