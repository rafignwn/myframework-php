<?php
    // use Symfony\Component\HttpFoundation\Response;
    // $response = new Response();
    $response->setContent(sprintf('Selamat Datang, %s', $response->get('nama')));
    // $response->send();
?>