@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('articles.index') }}">Article</a>
        </li>
        <li class="breadcrumb-item active">Detail</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('coreui-templates::common.errors')
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Details</strong>
                            <a href="{{ route('articles.index') }}" class="btn btn-light">Back</a>
                        </div>
                        <style>
                            .w-1 {
                                width: 100%
                            }

                            .preview-container {
                                width: 50%;
                                background-color: #E5E5E5;
                                padding: 20px;
                                position: relative;
                            }

                            .top-right-corner {
                                position: absolute;
                                top: 0;
                                right: 0;
                            }
                        </style>
                        <div class="card-body">
                            <div class="d-flex flex-row justify-content-center ">
                                <div class="preview-container rounded">
                                    <img src="{{ asset('images/top-right.svg') }}" class="top-right-corner">
                                    <div class="d-flex flex-row justify-content-between my-5 px-3">
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
                                            <button class="btn btn-danger float-right mr-5">CHECK IT NOW</button>
                                        </div>
                                        <div class="col-12 shadow p-3 mb-5 bg-white rounded">
                                            <img src="{{ asset($article->image) }}" class="w-1">
                                            <h3>{{ $article->title }}</h3>
                                            {!! $article->body !!}
                                        </div>
                                        @foreach ($article->contents as $content)
                                            <div class="col-6">
                                                <div class="shadow p-3 mb-5 bg-white rounded">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
