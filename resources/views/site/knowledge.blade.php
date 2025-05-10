@extends('site.layouts.master')
@section('title')
    {{ $config->web_title }}
@endsection
@section('description')
    {{ $config->web_des }}
@endsection
@section('image')
@endsection

@section('css')

@endsection

@section('content')
    <section class="page-header">
        <div class="page-header__bg" style="background-image: url(/site/images/backgrounds/page-header-bg-1-1.jpg);"></div>
        <div class="container">
            <h2 class="page-header__title">Kiến thức</h2>
            <ul class="firdip-breadcrumb list-unstyled">
                <li><a href="{{ route('front.home-page') }}">Trang chủ</a></li>

                @if(@$category)
                    @if(@$category->parent)
                        <li><span>{{ @$category->parent->name ?? '' }}</span></li>
                    @endif
                    <li><span>{{ $category->name }}</span></li>
                @else
                    <li><span>Kiến thức</span></li>
                @endif
            </ul>
        </div>
    </section>

    <section class="blog-one blog-one--page">
        <div class="container">
            <div class="row gutter-y-60">
                <div class="col-lg-8">
                    <div class="row gutter-y-30">
                        @php
                            use Carbon\Carbon;
                            Carbon::setLocale('vi');
                            $days = [
                                Carbon::SUNDAY    => 'Chủ nhật',
                                Carbon::MONDAY    => 'Thứ 2',
                                Carbon::TUESDAY   => 'Thứ 3',
                                Carbon::WEDNESDAY => 'Thứ 4',
                                Carbon::THURSDAY  => 'Thứ 5',
                                Carbon::FRIDAY    => 'Thứ 6',
                                Carbon::SATURDAY  => 'Thứ 7',
                            ];

                        @endphp

                        @foreach($posts as $blog)
                                <?php
                                $d = $blog->created_at;
                                ?>


                            <div class="col-md-12">
                                <div class="blog-card-two  wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='100ms'>
                                    <a href="{{ route('front.getKnowledgeDetail', $blog->slug) }}" class="blog-card-two__image">
                                        <img src="{{ @$blog->image->path ?? '' }}" alt="Elevating Heroism Apeium the Fire Service">
                                        <p class="blog-card-two__date">{{ $d->format('d') }} {{ $days[$d->dayOfWeek] }}, {{ $d->format('Y') }}</p>
                                    </a>
                                    <div class="blog-card-two__content">
                                        <ul class="list-unstyled blog-card-two__meta">
                                            <li><a href="{{ route('front.getKnowledgeDetail', $blog->slug) }}"><i class="fas fa-user-circle"></i> by {{ $blog->user_create->name }}</a></li>
                                        </ul>
                                        <h3 class="blog-card-two__title"><a href="{{ route('front.getKnowledgeDetail', $blog->slug) }}">{{ $blog->name }}</a></h3>
                                        <p class="blog-card-two__text">{!! $blog->intro !!}</p>
                                        <a href="{{ route('front.getKnowledgeDetail', $blog->slug) }}" class="blog-card-two__link"><i class="icon-arrow-left"></i></a>
                                    </div>
                                </div>
                            </div><!-- /.col-md-12 -->

                        @endforeach


                        <div class="col-12">
                            {{ $posts->links('site.pagination.paginate2') }}
                        </div>

                    </div><!-- /.row -->
                </div><!-- /.col-lg-8 -->
                <div class="col-lg-4">
                    <div class="sidebar">
                        <aside class="widget-area">

                            <div class="sidebar__single wow fadeInUp" data-wow-delay='300ms'>
                                <h4 class="sidebar__title">Bài viết mới</h4>
                                <ul class="sidebar__posts list-unstyled">
                                    @foreach($otherBlog as $b)
                                            <?php
                                            $d = $b->created_at;
                                            ?>
                                        <li class="sidebar__posts__item">
                                            <div class="sidebar__posts__image">
                                                <img src="{{ @$b->image->path ?? '' }}" alt="firdip">
                                            </div>
                                            <div class="sidebar__posts__content">
                                                <p class="sidebar__posts__meta"><a href="{{ route('front.getKnowledgeDetail', $b->slug) }}"><i class="icon-clock"></i>{{ $d->format('d') }} {{ $days[$d->dayOfWeek] }}, {{ $d->format('Y') }}</a></p>
                                                <h4 class="sidebar__posts__title"><a href="{{ route('front.getKnowledgeDetail', $b->slug) }}">{{ $b->name }}</a></h4>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="sidebar__single wow fadeInUp" data-wow-delay='300ms'>
                                <h4 class="sidebar__title">Danh mục</h4>
                                <ul class="sidebar__categories list-unstyled">
                                    @foreach($allCate as $cate)
                                        <li class="sidebar__categories__item"><a href="{{ route('front.knowledge', $cate->slug) }}"> <i class="icon-arrow-left"></i>{{ $cate->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>


                        </aside>
                    </div>
                </div><!-- /.col-lg-4 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.blog-one blog-one-page -->

@endsection

@push('scripts')
    <script>
    </script>
@endpush
