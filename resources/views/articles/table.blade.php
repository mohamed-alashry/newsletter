<div class="table-responsive-sm">
    <table class="table table-striped" id="articles-table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Contents</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
                <tr>
                    <td>{{ $article->title }}</td>
                    <td>
                        <a href="{{ route('articles.articleContents.index', $article->id) }}" class="btn btn-primary">
                            <span class="badge badge-warning">{{ $article->contents_count }}</span> Contents
                        </a>
                    </td>
                    <td>
                        {!! Form::open(['route' => ['articles.destroy', $article->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('articles.preview', [$article->id]) }}" class='btn btn-info'
                                target="_blank">preview</a>
                            {{-- <a href="{{ route('articles.send', [$article->id]) }}" class='btn btn-warning'>send</a> --}}

                            <button type="button" class="btn btn-warning" data-toggle="modal"
                                data-target="#exampleModal" onclick="setFormAction({{ $article->id }})">
                                send
                            </button>

                            <a href="{{ route('articles.show', [$article->id]) }}" class='btn btn-ghost-success'><i
                                    class="fa fa-eye"></i></a>
                            <a href="{{ route('articles.edit', [$article->id]) }}" class='btn btn-ghost-info'><i
                                    class="fa fa-edit"></i></a>
                            {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    function setFormAction(action) {
        document.getElementById('email-list').action = '/articles/send/' + action
    }

</script>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => ['articles.send', $article->id], 'id' => 'email-list']) !!}
                <div class="form-group col-sm-12">
                    {!! Form::label('email', 'Email List:') !!}
                    {!! Form::select('email[]', $users, null, ['class' => 'form-control', 'multiple' => true, 'required' => true]) !!}
                </div>
                {!! Form::close() !!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="email-list">Send</button>
            </div>
        </div>
    </div>
</div>
