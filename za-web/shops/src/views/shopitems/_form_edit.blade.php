{!! Form::model($items, array('route' => array('shopitems.update', $items->id), 'method' => 'PUT', 'shop_id'=>$shop_id, 'files'=>true)) !!}
<div class="form-group">
    {!! Form::label('description', 'Имя товара') !!}

    {!! Form::text('name', old('name'), ['class'=>'form-control', 'placeholder'=>'Имя товара']) !!}
</div>

<div class="form-group">
    {!! Form::label('category', 'Категория товара') !!}
    <select name='category_id' class='form-control' required="required">
        <option selected disabled>Выберете категорию</option>

        @foreach($categories as $cat)
            <option value='{{ $cat->id }}'>{{ $cat->name }}</option>
        @endforeach
    </select>
    <a href="#" onclick="$('select[name=category]').val('Выберете категорию');return false;">Убрать</a>
</div>

<div class="form-group">
    {!! Form::label('art_number', 'Артикульный номер') !!}
    {!! Form::text('art_number', old('art_number'), ['class'=>'form-control', 'placeholder'=>'Артикул №', 'pattern' => '[0-9.-]+']) !!}
</div>
<div class="form-group">
    {!! Form::label('description', 'Описание') !!}
    {!! Form::textarea('description', old('description'), ['class'=>'form-control', 'placeholder'=>'Описание товара']) !!}
</div>
<div class="form-group">
    {!! Form::label('price', 'Цена') !!}
    {!! Form::text('price', old('price'), ['class'=>'form-control', 'placeholder'=>'Цена товара', 'pattern' => '[0-9]+']) !!}
</div>
<div class="form-group">
    {!! Form::label('attachment', 'Картинка') !!}
    {!! Form::file('attachment', old('attachment')) !!}

    @if($items->attachment)
        <a href="{{ $items->attachment->url }}" rel="prettyPhoto[{{ $items->id }}]">
            <br/>
                {!! HTML::image($items->attachment->url, '',
             ['style' => 'height: 200px; width: 300px; border: solid 3px; #666666']) !!}
        </a>
    @endif
</div>
{!! Form::hidden('shop_id', $shop_id) !!}
<div class="form-group">
    {!! Form::submit('Обновить', ['class'=>'btn btn-primary']) !!}
</div>
{!! Form::close() !!}
