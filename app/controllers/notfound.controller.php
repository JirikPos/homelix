<?php
class NotFoundController {
    public function index(): void
    {
        include __DIR__ . '/../views/stranka-nenalezena.php';
    }
}