
@extends('m_layouts.app')

@section('title')
    Главная
@stop

@section('content')
    <div class="col-md-8 posts-archive">
        <div class="block-heading">

            <a href="{{route('ads.create')}}" class="btn btn-sm btn-primary pull-right">Подать обьявление <i
                        class="fa fa-long-arrow-right"></i></a>

            <a href="{{route('welcome.new')}}" class='btn btn-sm btn-primary pull-right'>Новые</a>
            <h4><span class="heading-icon"><i class="fa fa-comment"></i></span>Обьявления</h4>
        </div>

        <ul class="updates">
            @include('handlebars.question')
        </ul>
        <script id="some-template" type="text/x-handlebars-template">
            @{{#each ads}}
            <article class="post">

                <div class="row">
                    <input type='hidden' name='ads_id' class='ads_id' value='@{{ id }}'>
                    <div class="col-md-4 col-sm-4">
                        @{{#each ads_attachment }}
                        <a href="#"
                           rel="prettyPhoto[@{{id}}]" title="@{{comment}}">
                            <img src="@{{url}}/?w=100&h=100&fit=crop"
                                 class='img-thumbnail img-responsive'>

                        </a>
                        @{{/each}}
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <h3><a href="/ads/@{{ id }}">@{{ title }}</a></h3>
                    <span class="post-meta meta-data"> <span><i class="fa fa-calendar"></i>@{{ created_at }}</span>
                        <span><i class="fa fa-folder-open"></i>
                            <a
                                    href="/category/@{{ category.alias }}">@{{ category.title }}</a>

                        </span>
                        <span><i class="fa fa-rub"></i>@{{ price }}</span>
                       <!--  <span><a href="#"><i class="fa fa-comment"></i> 12</a></span> -->
                        </span>

                        <p class='row-content'>@{{ text }}</p>

                        <p><a href="#" class="btn btn-primary">Смотреть
                                <i class="fa fa-long-arrow-right"></i></a></p>
                    </div>
                </div>
            </article>
            @{{/each}}

        </script>
        <div class="posts">

            @foreach($ads as $ad)
                <article class="post">

                    <div class="row">

                        <input type="hidden" class="ads_id" name="ads_id" value="{{ $ad->id }}" />
                        @if(isset($ad->ads_attachment[0]))
                            <div class="col-md-4 col-sm-4">

                                @foreach($ad->ads_attachment->slice(0, 1) as $image)
                                    <a href="{{$image->url}}"
                                       rel="prettyPhoto[{{$ad->id}}]" title="">
                                        {!! HTML::image($image->url.'?w=200&fit=crop', $image->comment,
                                        ['class' => 'img-thumbnail img-responsive']) !!}
                                    </a>
                                    @endforeach

                                            <!--  <a href="http://loremflickr.com/600/400?random=4"
                           rel="prettyPhoto" title="This is the description">
                            <img src="http://loremflickr.com/600/400?random=4" alt="" class="img-thumbnail">
                        </a>
                        <a href="http://loremflickr.com/600/400?random=2"
                           rel="prettyPhoto" title="This is the description">
                            <img src="http://loremflickr.com/50/50?random=4" alt="" class="img-thumbnail">
                        </a>
                        <a href="http://loremflickr.com/600/400?random=4"
                           rel="prettyPhoto" title="This is the description">
                            <img src="http://loremflickr.com/50/50?random=4" alt="" class="img-thumbnail">
                        </a>
                        <a href="http://loremflickr.com/600/400?random=2"
                           rel="prettyPhoto" title="This is the description">
                            <img src="http://loremflickr.com/50/50?random=4" alt="" class="img-thumbnail">
                        </a>
                        <a href="http://loremflickr.com/600/400?random=4"
                           rel="prettyPhoto" title="This is the description">
                            <img src="http://loremflickr.com/50/50?random=4" alt="" class="img-thumbnail">
                        </a>
                        <a href="http://loremflickr.com/600/400?random=2"
                           rel="prettyPhoto" title="This is the description">
                            <img src="http://loremflickr.com/50/50?random=4" alt="" class="img-thumbnail">
                        </a>
                        <a href="http://loremflickr.com/600/400?random=4"
                           rel="prettyPhoto" title="This is the description">
                            <img src="http://loremflickr.com/50/50?random=4" alt="" class="img-thumbnail">
                        </a>
                        <a href="http://loremflickr.com/600/400?random=2"
                           rel="prettyPhoto" title="This is the description">
                            <img src="http://loremflickr.com/50/50?random=4" alt="" class="img-thumbnail">
                        </a>
                        <a href="http://loremflickr.com/600/400?random=4"
                           rel="prettyPhoto" title="This is the description">
                            <img src="http://loremflickr.com/50/50?random=4" alt="" class="img-thumbnail">
                        </a>
                        <a href="http://loremflickr.com/600/400?random=2"
                           rel="prettyPhoto" title="This is the description">
                            <img src="http://loremflickr.com/50/50?random=4" alt="" class="img-thumbnail">
                        </a> -->
                            </div>
                        @endif
                        <div class="col-md-{{isset($ad->ads_attachment[0]) ? '8':'12'}}">


                    <span class="post-meta meta-data">
                         <span><i class="fa fa-check-circle-o"></i><a href="{{ url('ads', $ad->id) }}" style="text-decoration: none"> {{$ad->type->name}}</a></span>
                            {{--<span><i class="fa fa-calendar"></i> {{$ad->created_at}}</span>--}}
                        <span><i class="fa fa-tags"></i>
                            <a
                                    href="/category/{{$ad->category->alias}}" style="text-decoration: none">{{$ad->category->title}}</a>

                        </span>
                        {{--<span><i class="fa fa-map-marker"></i>
                            @if ($ad->user->profile->city)
                                {{ $ad->user->profile->city->city_name }}
                            @else
                                Город не указан
                            @endif
                            </span>--}}

                        @if(Auth::user())
                            <span>
                           @if($favorited = in_array($ad->id, $favorites))

                                    {!! Form::open(['method' => 'DELETE', 'route' => ['favorites.destroy', $ad->id]]) !!}
                                @else
                                    {!! Form::open(['route' => 'favorites.store']) !!}
                                    {!! Form::hidden('advertisement_id', $ad->id) !!}
                                @endif
                                <i class="fa fa-heart {{in_array($ad->id, $favorites) ? 'favorited' : 'not-favorited' }}"></i>
                               <button type="submit" class="btn-naked"><span class="naked-text">В избранное</span>
                               </button>
                                 {!! Form::close() !!}

                           </span>
                        @endif
                        @if($ad->phone)
                            <span><i class="fa fa-phone"></i>{{$ad->phone}}</span>
                        @else
                            <span><i class="fa fa-phone"></i>Нет телефона</span>
                            @endif
                                    <!--  <span><a href="#"><i class="fa fa-comment"></i> 12</a></span> -->


                            @if($ad->price)
                                <span><i class="fa fa-rub"></i>{{$ad->price}} руб.</span>
                            @else
                                <span><i class="fa fa-rub"></i>Нет цены</span>
                            @endif

                        </span>

                            <p class='row-content'>{{$ad->text}}</p>

                            <p><a href="{{ url('ads', $ad->id) }}" class="btn btn-primary">Смотреть
                                    <i class="fa fa-long-arrow-right"></i></a></p>
                        </div>
                    </div>
                </article>

            @endforeach
        </div>

        <div class="text-center">{!! $ads->appends(Input::except('page'))->render() !!}</div>

    </div>
    {{--    @foreach($ads as $ad)
            {!! Content::viewAd($ad) !!}
        @endforeach
        --}}
@stop
