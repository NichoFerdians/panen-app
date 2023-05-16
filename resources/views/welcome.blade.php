<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Datatable</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.21.4/dist/bootstrap-table.min.css">
</head>

<body>
    <table id="table"></table>

    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}

    <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.21.4/dist/bootstrap-table.min.js"></script>

    <script>
        $('#table').bootstrapTable({
            url: '/api/report',
            columns: [{
                field: 'user',
                title: 'User'
            }, {
                field: 'no_panen',
                title: 'No Panen'
            }, {
                field: 'blok',
                title: 'Blok'
            }, {
                field: 'metode',
                title: 'Metode'
            }, {
                field: 'hasil_panen.matang',
                title: 'Total Matang'
            }, {
                field: 'hasil_panen.mentah',
                title: 'Total Mentah'
            }]
        })
    </script>
</body>

</html>
