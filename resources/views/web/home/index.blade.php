@extends('web.layouts.master')
@section('title')
    <title>Home page</title>
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('/frontend/home/home.css')}}">
    <style>
        .product-image-wrapper:hover {
            transform: scale(1.05);
            transition: all linear 0.3s;
        }
    </style>
@endsection
@section('content')
    <section id="slider"><!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                        </ol>

                        <div class="carousel-inner">
                            @foreach($sliders as $key=>$sliderItem)
                                <div class="item {{$key == 0 ? 'active' : ''}}">
                                    <div class="col-sm-6">
                                        <h1>{{$sliderItem->name}}</h1>
                                        <p>{!! $sliderItem->description !!}</p>
                                        <button type="button" class="btn btn-default get">Get it now</button>
                                    </div>
                                    <div class="col-sm-6">
                                        <img src="{{$sliderItem->image_path}}" class="girl img-responsive" alt=""/>
                                        <img src="{{asset('frontend/Eshopper/images/home/pricing.png')}}"
                                             class="pricing" alt=""/>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section><!--/slider-->

    <section>
        <div class="container">

            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2 class="title text-center">Danh m???c s???n ph???m</h2>
                        <div class="panel-group category-products" id="accordian"><!--category-product-->
                            @foreach($categories as $category)
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            @if($category->categoryChildrent->count())
                                                <a data-toggle="collapse" data-parent="#accordian"
                                                   href="#mens_{{$category->id}}">
                                                    <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                                    {{$category->name}}
                                                </a>
                                            @else
                                                <a href="{{route('web.categoryProduct',['slug'=>$categoryChildrent->slug, 'id'=>$categoryChildrent->id])}}">
                                                <span class="badge pull-right">
                                                    {{$category->name}}
                                                </a>
                                            @endif

                                        </h4>
                                    </div>


                                    <div id="mens_{{$category->id}}" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            @foreach($category->categoryChildrent as $categoryChildrent)
                                                <ul>
                                                    <li>
                                                        <a href="{{route('web.categoryProduct',['slug'=>$categoryChildrent->slug, 'id'=>$categoryChildrent->id])}}">- {{$categoryChildrent->name}}</a>
                                                    </li>
                                                </ul>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div><!--/category-products-->
                    </div>
                    <div class="form-group">
                        <h4 class="title text-center">B??? l???c t??m ki???m</h4>
                        <hr>
                        <form action="{{route('web.home.index')}}" method="get">
                            <div>
                                <label for="">Ch???n danh m???c s???n ph???m</label>
                                <select name="category_id" id="" class="form-control">
                                    <option value="0">Ch???n danh m???c</option>
                                    {!! $htmlSelect !!}
                                </select>
                            </div>
                            <div >
                                <label for="">Ch???n gi??</label>
                                <select name="price" id="" class="form-control">
                                    <option value="asc">Ch???n gi??</option>
                                    <option value="asc">Th???p ?????n cao</option>
                                    <option value="desc">Cao ?????n th???p</option>
                                </select>
                            </div>
                            <div>
                                <label for="">T??m ki???m theo t??n</label>
                                <input class="form-control" name="keywords" type="search" placeholder="Nh???p t??? t??m ki???m">
                            </div>
                            <button style="margin-top: 6px" class="btn btn-success btn-sm" type="submit">T??m ki???m</button>
                        </form>
                    </div>
                    <div>
                        <h4 class="title text-center">S???n ph???m y??u th??ch</h4>
                        <div id="view_likeProduct">

                        </div>
                    </div>
                </div>

                <div class="col-sm-9 padding-right">
                    <!--features_items-->
                    @include('web.components.feature_product')
                    <!--features_items-->

                    <!--category-tab-->
                    @include('web.components.category_tab')
                    <!--/category-tab-->

                    <!--recommended_items-->
                    @include('web.components.product_detail.product_recommend')
                    <!--/recommended_items-->
                </div>
            </div>
        </div>
        <div class="fb-comments" data-href="http://127.0.0.1:8000/web/home" data-width="" data-numposts="20"></div>
    </section>
@endsection
@section('js')

@endsection
