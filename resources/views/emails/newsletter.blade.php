<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            width: 70%;
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
        }

        .header {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            padding: 35px;
        }

        .header-right {
            color: #fff;
            z-index: 1;
            width: 120px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .globe {
            width: 28px;
            height: 28px;
        }

        .intro {
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .intro-title {
            text-align: center;
            text-transform: uppercase;
        }

        .subtitle {
            font-size: 30px;
            font-weight: 600;
            color: #231f20;
        }

        .head-title {
            font-size: 55px;
            font-weight: 900;
            color: #bd3d31;
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
            line-height: 27px;
            font-weight: 500;
            text-align: center;
            text-transform: uppercase;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.12),
                0px 2px 5px rgba(0, 0, 0, 0.16);
        }

        .news-section {
            margin: 20px;
        }

        .top-divider {
            display: flex;
            flex-direction: row;
            align-items: center;
        }

        .divider-title {
            flex-grow: 0;
            margin-right: 20px;
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

        .news-image {
            width: 100%;
            max-height: 244px;
            object-fit: cover;
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

    </style>
    <title>Article Preview</title>
</head>

<body>
    <div class="container">
        <div class="preview-container">
            <img src="{{ asset('images/top-right.png') }}" class="top-right-corner">
            <div class="header">
                <img src="{{ asset('images/artpower-logo.png') }}">
                <div class="header-right">
                    <img src="{{ asset('images/globe.png') }}" class="globe"><span> Visit website</span>
                </div>
            </div>
            <div class="intro">
                <div class="intro-title">
                    <div class="subtitle">Powerful and safe</div>
                    <div class="head-title">server hosting</div>
                </div>
                <p>It is a long established fact that a reader will be distracted by the readable content of a page when
                    looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                    distribution.</p>
                <button class="btn">Check it now</button>
            </div>
            <div class="news-section">
                <div class="top-divider">
                    <div class="divider-title subtitle">art power updates</div>
                    <div class="divider"></div>
                </div>
                <div class="head-title">Latest News</div>
            </div>
            <div class="news">
                <div class="card shape-{{ $article->shape == 2 ? 'half' : 'full' }}">
                    <img src="{{ asset($article->image) }}" class="news-image">
                    <div class="news-text">
                        <p class="news-title">{{ $article->title }}</p>
                        <div class="news-desc">{!! $article->body !!}</div>
                    </div>
                </div>
                @foreach ($contentFull as $full)
                    <div class="card shape-full">
                        <img src="{{ asset($full->image) }}" class="news-image">
                        <div class="news-text">
                            <p class="news-title">{{ $full->title }}</p>
                            <div class="news-desc">{!! $full->body !!}</div>
                        </div>
                    </div>
                @endforeach
                @foreach ($contentHalf as $half)
                    <div class="card shape-half">
                        <img src="{{ asset($half->image) }}" class="news-image">
                        <div class="news-text">
                            <p class="news-title">{{ $half->title }}</p>
                            <div class="news-desc">{!! $half->body !!}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</body>

</html>
