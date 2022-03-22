<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comments;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comments::truncate();

        $comments = [
            [
                'book_id' => '1',
                'comments' => 'Nice Book',
            ],
            [
                'book_id' => '2',
                'comments' => 'Who knows...',
            ],
            [
                'book_id' => '3',
                'comments' => 'Ok',
            ],
            [
                'book_id' => '4',
                'comments' => 'Readable',
            ],
            [
                'book_id' => '5',
                'comments' => 'Could be better',
            ],
            [
                'book_id' => '6',
                'comments' => 'Excellen Book',
            ],
            [
                'book_id' => '1',
                'comments' => 'Great Book',
            ],
        ];
        Comments::insert($comments);

    }
}
