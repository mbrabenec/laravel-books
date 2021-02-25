<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Book;

class OldBooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $books = DB::table('old_books')->get();

        foreach($books as $book) {

            $bk = $book->title;

            if(Book::where('title', $bk )->first()) {

            } else {

                $b = new Book;
                $b['title'] = $book->title;
                $b['authors'] = " ";
                $b['publisher_id'] = $book->publisher_id;
                $b->save();
            }

        }
    }
}
