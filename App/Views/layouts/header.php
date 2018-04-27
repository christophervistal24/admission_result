<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Name of system | <?= $data['title'] ?? ''?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <script
        src="http://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
        <script>
        $(document).ready(function(){
        var input = $('#write_code').val();
        var output = $.trim(input);
        $('#write_code').val(output);
        });
        </script>
    </head>
    <body>