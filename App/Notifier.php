<?php

namespace App;

use App\Core\Singleton;

class Notifier
{
    use Singleton;

    public function notify($subject, $body) {
        $message = \Swift_Message::newInstance()
            ->setSubject($subject)
            ->setFrom(['robot@example.com' => 'Your website notifier'])
            ->setTo('scorp7mix@gmail.com')
            ->setBody($body);

        $transport = \Swift_SmtpTransport::newInstance('mail.freelines.ru', 25);

        \Swift_Mailer::newInstance($transport)->send($message);
    }
}
