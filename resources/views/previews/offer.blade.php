<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>

    </title>
    <style>
     html {
        box-sizing: border-box;
        font-size: 16px;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif
        }
        body {
            padding:2rem;
        }

        *, *:before, *:after {
        box-sizing: inherit;
        }

         h1, h2, h3, h4, h5, h6, p {
        margin: 0;
        margin-bottom: 2rem;
        padding: 0;
        font-weight: normal;
        }

        ol, ul {
        /* list-style: none; */
        }

        img {
        max-width: 100%;
        height: auto;
        }
    </style>
    <style>
        {{ $styles }}
    </style>

</head>

<body class="font-sans antialiased">
    {!! $content !!}
    <script>
        const params = new URLSearchParams(window.location.search);

        if (params.get('print')) {
            window.print();
        }
    </script>
</body>

</html>
