<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

function sendCustomerMail(string $to, string $subject) {
    $content = apply_filters('inrage/mail-content', 'email.quote', [
        'title' => 'My Sweat Title',
    ]);

    wp_mail($to, $subject, $content);
}

Route::post('/contact', function () {
    $mail = wp_mail(
        'dyosby237@gmail.com',
        'Test Email',
        'This is a test email from WordPress.'
    );
//    var_dump($mail);

    return response()->json([
        'message' => 'Message sent.',
    ]);
})->name('contact');

