<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Import DB Facade jika ingin truncate
use Carbon\Carbon;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        // Opsional: Kosongkan table sebelum seed ulang agar tidak duplikat
        // DB::table('books')->truncate(); 

        $books = [
            // --- KATEGORI: IT & PROGRAMMING (1-8) ---
            ['title' => 'Mastering Laravel 10: From Zero to Hero', 'writer' => 'Taylor Otwell', 'publisher' => 'Laravel Press', 'publication_year' => 2023, 'stock' => 12],
            ['title' => 'Clean Code: A Handbook of Agile Software Craftsmanship', 'writer' => 'Robert C. Martin', 'publisher' => 'Prentice Hall', 'publication_year' => 2008, 'stock' => 5],
            ['title' => 'The Pragmatic Programmer', 'writer' => 'Andrew Hunt', 'publisher' => 'Addison-Wesley', 'publication_year' => 2019, 'stock' => 7],
            ['title' => 'JavaScript: The Good Parts', 'writer' => 'Douglas Crockford', 'publisher' => 'O\'Reilly Media', 'publication_year' => 2008, 'stock' => 10],
            ['title' => 'Belajar Otodidak MySQL', 'writer' => 'Budi Raharjo', 'publisher' => 'Informatika', 'publication_year' => 2022, 'stock' => 15],
            ['title' => 'Algoritma dan Struktur Data', 'writer' => 'Rinaldi Munir', 'publisher' => 'Informatika Bandung', 'publication_year' => 2020, 'stock' => 20],
            ['title' => 'Head First HTML and CSS', 'writer' => 'Elisabeth Robson', 'publisher' => 'O\'Reilly Media', 'publication_year' => 2012, 'stock' => 8],
            ['title' => 'Pro DevOps with Google Cloud', 'writer' => 'Pierluigi Riti', 'publisher' => 'Apress', 'publication_year' => 2018, 'stock' => 4],

            // --- KATEGORI: NOVEL INDONESIA & TERJEMAHAN (9-16) ---
            ['title' => 'Laskar Pelangi', 'writer' => 'Andrea Hirata', 'publisher' => 'Bentang Pustaka', 'publication_year' => 2005, 'stock' => 25],
            ['title' => 'Bumi Manusia', 'writer' => 'Pramoedya Ananta Toer', 'publisher' => 'Lentera Dipantara', 'publication_year' => 1980, 'stock' => 10],
            ['title' => 'Cantik Itu Luka', 'writer' => 'Eka Kurniawan', 'publisher' => 'Gramedia Pustaka Utama', 'publication_year' => 2002, 'stock' => 6],
            ['title' => 'Laut Bercerita', 'writer' => 'Leila S. Chudori', 'publisher' => 'KPG', 'publication_year' => 2017, 'stock' => 14],
            ['title' => 'Pulang', 'writer' => 'Tere Liye', 'publisher' => 'Republika', 'publication_year' => 2015, 'stock' => 18],
            ['title' => 'Hujan', 'writer' => 'Tere Liye', 'publisher' => 'Gramedia Pustaka Utama', 'publication_year' => 2016, 'stock' => 20],
            ['title' => 'Harry Potter and the Sorcerer\'s Stone', 'writer' => 'J.K. Rowling', 'publisher' => 'Scholastic', 'publication_year' => 1997, 'stock' => 9],
            ['title' => 'Dunia Sophie', 'writer' => 'Jostein Gaarder', 'publisher' => 'Mizan', 'publication_year' => 1991, 'stock' => 11],

            // --- KATEGORI: PENGEMBANGAN DIRI (17-22) ---
            ['title' => 'Atomic Habits', 'writer' => 'James Clear', 'publisher' => 'Penguin Random House', 'publication_year' => 2018, 'stock' => 30],
            ['title' => 'The Psychology of Money', 'writer' => 'Morgan Housel', 'publisher' => 'Harriman House', 'publication_year' => 2020, 'stock' => 22],
            ['title' => 'Filosofi Teras', 'writer' => 'Henry Manampiring', 'publisher' => 'Penerbit Buku Kompas', 'publication_year' => 2018, 'stock' => 28],
            ['title' => 'Sebuah Seni untuk Bersikap Bodo Amat', 'writer' => 'Mark Manson', 'publisher' => 'Grasindo', 'publication_year' => 2016, 'stock' => 19],
            ['title' => 'Rich Dad Poor Dad', 'writer' => 'Robert T. Kiyosaki', 'publisher' => 'Plata Publishing', 'publication_year' => 1997, 'stock' => 13],
            ['title' => 'Sapiens: A Brief History of Humankind', 'writer' => 'Yuval Noah Harari', 'publisher' => 'Harvill Secker', 'publication_year' => 2011, 'stock' => 7],

            // --- KATEGORI: KOMIK & MANGA (23-30) ---
            ['title' => 'One Piece Vol. 100', 'writer' => 'Eiichiro Oda', 'publisher' => 'Elex Media Komputindo', 'publication_year' => 2021, 'stock' => 15],
            ['title' => 'Naruto Vol. 72', 'writer' => 'Masashi Kishimoto', 'publisher' => 'Elex Media Komputindo', 'publication_year' => 2015, 'stock' => 12],
            ['title' => 'Detektif Conan Vol. 99', 'writer' => 'Gosho Aoyama', 'publisher' => 'Elex Media Komputindo', 'publication_year' => 2021, 'stock' => 10],
            ['title' => 'Attack on Titan Vol. 34', 'writer' => 'Hajime Isayama', 'publisher' => 'Elex Media Komputindo', 'publication_year' => 2021, 'stock' => 8],
            ['title' => 'Demon Slayer: Kimetsu no Yaiba Vol. 1', 'writer' => 'Koyoharu Gotouge', 'publisher' => 'Elex Media Komputindo', 'publication_year' => 2016, 'stock' => 14],
            ['title' => 'Jujutsu Kaisen Vol. 0', 'writer' => 'Gege Akutami', 'publisher' => 'Elex Media Komputindo', 'publication_year' => 2018, 'stock' => 16],
            ['title' => 'Spy x Family Vol. 1', 'writer' => 'Tatsuya Endo', 'publisher' => 'Elex Media Komputindo', 'publication_year' => 2019, 'stock' => 20],
            ['title' => 'Blue Lock Vol. 1', 'writer' => 'Muneyuki Kaneshiro', 'publisher' => 'Elex Media Komputindo', 'publication_year' => 2018, 'stock' => 18],
        ];

        // Tambahkan timestamp otomatis ke setiap data
        foreach ($books as &$book) {
            $book['created_at'] = Carbon::now();
            $book['updated_at'] = Carbon::now();
            // Cover null dulu biar rapi (nanti bisa diupload manual lewat fitur Edit)
            $book['cover'] = null; 
        }

        // Insert massal biar cepat
        Book::insert($books);
    }
}