<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BookActionNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct($book, $action)
    {
        $this->book = $book;
        $this->action = $action;
    }

    public function via($notifiable)
    {
        return ['database']; // Simpan ke database
    }

    public function toArray($notifiable)
    {
        return [
            'message' => $this->action == 'borrowed' 
                ? 'Anda berhasil meminjam buku: ' . $this->book->title 
                : 'Terima kasih telah mengembalikan buku: ' . $this->book->title,
            'book_id' => $this->book->id,
            'time' => now()
        ];
    }
}
