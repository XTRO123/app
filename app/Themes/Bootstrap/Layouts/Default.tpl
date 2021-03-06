<!DOCTYPE html>
<html lang="{{ Language::code() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title or __d('bootstrap', 'Page') }} - {{ Config::get('app.name') }}</title>

    @assets('css', array(
        'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css',
        'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css',
        'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css',
        theme_url('css/style.css', 'Bootstrap'),
    ))

</head>
<body>

@section('header')

@show

<div class="container">

@section('content')
    {{ $content }}
@show

</div>

@section('footer')

@show

@assets('js', array(
    'https://code.jquery.com/jquery-1.12.4.min.js',
    'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'
))

<!-- DO NOT DELETE! - Forensics Profiler -->

</body>
</html>
