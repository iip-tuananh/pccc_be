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
            <h2 class="page-header__title">{{ $project->name }}</h2>
            <ul class="firdip-breadcrumb list-unstyled">
                <li><a href="{{ route('front.home-page') }}">Trang chủ</a></li>
                <li><span>{{ $project->name }}</span></li>
            </ul>
        </div>
    </section>

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

    <section class="project-details">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="project-details__inner">
                        <h4 class="project-details__inner__title">{{ $project->name }}</h4>
                        <p class="project-details__inner__text">{{ $project->created_at->format('d') }} {{ $days[$project->created_at->dayOfWeek] }}, {{ $project->created_at->format('Y') }}</p>
                    </div>
                </div>
                <div class="col-12">
                    <div class="project-details__thumb">
                        <img src="{{ @$project->image->path ?? '' }}" alt="firdip image">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="project-details__left">
                        {!! $project->content !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
    <script>
    </script>
@endpush
