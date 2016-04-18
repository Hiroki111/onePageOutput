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

        $frontPageMessage    = '<p><strong style="display: block; color: #134471; font-size: 14px;">Front page message </strong>' . $this->request->input('frontPageMessage', '') . '</p>' . "\n";
        $welcomeMessage      = '<p><strong style="display: block; color: #134471; font-size: 14px;">Welcome message </strong>' . $this->request->input('welcomeMessage', '') . '</p>' . "\n";
        $academicMessage     = '<p><strong style="display: block; color: #134471; font-size: 14px;">Academic message </strong>' . $this->request->input('academicMessage', '') . '</p>' . "\n";
        $ticketMessage       = '<p><strong style="display: block; color: #134471; font-size: 14px;">Ticket message </strong>' . $this->request->input('ticketMessage', '') . '</p>' . "\n";
        $otherServiceMessage = '<p><strong style="display: block; color: #134471; font-size: 14px;">Other service message </strong>' . $this->request->input('otherServiceMessage', '') . '</p>' . "\n";

        $allMessages = $frontPageMessage . $welcomeMessage . $academicMessage . $ticketMessage . $otherServiceMessage;

        Storage::disk('local')->put('test.blade.php', $allMessages);
        //Directory ... storage/app/public
        return view('index', [
            'universityName'      => $this->request->input('universityName', ''),
            'costCenter'          => $this->request->input('costCenter', ''),
            'frontPageMessage'    => $this->request->input('frontPageMessage', ''),
            'welcomeMessage'      => $this->request->input('welcomeMessage', ''),
            'academicMessage'     => $this->request->input('academicMessage', ''),
            'ticketMessage'       => $this->request->input('ticketMessage', ''),
            'otherServiceMessage' => $this->request->input('otherServiceMessage', ''),
        ]);

        return redirect('/')->with('data', 'some kind of data');
    }
}
