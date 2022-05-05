<?php

namespace App;

class Data
{
    public ?string $nullableString;
    public string $nonNullableString;
    public ?Nested $nullableObject;
    public Nested $nonNullableObject;
}
