<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article Preview</title>
</head>

<body>
    <div style="display: flex;
    justify-content: center;
    background-color: #e5e5e5;
    padding: 20px;">
        <div style="
        width: 680px;
        padding: 0 60px;
        position: relative;
        border-radius: 40px;
        background-color: #fff;">
            <img src="{{ asset('images/top-right.png') }}" style="position: absolute;
            top: 0;
            right: 0;
            z-index: 0;
            width: 340px;
            height: 256px;
            border-radius: 0 40px 0 0;">
            <div style="display: flex;
            justify-content: space-between;
            margin-top: 60px;">
                <img src="{{ asset('images/artpower-logo.png') }}" style="margin-left: -30px;">
                <a href="http://167.172.191.132" style="color: #fff;
                z-index: 1;
                width: 120px;
                display: flex;
                justify-content: space-between;
                align-items: center;
                text-decoration: none;" target="_blank">
                    <div style="color: #fff;
                    z-index: 1;
                    width: 120px;
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    text-decoration: none;">
                        <img src="{{ asset('images/globe.png') }}" style="width: 28px;
                        height: 28px;"><span> Visit website</span>
                    </div>
                </a>
            </div>
            <div style="display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 395px;
            position: relative;
            margin-top: 90px;">
                <div style="text-align: center;
                text-transform: uppercase;
                position: relative;
                margin-bottom: 75px;">
                    <div style="font-size: 25px;
                    font-weight: 600;
                    color: #231f20;
                    text-transform: uppercase;">{{ $article->subtitle }}</div>
                    <div style="font-size: 40px;
                    font-weight: bold;
                    color: #bd3d31;
                    text-transform: uppercase;">{{ $article->title }}</div>
                </div>
                @if ($article->image)
                    <img src="{{ asset($article->image) }}" style="width: 100%;
                    max-height: 244px;
                    object-fit: cover;">
                @endif
                <div style="align-self: flex-start;
                position: relative;
                font-size: 18px;">{!! $article->body !!}</div>
                <a href="{{ $article->link }}" style="width: 260px;
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
                        0px 2px 5px rgba(0, 0, 0, 0.16);">{{ $article->link_text }}</a>
            </div>
            <div style="margin-bottom: 30px;">
                <div style="display: flex;
                flex-direction: row;
                align-items: center;">
                    <div style="flex-grow: 0;
                    margin-right: 20px;
                    text-transform: uppercase;font-size: 25px;
                    font-weight: 600;
                    color: #231f20;
                    text-transform: uppercase;">{{ $article->content_subtitle }}</div>
                    <div style="flex-grow: 1;
                    height: 1px;
                    background-color: rgba(35, 31, 32, 0.12);"></div>
                </div>
                <div style="font-size: 40px;
                font-weight: bold;
                color: #bd3d31;
                text-transform: uppercase;">{{ $article->content_title }}</div>
            </div>
            <div style="display: flex;
            flex-wrap: wrap;
            justify-content: space-between;">
                @foreach ($contentFull as $full)
                    <div style=" box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            background-color: #fff;
            border-radius: 8px;
            margin-bottom: 10px;width: 100%;">
                        @if ($full->image)
                            <a href="{{ $full->link }}">
                                <img src="{{ asset($full->image) }}" style="width: 100%;
                                max-height: 244px;
                                object-fit: cover; border-radius: 8px 8px 0 0;">
                            </a>
                        @endif
                        <div style="padding: 0 20px;">
                            <p style="font-weight: bold;
            font-size: 24px;
            line-height: 22px;
            color: #0c1014;">{{ $full->title }}</p>
                            <div style="font-weight: normal;
            font-size: 16px;
            line-height: 22px;
            color: rgba(35, 31, 32, 0.54);">{!! $full->body !!}</div>
                        </div>
                    </div>
                @endforeach
                @foreach ($contentHalf as $half)
                    <div style=" box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            background-color: #fff;
            border-radius: 8px;
            margin-bottom: 10px;width: 49%;">
                        @if ($half->image)
                            <a href="{{ $half->link }}">
                                <img src="{{ asset($half->image) }}" style="width: 100%;
                                max-height: 244px;
                                object-fit: cover; border-radius: 8px 8px 0 0;">
                            </a>
                        @endif
                        <div style="padding: 0 20px;">
                            <p style="font-weight: bold;
            font-size: 24px;
            line-height: 22px;
            color: #0c1014;">{{ $half->title }}</p>
                            <div style="font-weight: normal;
            font-size: 16px;
            line-height: 22px;
            color: rgba(35, 31, 32, 0.54);">{!! $half->body !!}</div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div style="margin-top: 70px;
            border-top: 1px #dfe1e4 solid;
            padding: 20px;
            font-size: 14px;
            color: #b1bcc0;
            text-align: center;">
                If you prefer not to receive emails like this, you may <a href="#"
                    style="color: #c5554b;">unsubscribe</a>
                (c) 2021 ArtPower. All rights reserved.
                <div style="display: flex;
                padding: 20px;
                justify-content: center;">
                    <a href="#">
                        <img src="{{ asset('images/twitter.png') }}" style="margin: 0 15px;">
                    </a>
                    <a href="#">
                        <img src="{{ asset('images/facebook.png') }}" style="margin: 0 15px;">
                    </a>
                    <a href="#">
                        <img src="{{ asset('images/instagram.png') }}" style="margin: 0 15px;">
                    </a>
                    <a href="#">
                        <img src="{{ asset('images/youtube.png') }}" style="margin: 0 15px;">
                    </a>
                    <a href="#">
                        <img src="{{ asset('images/linkedin.png') }}" style="margin: 0 15px;">
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
