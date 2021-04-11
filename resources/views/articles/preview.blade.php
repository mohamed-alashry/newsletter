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
