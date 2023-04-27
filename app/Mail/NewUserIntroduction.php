<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewUserIntroduction extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $subject = '新しいユーザーが追加されました';
    public User $toUser;
    public User $newUser;

    /**
     * Create a new message instance.本文
     */
    public function __construct(User $toUser,User $newUser)
    {
        $this->toUser=$toUser;
        $this->newUser=$newUser;
        //resourse/view/email/new_user_introduction.blade.phpを代入
        // return $this->view('email.new_user_introduction');//TEXT
        return $this->markdown('email.new_user_introduction');//HTML

    }

    /**
     * Get the message envelope.封筒、入れ物
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New User Introduction',
        );
    }

    /**
     * Get the message content definition.定義
     */
    public function content(): Content
    {
        return new Content(
            // view: 'view.name',
        );
    }

    /**
     * Get the attachments for the message.添付ファイル
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
    
    // public function build()
    // {
        
    // }
}
