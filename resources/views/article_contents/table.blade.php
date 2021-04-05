<div class="table-responsive-sm">
    <table class="table table-striped" id="articleContents-table">
        <thead>
            <tr>
                <th>Article</th>
                <th>Title</th>
                <th>Sort</th>
                <th>Link</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articleContents as $articleContent)
                <tr>
                    <td>{{ $articleContent->article->title }}</td>
                    <td>{{ $articleContent->title }}</td>
                    <td>{{ $articleContent->sort }}</td>
                    <td>{{ $articleContent->link }}</td>
                    <td>
                        {!! Form::open(['route' => ['articleContents.destroy', $articleContent->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('articleContents.show', [$articleContent->id]) }}"
                                class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                            <a href="{{ route('articleContents.edit', [$articleContent->id]) }}"
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
