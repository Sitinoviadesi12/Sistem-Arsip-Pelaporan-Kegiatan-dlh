<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class KontakPesan extends Mailable
{
    use Queueable, SerializesModels;

    public string $nama;
    public string $email;
    public string $subjek;
    public string $pesan;

    public function __construct(string $nama, string $email, string $subjek, string $pesan)
    {
        $this->nama = $nama;
        $this->email = $email;
        $this->subjek = $subjek;
        $this->pesan = $pesan;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '[SIAPK-DLH] ' . $this->subjek,
            replyTo: [$this->email],
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.kontak',
        );
    }
}
