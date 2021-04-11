<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article Preview</title>
    <style>
        body {
            font-family: sans-serif;
        }

        .container {
            display: flex;
            justify-content: center;
            background-color: #e5e5e5;
            padding: 20px;
        }

        .preview-container {
            width: 40%;
            position: relative;
            border-radius: 40px;
            padding: 15px;
            background-color: #fff;
        }

        .top-right-corner {
            position: absolute;
            top: 0;
            right: 0;
            z-index: 0;
            border-radius: 0 40px 0 0;
        }

        .header {
            display: flex;
            justify-content: space-between;
            margin-top: 60px;
        }

        .logo {
            margin-left: -30px;
        }

        .header-right {
            color: #fff;
            z-index: 1;
            width: 120px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            text-decoration: none;
        }

        .globe {
            width: 28px;
            height: 28px;
        }

        .intro {
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 395px;
            position: relative;
            margin-top: 90px;
        }

        .intro::before {
            content: "";
            background-image: url({{ asset('images/bg.png') }});
            background-repeat: no-repeat;
            opacity: 0.03;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            position: absolute;
        }

        .intro-title {
            text-align: center;
            text-transform: uppercase;
            position: relative;
            margin-bottom: 75px;
        }

        .subtitle {
            font-size: 25px;
            font-weight: 600;
            color: #231f20;
            text-transform: uppercase;
        }

        .head-title {
            font-size: 40px;
            font-weight: bold;
            color: #bd3d31;
            text-transform: uppercase;
        }

        .intro-body {
            align-self: flex-start;
            position: relative;
            font-size: 18px;
        }

        .btn {
            width: 260px;
            height: 53px;
            align-self: flex-end;
            border: 0;
            border-radius: 137px;
            background-color: #bd3d31;
            color: #fff;
            font-size: 18px;
            line-height: 50px;
            font-weight: 500;
            text-align: center;
            text-transform: uppercase;
            text-decoration: none;
            cursor: pointer;
            position: relative;
            margin-top: 20px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.12),
                0px 2px 5px rgba(0, 0, 0, 0.16);
        }

        .news-section {
            margin-bottom: 30px;
        }

        .top-divider {
            display: flex;
            flex-direction: row;
            align-items: center;
        }

        .divider-title {
            flex-grow: 0;
            margin-right: 20px;
            text-transform: uppercase;
        }

        .divider {
            flex-grow: 1;
            height: 1px;
            background-color: rgba(35, 31, 32, 0.12);
        }

        .news {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .card {
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            background-color: #fff;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .shape-full {
            width: 100%;
        }

        .shape-half {
            width: 49%;
        }

        .image {
            width: 100%;
            max-height: 244px;
            object-fit: cover;
        }

        .news-image {
            border-radius: 8px 8px 0 0;
        }

        .news-text {
            padding: 0 20px;
        }

        .news-title {
            font-weight: bold;
            font-size: 24px;
            line-height: 22px;
            color: #0c1014;
        }

        .news-desc {
            font-weight: normal;
            font-size: 16px;
            line-height: 22px;
            color: rgba(35, 31, 32, 0.54);
        }

        .footer {
            margin-top: 70px;
            border-top: 1px #dfe1e4 solid;
            padding: 20px;
            font-size: 14px;
            color: #b1bcc0;
            text-align: center;
        }

        .social {
            display: flex;
            padding: 20px;
            justify-content: center;
        }

        .unsubscribe {
            color: #c5554b;
        }

        .social-icon {
            margin: 0 15px;
        }

        /* Small devices (portrait tablets and large phones, 600px and up) */
        @media only screen and (min-width: 600px) {}

        /* Medium devices (landscape tablets, 768px and up) */
        @media only screen and (min-width: 768px) {
            .preview-container {
                width: 680px;
                padding: 0 60px;
            }

            .top-right-corner {
                width: 340px;
                height: 256px;
            }
        }

    </style>
</head>

<body>
    <div class="container">
        <div class="preview-container">
            <img src="{{ asset('images/top-right.png') }}" class="top-right-corner">
            <div class="header">
                <img src="{{ asset('images/artpower-logo.png') }}" class="logo">
                <a href="http://167.172.191.132" class="header-right" target="_blank">
                    <div class="header-right">
                        <img src="{{ asset('images/globe.png') }}" class="globe"><span> Visit website</span>
                    </div>
                </a>
            </div>
            <div class="intro">
                <div class="intro-title">
                    <div class="subtitle">{{ $article->subtitle }}</div>
                    <div class="head-title">{{ $article->title }}</div>
                </div>
                @if ($article->image)
                    <img src="{{ asset($article->image) }}" class="image">
                @endif
                <div class="intro-body">{!! $article->body !!}</div>
                <a href="{{ $article->link }}" class="btn">{{ $article->link_text }}</a>
            </div>
            <div class="news-section">
                <div class="top-divider">
                    <div class="divider-title subtitle">{{ $article->content_subtitle }}</div>
                    <div class="divider"></div>
                </div>
                <div class="head-title">{{ $article->content_title }}</div>
            </div>
            <div class="news">
                @foreach ($contentFull as $full)
                    <div class="card shape-full">
                        @if ($full->image)
                            <a href="{{ $full->link }}">
                                <img src="{{ asset($full->image) }}" class="image news-image">
                            </a>
                        @endif
                        <div class="news-text">
                            <p class="news-title">{{ $full->title }}</p>
                            <div class="news-desc">{!! $full->body !!}</div>
                        </div>
                    </div>
                @endforeach
                @foreach ($contentHalf as $half)
                    <div class="card shape-half">
                        @if ($half->image)
                            <a href="{{ $half->link }}">
                                <img src="{{ asset($half->image) }}" class="image news-image">
                            </a>
                        @endif
                        <div class="news-text">
                            <p class="news-title">{{ $half->title }}</p>
                            <div class="news-desc">{!! $half->body !!}</div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="footer">
                If you prefer not to receive emails like this, you may <a href="#" class="unsubscribe">unsubscribe</a>
                (c) 2021 ArtPower. All rights reserved.
                <div class="social">
                    <a href="#">
                        <img src="{{ asset('images/twitter.png') }}" class="social-icon">
                    </a>
                    <a href="#">
                        <img src="{{ asset('images/facebook.png') }}" class="social-icon">
                    </a>
                    <a href="#">
                        <img src="{{ asset('images/instagram.png') }}" class="social-icon">
                    </a>
                    <a href="#">
                        <img src="{{ asset('images/youtube.png') }}" class="social-icon">
                    </a>
                    <a href="#">
                        <img src="{{ asset('images/linkedin.png') }}" class="social-icon">
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
