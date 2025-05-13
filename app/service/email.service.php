<?php
class EmailService
{
    private string $from;
    private string $replyTo;
    private string $templatesPath;

    public function __construct(string $from, string $replyTo, string $templatesPath)
    {
        $this->from          = $from;
        $this->replyTo       = $replyTo;
        $this->templatesPath = $templatesPath;
    }

    public function send(string $to, string $subject, string $template): bool
    {
        ob_start();
        include $this->templatesPath . $template . '.php';
        $body = ob_get_clean();

        $headers  = "From: {$this->from}\r\n";
        $headers .= "Reply-To: {$this->replyTo}\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

        return mail($to, $subject, $body, $headers);
    }
}
