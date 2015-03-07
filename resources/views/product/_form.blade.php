<div class="form-group">
    {!! Form::label('code') !!}
    {!! Form::text('code', null, ['class' => 'form-control'] ) !!}
    {!! $errors->first('code', '<span>:message</span>') !!}
</div>

<div class="form-group">
    {!! Form::label('name') !!}
    {!! Form::text('name', null, ['class' => 'form-control'] ) !!}
    {!! $errors->first('name', '<span>:message</span>') !!}
</div>

<div class="form-group">
    {!! Form::label('price') !!}
    {!! Form::text('price', null, ['class' => 'form-control'] ) !!}
    {!! $errors->first('price', '<span>:message</span>') !!}
</div>

<div class="form-group">
    {!! Form::label('colour') !!}
    {!! Form::text('colour', null, ['class' => 'form-control'] ) !!}
    {!! $errors->first('colour', '<span>:message</span>') !!}
</div>

<div class="form-group">
    {!! Form::label('size') !!}
    {!! Form::text('size', null, ['class' => 'form-control'] ) !!}
    {!! $errors->first('size', '<span>:message</span>') !!}
</div>


<div class="form-group">
    {!! Form::label('keterangan') !!}
    {!! Form::text('keterangan', null, ['class' => 'form-control'] ) !!}
    {!! $errors->first('keterangan', '<span>:message</span>') !!}
</div>

<div class="form-group">
    {!! Form::label('photo', 'Photo:') !!}
    {!! Form::file('image') !!}
    {!! $errors->first('image', '<span>:message</span>') !!}
</div>

{{-- sub image --}}
    <div class="form-group">
        {!! Form::label('sub-image', 'Sub Image:') !!}
        {!! Form::file('subimage[]', ['multiple' => true]) !!}
    </div>
    <div class="form-group">
        {!! Form::label('sub-image', 'Sub Image:') !!}
        {!! Form::file('subimage[]', ['multiple' => true]) !!}
    </div>
    <div class="form-group">
        {!! Form::label('sub-image', 'Sub Image:') !!}
        {!! Form::file('subimage[]', ['multiple' => true]) !!}
    </div>
    <div class="form-group">
        {!! Form::label('sub-image', 'Sub Image:') !!}
        {!! Form::file('subimage[]', ['multiple' => true]) !!}
    </div>

{{-- End sub Image --}}
<div class="form-group">
    {!! Form::label('tag_lists', 'Jenis:') !!}
    {!! Form::select('tag_lists[]', $tags, null, ['class'=>'form-control', 'multiple']) !!}
</div>

{!! Form::hidden('published_at', date('Y-m-d'), ['class' => 'form-control']) !!}

<div class="form-group">
    {!! Form::submit(isset($buttonText) ? $buttonText : 'Create Product', ['class' => 'btn btn-primary']) !!}
</div>