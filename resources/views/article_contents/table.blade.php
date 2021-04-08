<div class="table-responsive-sm">
    <table class="table table-striped" id="articleContents-table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Sort</th>
                <th>Link</th>
                <th>Shape</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articleContents as $articleContent)
                <tr>
                    <td>{{ $articleContent->title }}</td>
                    <td>{{ $articleContent->sort }}</td>
                    <td>{{ $articleContent->link }}</td>
                    <td>{{ $articleContent->shape == 2 ? 'Half' : 'Full' }}</td>
                    <td>
                        {!! Form::open(['route' => ['articles.articleContents.destroy', $article, $articleContent->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('articles.articleContents.show', [$article, $articleContent->id]) }}"
                                class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                            <a href="{{ route('articles.articleContents.edit', [$article, $articleContent->id]) }}"
                                class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                            {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
