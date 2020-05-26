<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CommentsSend extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $comment;
    public $article;

    public function __construct($comment, $article)
    {
        //
        $this->comment = $comment;
        $this->article = $article;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('abdollahghasemi10@gmail.com')
            ->subject('اکانت شما دریافت شد')
            ->view('mails.comment')->with([
                'ArticleTitle' => $this->article->name,
                'CommentBody' => $this->comment->body,
                'UserName' => $this->comment->name,
            ]);


    }

}
