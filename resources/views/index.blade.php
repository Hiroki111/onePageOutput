<!DOCTYPE html>
<html>
<head>
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
            <div id="title">Output</div><br>
            <table>
                <tr>
                    <td>University name</td>
                    <td><input name="universityName"></input></td>
                </tr>
                <tr>
                    <td>Cost center ID</td>
                    <td>
                        <select>
                            @for ($i = 1; $i <= 27; $i++)
                            <option name="costCenter" value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Front page message</td>
                    <td><textarea name="frontPageMessage"></textarea></td>
                </tr>
                <tr>
                    <td>Welcome message</td>
                    <td><textarea name="welcomeMessage"></textarea></td>
                </tr>
                <tr>
                    <td>Academic message</td>
                    <td><textarea name="academicMessage"></textarea></td>
                </tr>
                <tr>
                    <td>Ticket message</td>
                    <td><textarea name="ticketMessage"></textarea></td>
                </tr>
                <tr>
                    <td>Other service message</td>
                    <td><textarea name="otherServiceMessage"></textarea></td>
                </tr>
            </table>

            <button>Output</button>
        </div>
    </div>
</body>


<script type="text/javascript">
  //  yaml = require('js-yaml');
  //  fs   = require('fs');

  //   try {
  //       var doc = yaml.safeLoad(fs.readFileSync('app.yaml', 'utf8'));
  //     console.log(doc);
  // } catch (e) {
  //     console.log(e);
  // }
</script>

</html>
