<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $translator->get('nearata-maintenance-mode.views.default.title') }}</title>
    <style>
        .site {
            display: grid;
            justify-content: center;
            justify-items: center;
            gap: 1rem;
            text-align: center;
        }

        .logo {
            width: 140px;
        }
    </style>
</head>

<body>
    <div class="site">
        <div class="logo">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                <path d="M216 186.7c-23.9 13.8-40 39.7-40 69.3L32 256C14.3 256-.2 241.6 2 224.1C10.7 154 47.8 92.7 101.3 52c14.1-10.7 33.8-5.3 42.7 10l72 124.7zM256 336c14.6 0 28.2-3.9 40-10.7l72 124.8c8.8 15.3 3.7 35.1-12.6 41.9c-30.6 12.9-64.2 20-99.4 20s-68.9-7.1-99.4-20c-16.3-6.9-21.4-26.6-12.6-41.9l72-124.8c11.8 6.8 25.4 10.7 40 10.7zm224-80l-144 0c0-29.6-16.1-55.5-40-69.3L368 62c8.8-15.3 28.6-20.7 42.7-10c53.6 40.7 90.6 102 99.4 172.1c2.2 17.5-12.4 31.9-30 31.9zM256 208a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
            </svg>
        </div>
        <h1>{{ $translator->get('nearata-maintenance-mode.views.default.header') }}</h1>
        <div class="content">{!! $translator->get('nearata-maintenance-mode.views.default.body') !!}</div>
    </div>
</body>

</html>
