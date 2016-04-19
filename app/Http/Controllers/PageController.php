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

        $frontPageMessage    = $this->request->input('frontPageMessage', '');
        $welcomeMessage      = $this->request->input('welcomeMessage', '');
        $academicMessage     = $this->request->input('academicMessage', '');
        $ticketMessage       = $this->request->input('ticketMessage', '');
        $otherServiceMessage = $this->request->input('otherServiceMessage', '');

        Storage::disk('local')->put('frontpage.blade.php', $frontPageMessage);
        Storage::disk('local')->put('welcome.blade.php', $welcomeMessage);
        Storage::disk('local')->put('academic.blade.php', $academicMessage);
        Storage::disk('local')->put('ticket.blade.php', $ticketMessage);
        Storage::disk('local')->put('otherservice.blade.php', $otherServiceMessage);

        return redirect('/');

    }
}
