<?php

namespace App\Controller;

use App\Data;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class TestController extends AbstractController
{
    #[Route(path: "/test")]
    public function test(SerializerInterface $serializer): Response
    {
        $data = [
            // No exceptions: ok!
            'nullableString'    => null,
            'nullableObject'    => null,

            // Raises exception: ok!
            // 'nonNullableString' => null,

            // No exception, empty object assigned: wrong!
            'nonNullableObject' => null,
        ];
        $json = json_encode($data);

        $obj = $serializer->deserialize($json, Data::class, 'json');

        dd($json, $obj);
    }
}
