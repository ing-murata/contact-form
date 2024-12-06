<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InquiryNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $contact;

    public function __construct(array $contact)
    {
        $this->contact = $contact;
    }

    public function build()
    {
        return $this->subject('お問い合わせがありました')
                    ->view('emails.inquiry')
                    ->with([
                        'inquiry' => $this->contact,  // テンプレートに渡すデータのキーを確認
                    ]);
    }
}
