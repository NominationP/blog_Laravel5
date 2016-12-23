@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">评论管理</div>
                <div class="panel-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif


                    <hr>

                    <table style="width:100%",class="comment">
                      <tr>
                        <th><p>Content</p></th>
                        <th>User</th>
                        <th>Page</th>
                        <th>Edit</th>
                        <th>Delete</th>
                      </tr>
                      @foreach ($comments as $comment)
                      <div class="comment">
                      <tr height="80">
                        <td><p>{{ $comment->content }}</p></td>
                        <td><p>{{ $comment->nickname }}</p>
                        <a href="{{ $comment->website }}"><p> {{ $comment->website }}</p></a></td>
                        <td><p>{{ $comment->hasOneArticle->title }}</p></td>
                        <td><a href="{{ url('admin/comment/'.$comment->id.'/edit') }}" class="btn btn-success">编辑</a></td>
                        <td><form action="{{ url('admin/comment/'.$comment->id) }}" method="POST" style="display: inline;">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger">删除</button>
                        </form></td>
                      </tr>
                      </div>

                      @endforeach

                    </table>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection