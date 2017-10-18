
{{--Temporary--}}
{{--Временно заменяем наш айди пользователя статическим значением 1, так как еще не реализована аутентификация--}}
{{--{!! Form::hidden('user_id',1); !!}--}}

<div class="form-group">
    {!! Form::label('name','Title:') !!}
    {!! Form::text('title',null,['class'=>'form-control'])!!}
</div>
<div class="form-group">
    {!! Form::label('body','Body:') !!}
    {!! Form::textarea('body',null,['class'=>'form-control'])!!}
</div>

<div class="form-group">
    {!! Form::label('published_at','Published on:') !!}
    {!! Form::input('date','published_at',date('Y-m-d'),['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitButtonName,['class'=>'btn btn-primary form-control']) !!}
</div>