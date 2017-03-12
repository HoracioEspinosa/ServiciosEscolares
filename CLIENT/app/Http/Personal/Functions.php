<?php

namespace Caribbean\Http\Personal;

class Functions {
    private function tojson($data) {
        return json_decode($data, JSON_PRETTY_PRINT);
    }
}