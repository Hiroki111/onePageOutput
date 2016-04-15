<?php

namespace App\Http\Controllers;

use Symfony\Component\Yaml\Parser;

class PageController extends Controller
{
    public function index()
    {
        $yaml = new Parser();

        $value = $yaml->parse(file_get_contents('app.yaml'));

        dd($value);
        return view('index', [
            'yamlValue' => $value,
        ]);
    }
}
