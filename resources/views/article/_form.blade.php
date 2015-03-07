	<div class="form-group">
		{!! Form::label('title') !!}
		{!! Form::text('title', null, ['class' => 'form-control'] ) !!}
		{!! $errors->first('title', '<span>:message</span>') !!}
	</div>

	<div class="form-group">
		{!! Form::label('body') !!}
		{!! Form::textarea('body', null, ['class' => 'form-control'] ) !!}
		{!! $errors->first('body', '<span>:message</span>') !!}
	</div>

	{!! Form::hidden('published_at', date('Y-m-d'), ['class' => 'form-control']) !!}

	<div class="form-group">
		{!! Form::submit(isset($buttonText) ? $buttonText : 'Create User', ['class' => 'btn btn-primary']) !!}
	</div>