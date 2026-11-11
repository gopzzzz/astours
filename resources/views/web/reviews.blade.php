@extends('layouts.weblayout')

@section('content')

<style>
    .review-detail-section {
    background: #f8f9fa;
    min-height: 100vh;
    padding: 60px 15px;
}

.review-detail-section .container {
    max-width: 850px;
    margin: auto;
}

.back-link {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 20px;
    color: #555;
    font-size: 14px;
    font-weight: 600;
    text-decoration: none;
}

.back-link:hover {
    color: #f39c12;
}

.review-detail-card {
    position: relative;
    background: #fff;
    border-radius: 18px;
    padding: 35px;
    box-shadow: 0 10px 35px rgba(0, 0, 0, 0.08);
}

.review-header {
    display: flex;
    align-items: center;
    gap: 15px;
    padding-bottom: 20px;
    border-bottom: 1px solid #eee;
}

.review-avatar {
    width: 58px;
    height: 58px;
    border-radius: 50%;
    background: #f39c12;
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 22px;
    font-weight: 700;
}

.review-header h2 {
    margin: 0 0 5px;
    font-size: 20px;
    font-weight: 700;
    color: #222;
}

.review-stars {
    color: #f5b301;
    font-size: 14px;
}

.quote-icon {
    margin-top: 25px;
    color: #f39c12;
    font-size: 30px;
    opacity: 0.3;
}

.review-content {
    margin-top: 10px;
    color: #555;
    font-size: 16px;
    line-height: 1.9;
}

.review-date {
    margin-top: 25px;
    padding-top: 18px;
    border-top: 1px solid #eee;
    color: #999;
    font-size: 13px;
}

.review-date i {
    margin-right: 6px;
}

@media (max-width: 576px) {
    .review-detail-section {
        padding: 30px 12px;
    }

    .review-detail-card {
        padding: 22px 18px;
        border-radius: 14px;
    }

    .review-content {
        font-size: 15px;
        line-height: 1.7;
    }
}
</style>

<section class="review-detail-section">
    <div class="container">

        <a href="{{ url()->previous() }}" class="back-link">
            <i class="fas fa-arrow-left"></i>
            Back to Reviews
        </a>

        <div class="review-detail-card">

            <div class="review-header">

                <div class="review-avatar">
                    @if($review->image)
        <img src="{{ asset('public/uploads/' . $review->image) }}"
             alt="{{ $review->blogname }}">
    @else
        <i class="fas fa-user"></i>
    @endif
                </div>

                <div>
                    <h2>{{ $review->blogname ?? 'Guest' }}</h2>

                    <div class="review-stars">
                        @for($i = 1; $i <= 5; $i++)
                            <i class="fas fa-star"></i>
                        @endfor
                    </div>
                </div>

            </div>

            <div class="quote-icon">
                <i class="fas fa-quote-left"></i>
            </div>

            <div class="review-content">
                {!! nl2br(e($review->description)) !!}
            </div>

            @if(isset($review->created_at))
                <div class="review-date">
                    <i class="far fa-calendar-alt"></i>
                    {{ \Carbon\Carbon::parse($review->created_at)->format('d M Y') }}
                </div>
            @endif

        </div>

    </div>
</section>
@endsection