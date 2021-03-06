@extends('layouts.app')
@section('title')
    Объявления
@stop

@section('content')
    <div class="col-md-7">
        <div class="property-grid">
            <ul class="grid-holder col-3">
                @foreach($ads as $ad)
                    <div class="row">

                        <input type="hidden" class="ads_id" name="ads_id" value="{{ $ad->id }}" />
                        <div class="col-md-4 col-sm-4">
                            @if($ad->ads_attachment)

                                @foreach($ad->ads_attachment as $image)
                                    <a href="{{$image->url}}"
                                       rel="prettyPhoto[{{$ad->id}}]" title="This is the description">
                                        {!! HTML::image($image->url.'?w=100&h=100&fit=crop', $image->comment,
                                        ['class' => 'img-thumbnail img-responsive']) !!}
                                    </a>
                                    @endforeach

                                    @else

                                    @endif

                        </div>
                        <div class="col-md-8 col-sm-8">

                            <h3><a href="{{ url('ads', $ad->id) }}">{{$ad->title}}</a></h3>
                    <span class="post-meta meta-data"> <span><i class="fa fa-calendar"></i> {{$ad->created_at}}</span>
                        <span><i class="fa fa-folder-open"></i>
                            <a
                                    href="/category/{{$ad->category->title}}">{{$ad->category->title}}</a>

                        </span>
                        <span><i class="fa fa-rub"></i>{{$ad->price}}</span>
                       <!--  <span><a href="#"><i class="fa fa-comment"></i> 12</a></span> -->
                        </span>

                            <p class='row-content'>{{$ad->text}}</p>
                            @if($ads->phone)
                                <span><i class="fa fa-phone"></i> {{$ads->phone}} </span><br />
                            @else
                                <span><i class="fa fa-phone"></i> Нет телефона </span>
                            @endif

                            @if($ads->price)
                                <span><i class="fa fa-rub"></i> {{$ads->price}} руб.</span>
                            @else
                                <span><i class="fa fa-rub"></i> Нет цены </span>
                            @endif

                            <p><a href="#" class="btn btn-primary">Смотреть
                                    <i class="fa fa-long-arrow-right"></i></a></p>
                        </div>
                    </div>
                    </article>

                @endforeach
            </ul>
        </div>
        {!! $ads !!}

    </div>
@stop
