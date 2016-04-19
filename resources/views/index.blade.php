<!DOCTYPE html>
<html>
<head>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
    <title>One Page Output</title>
    <style>
        #content{
            border: solid black thin;
            max-width: 700px;
            min-height: 70%;
            padding: 5px;
        }
    </style>
</head>
<body>
    <div id="container">
        <div id="content">
         <div id="title">Output</div><br value="">
         @if(!file_exists(storage_path('app/frontpage.blade.php')))
         <form action="/" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <table>
                <tr>
                    <td>University name</td>
                    <td><input name="universityName" value=""></input></td>
                </tr>
                <tr>
                    <td>Cost center ID</td>
                    <td>
                        <select name="costCenter">
                            @for ($i = 1; $i <= 27; $i++)
                            <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Front page message</td>
                    <td><textarea name="frontPageMessage" value=""></textarea></td>
                </tr>
                <tr>
                    <td>Welcome message</td>
                    <td><textarea name="welcomeMessage" value=""></textarea></td>
                </tr>
                <tr>
                    <td>Academic message</td>
                    <td><textarea name="academicMessage" value=""></textarea></td>
                </tr>
                <tr>
                    <td>Ticket message</td>
                    <td><textarea name="ticketMessage" value=""></textarea></td>
                </tr>
                <tr>
                    <td>Other service message</td>
                    <td><textarea name="otherServiceMessage" value=""></textarea></td>
                </tr>
            </table>
            <button>Output</button>
        </form>
        @else
        <p>the file found</p>
        <form action="/" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <table>
                <tr>
                    <td>University name</td>
                    <td><input name="universityName" value=""></input></td>

                </tr>
                <tr>
                    <td>Cost center ID</td>
                    <td>
                        <select  name="costCenter">
                            @for ($i = 1; $i <= 27; $i++)
                            <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Front page message</td>
                    <td><textarea name="frontPageMessage">{{Storage::get('frontpage.blade.php')}}</textarea></td>
                </tr>
                <tr>
                    <td>Welcome message</td>
                    <td><textarea name="welcomeMessage" value="">{{Storage::get('welcome.blade.php')}}</textarea></td>
                </tr>
                <tr>
                    <td>Academic message</td>
                    <td><textarea name="academicMessage" value="">{{Storage::get('academic.blade.php')}}</textarea></td>
                </tr>
                <tr>
                    <td>Ticket message</td>
                    <td><textarea name="ticketMessage" value="">{{Storage::get('ticket.blade.php')}}</textarea></td>
                </tr>
                <tr>
                    <td>Other service message</td>
                    <td><textarea name="otherServiceMessage" value="">{{Storage::get('otherservice.blade.php')}}</textarea></td>
                </tr>
            </table>
            <button>Output</button>
        </form>
        @endif
    </div>
</div>
</body>

<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<script type="text/javascript">

</script>

</html>
