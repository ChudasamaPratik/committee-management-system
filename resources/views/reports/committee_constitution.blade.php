<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Committee Constitution Report</title>
    <style>
        section{
            font-size: 11pt;
            text-align: justify;
        }
        img{
            width: 100%
        }
        @page {
            margin-top: 145px;
            margin-bottom: 75px;
        }
        section{
            /* margin-left: 38; */
            margin-left: 32;
            margin-right: 32;
            /* margin-left: 96px;
            margin-right: 96px; */
        }
        header {
            position: fixed;
            top: -100;
            padding-left: 14px;
            padding-top: 9px;
            padding-right: 2px;
            /* position: fixed; left: 0px; top: -180px; right: 0px; height: -10px !important; */
        }
        footer {
            position: fixed;
            bottom: -25;
            /* position: fixed; left: 0px; top: -180px; right: 0px; height: -10px !important; */
        }
        /* footer { position: fixed; left: 0px; bottom: -180px; right: 0px; height: 150px; } */
    </style>
</head>
<body>
    <header>
        <img src="data:image/png;base64,<?php echo base64_encode(file_get_contents("header.jpg")) ?>" alt="">
    </header>
    <footer>
        <img src="data:image/png;base64,<?php echo base64_encode(file_get_contents("footer.jpg")) ?>" alt="">
    </footer>
    <section>
        <div>
            <div style="float:left;">
                AU/Reg/2023/
            </div>
            <div style="float:right;">
                Date: {{date('d-M-Y')}}
            </div>
            <div style="clear: both"></div>
        </div>
        <p style="text-align: center; margin-top: 41px; text-decoration: underline; font-size: 14pt; font-weight: bold;">Office Order</p>
        <p>
            In connection with reference of the &lt;&lt;Reference>>; dated <b>{{date('d-M-Y', strtotime($committee->effect_date))}}</b>, the following members are nominated to be a part of '<b>{{$committee->name}}</b>' of Atmiya University.
        </p>
        <table>
            <thead>
                <tr>
                    <th>Sr.</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Role</th>
                    <th>Remarks</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$chairPerson->id}}</td>
                    <td>{{$chairPerson->name}}</td>
                    <td>{{$chairPerson->designation}}</td>
                    <td>Chairman</td>
                    <td></td>
                </tr>
                <tr>
                    <td>{{$secratory->id}}</td>
                    <td>{{$secratory->name}}</td>
                    <td>{{$secratory->designation}}</td>
                    <td>Member Secretary</td>
                    <td></td>
                </tr>
                @foreach ($members as $member)
                    <tr>
                        <td>{{$member->id}}</td>
                        <td>{{$member->name}}</td>
                        <td>{{$member->designation}}</td>
                        <td>Member</td>
                        <td></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <p>The Committee will commence its functions with immediate effect & shall meet at-least <b>{{$committee->meeting_frequency}}</b>. The quorum for the same shall be of 50%. The committee shall meet with the following objectives and other objectives as per the need. The committee shall report to the undersigned.</p>
        </section>
    <style>
        table{
            margin-top: 35px;
            width: 100%;
            border-spacing: 0;
        }
        
        thead{
            background: #bfbfbf;
        }
        
        td, th{
            height: 25px;
            min-width: 30px;
        }

        table, td, th{
            border: 1px solid rgb(96, 96, 96);
        }
    </style>
</body>
</html>