<?php
class EmailController
{
    private EmailService $svc;

    public function __construct(EmailService $svc)
    {
        $this->svc = $svc;
    }

    public function send(): void
    {
        header('Content-Type: application/json');
        $in = json_decode(file_get_contents('php://input'), true) ?: $_POST;
        if (!isset($in['to'], $in['subject'], $in['template'])) {
            http_response_code(400);
            echo json_encode(['error'=>'Missing parameters']);
            exit;
        }
        $ok = $this->svc->send(
            $in['to'],
            $in['subject'],
            $in['template'],
        );
        echo json_encode(['sent'=>$ok]);
    }
}
