<?php

namespace App\Mail;

use App\Models\Article;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendNewsletter extends Mailable
{
    use Queueable, SerializesModels;

    public $article;
    public $contentFull;
    public $contentHalf;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($article, $contentFull, $contentHalf)
    {
        $this->article = $article;
        $this->contentFull = $contentFull;
        $this->contentHalf = $contentHalf;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->article->title ?? "Art Power Newsletter")
            ->view('emails.newsletter');
    }
}
