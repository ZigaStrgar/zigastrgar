@extends('app')

@section('header')
    @include('headers.article')
@endsection

@section('content')
    <div class="row">
        <article class="article col-xs-12">
            <div class="article-description">
                {!! $post->content !!}
            </div>
        </article>
        <div class="col-xs-12" id="comments">
            <h3 class="page-header">Comments</h3>
            @if(count($post->comments) > 0)
                @foreach($post->comments as $comment)
                    <div class="comment row">
                        <div class="col-xs-2">
                            <img src="https://randomuser.me/api/portraits/men/60.jpg" alt="My avatar"
                                 class="img-responsive user-avatar">
                        </div>
                        <div class="col-xs-10">
                            <h4>{{ $comment->user->name }} <span
                                        class="pull-right">{{ $comment->created_at->diffForHumans() }}</span></h4>
                            {!! checkForUser($comment->content) !!}
                        </div>
                    </div>
                    <div class="clearfix"></div>
                @endforeach
            @endif
            @if(Auth::check())
                <h3 class="page-title">Leave a comment</h3>
                <div class="leave-comment">
                    {!! Form::open(['url' => 'comments', 'method' => 'POST']) !!}
                    {!! Form::hidden('slug', $post->slug) !!}
                    <div class='form-group'>
                        {!! Form::textarea('content', null, ['class' => 'form-control', 'id' => 'content']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit("Leave a comment", ['class' => 'btn btn--bg-success btn--border-success']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            @endif
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="{!! asset("/vendor/prism/prism.css") !!}"/>
@endsection

@section('scripts')
    <script src="{!! asset('/vendor/prism/prism.js') !!}"></script>
    @include('includes.tinymce_limited')
@endsection