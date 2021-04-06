<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        img {
            vertical-align: middle;
            border-style: none;
        }

        .w-1 {
            width: 100%
        }

        .container {
            display: flex;
            justify-content: center;
            max-width: 1140px;
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }

        .preview-container {
            width: 100%;
            background-color: #E5E5E5;
            padding: 20px;
            position: relative;
        }

        .top-right-corner {
            position: absolute;
            top: 0;
            right: 0;
        }

        .rounded {
            border-radius: .25rem;
        }

        .header {
            display: flex;
            justify-content: space-between;
            margin: 3rem 0;
            padding: 0 1rem;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            margin-right: 15px;
            margin-left: -15px;
        }

        .col-12, .col-6 {
            position: relative;
            width: 100%;
            min-height: 1px;
            padding-right: 15px;
            padding-left: 15px;
        }

        .col-12 {
            flex: 0 0 100%;
            max-width: 100%;
        }

        .col-6 {
            flex: 0 0 47%;
            max-width: 47%;
        }

        .mb-5 {
            margin-bottom: 3rem;
        }

        .p-3 {
            padding: 1rem;
        }

        .px-5 {
            padding: 0 3rem;
        }

        .text-center {
            text-align: center;
        }

        .check-btn {
            color: #fff;
            background-color: #BD3D31;
            border-color: #b21f2d;
            float: right;
            display: inline-block;
            font-weight: 400;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            border: 1px solid transparent;
            padding: .375rem .75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: .25rem;
            transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
            cursor: pointer;
            text-transform: none;
            margin-right: 3rem;
        }

        .card-shadow {
            box-shadow: 0 .5rem 1rem rgba(0,0,0,.15);
            background-color: #fff;
        }

    </style>
</head>

<body>
    <div class="container">
        <div class="preview-container rounded">
            <img src="{{ asset('images/top-right.svg') }}" class="top-right-corner">
            <div class="header">
                <img src="{{ asset('images/artpower-logo.svg') }}">

                <div style="color: #fff; z-index: 1">
                    <img src="{{ asset('images/globe.svg') }}"> Visit website
                </div>
            </div>
            <div class="row">
                <div class="col-12 mb-5">
                    <div class="text-center">
                        <h3>POWERFUL AND SAFE</h3>
                        <h1 style="color: #BD3D31">SERVER HOSTING</h1>
                    </div>
                    <p class="px-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod maxime deleniti nam consequuntur incidunt nobis aut enim soluta. Et magnam quidem inventore deserunt delectus magni voluptatibus numquam, architecto saepe! Temporibus.</p>
                    <button class="check-btn">CHECK IT NOW</button>
                </div>
                <div class="col-12 ">
                    <div class="card-shadow p-3 mb-5 rounded">
                        <img src="{{ asset($article->image) }}" class="w-1">
                        <h3>{{ $article->title }}</h3>
                        {!! $article->body !!}
                    </div>
                </div>
                @foreach ($article->contents as $content)
                    <div class="col-6">
                        <div class="card-shadow p-3 mb-5 rounded">
                            @if ($content->image)
                                <img src="{{ asset($content->image) }}" class="w-1">
                            @endif
                            <h3>{{ $content->title }}</h3>
                            {!! $content->body !!}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</body>

</html>
