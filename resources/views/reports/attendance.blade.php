<html>

<head>
    <title>{{ $title }} - Report</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style>
        @page {
            margin: 100px 25px;
        }

        #page-count:after {
            content: counter(page) " Pages";
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
        }

        header {
            position: fixed;
            top: -80px;
            left: 0px;
            right: 0px;
            height: 50px;
        }

        footer {
            position: fixed;
            bottom: -80px;
            left: 0px;
            right: 0px;
            height: 50px;
        }

        td {
            vertical-align: middle !important;
        }

        th {
            background-color: #d9d9d9;
        }

        .table-bordered td,
        .table-bordered th {
            border: 1px solid black;
        }

        .table td,
        .table th {
            padding: 5px !important;
        }

        .text-center {
            text-align: center !important
        }

        .mt-5,
        .my-5 {
            margin-top: 3rem !important
        }

        h4 {
            margin-bottom: 0.5rem;
            font-family: inherit;
            font-weight: 500;
            line-height: 1.2;
            font-size: 1.5rem;
        }

        table {
            border-collapse: collapse
        }

        th {
            text-align: inherit
        }

        .mt-1,
        .my-1 {
            margin-top: .25rem !important
        }

        .table {
            width: 100%;
            max-width: 100%;
            margin-bottom: 1rem;
        }
    </style>
</head>

<body>
    <header>
        <img src="data:image/png;base64,<?php echo base64_encode(file_get_contents('header.jpg')); ?>" alt="" width="110%" style="margin-left: -20px">
        <hr style="background-color:black;margin-top: -2px">
    </header>
    <footer>
        <div id="page-count" style="margin-left: 680px"></div>
        <hr style="background-color:black;">
        <img src="data:image/png;base64,<?php echo base64_encode(file_get_contents('footer.jpg')); ?>" alt="" width="100%" style="margin-top: -14px">
    </footer>
    
    <main>
        <h4 class="text-center mt-5"><u>{{ $title }}</u></h4>
        <section class="">
            <table class="table table-bordered mt-1">
                <tr>
                    <th width="25%">Committee Name</th>
                    <td colspan="3">{{ $committee[0]->committee_name }}</th>
                </tr>
                <tr>
                    <th>Meeting No.</th>
                    <td colspan="3">{{ $committee[0]->meeting_number }}</th>
                </tr>
                <tr>
                    <th>Date</th>
                    <td width="30%">{{ date('d-m-Y', strtotime($committee[0]->time)) }}</th>
                    <th width="10%" class="text-center">Time</th>
                    <td>
                        {{ date('h:i:s', strtotime($committee[0]->time)) }}
                    </td>
                </tr>
                <tr>
                    <th>Venue</th>
                    <td colspan="3">{{ $committee[0]->venue }}</th>
                </tr>
            </table>
        </section>

        <p><b>Member List</b></p>

        <section>
            <table class="table table-bordered" style="margin-bottom: -40px">
                <thead style="border-bottom-color: black !important">
                    <tr class="text-center">
                        <th width="5%">Sr.</th>
                        <th width="35%">Name</th>
                        <th>Designation</th>
                        <th>Signature</th>
                        <th>Remarks</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($members as $key => $member)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $member->name }}</td>
                            <td>{{ $member->designation }}</td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </main>

</body>

</html>
