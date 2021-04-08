<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/preview.css') }}">
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
