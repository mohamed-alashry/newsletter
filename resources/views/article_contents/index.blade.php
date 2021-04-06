@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('articles.index') }}">Articles</a></li>
        <li class="breadcrumb-item">Contents</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                 <div class="col-lg-12">
                     <div class="card">
                         <div class="card-header">
                             <i class="fa fa-align-justify"></i>
                             Article Contents
                             <a class="pull-right" href="{{ route('articles.articleContents.create', $article) }}"><i class="fa fa-plus-square fa-lg"></i></a>
                         </div>
                         <div class="card-body">
                             @include('article_contents.table')
                              <div class="pull-right mr-3">

        @include('coreui-templates::common.paginate', ['records' => $articleContents])

                              </div>
                         </div>
                     </div>
                  </div>
             </div>
         </div>
    </div>
@endsection

