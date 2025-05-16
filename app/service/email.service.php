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
        $this->templatesPath = rtrim($templatesPath, '/') . '/';
    }

    public function send(string $to, string $subject, string $template, array $variables = []): bool
    {
        $templateFile = $this->templatesPath . $template . '.php';
        if (!file_exists($templateFile)) {
            throw new RuntimeException("Template '$template' not found.");
        }

        extract($variables);
        ob_start();
        include $templateFile;
        $body = ob_get_clean();

        $headers  = "From: {$this->from}\r\n";
        $headers .= "Reply-To: {$this->replyTo}\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

        return mail($to, $subject, $body, $headers);
    }
}

