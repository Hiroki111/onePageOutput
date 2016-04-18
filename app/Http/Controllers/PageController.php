<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use Symfony\Component\Yaml\Dumper;
use Symfony\Component\Yaml\Parser;

class PageController extends Controller
{

    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        return view('index');
    }

    public function output()
    {

        $yamlParser = new Parser();
        $yaml       = $yamlParser->parse(file_get_contents('app.yaml'));

        $yaml['settings']['university'] = $this->request->input('universityName', '');
        $yaml['settings']['costcentre'] = intval($this->request->input('costCenter', ''));

        $dumper = new Dumper();
        $dumper->setIndentation(2);

        $yaml = $dumper->dump($yaml, 6);
        $yaml = str_replace("'", "", $yaml);
        file_put_contents('dummy/app.yaml', $yaml);

        $frontPageMessage    = "Front page message " . $this->request->input('frontPageMessage', '') . "\n";
        $welcomeMessage      = "Welcome message " . $this->request->input('welcomeMessage', '') . "\n";
        $academicMessage     = "Academic message " . $this->request->input('academicMessage', '') . "\n";
        $ticketMessage       = "Ticket message " . $this->request->input('ticketMessage', '') . "\n";
        $otherServiceMessage = "Other service message " . $this->request->input('otherServiceMessage', '') . "\n";

        $allMessages = $frontPageMessage . $welcomeMessage . $academicMessage . $ticketMessage . $otherServiceMessage;

        Storage::disk('local')->put('test.blade.php', $allMessages);
        //Directory ... storage/app/public
        return view('index');
    }
}
