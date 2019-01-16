<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>NK Carcassonne</title>
<link rel="stylesheet" type="text/css" href="{{ asset('DataTables/datatables.min.css') }}">
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<!-- Your custom styles (optional) -->
<link href="{{ asset('css/mdb.min.css') }}" rel="stylesheet">

<link href="{{ asset('css/style.min.css') }}" rel="stylesheet">

<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

{!! NoCaptcha::renderJs() !!}