
@extends('layouts.weblayout')

@section('content')

<style>
    /* ==============================
       REVIEW SECTION
    ============================== */

    .reviews-section {
        width: 100%;
        padding: 60px 20px;
        background: #f8f9fb;
    }

    .reviews-container {
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
    }


    /* ==============================
       HEADING
    ============================== */

    .reviews-heading {
        text-align: center;
        margin-bottom: 40px;
    }

    .reviews-heading .sub-title {
        color: #f39c12;
        font-size: 14px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        margin-bottom: 8px;
    }

    .reviews-heading h2 {
        margin: 0 0 10px;
        color: #222;
        font-size: 34px;
        font-weight: 700;
    }

    .reviews-heading p {
        margin: 0 auto;
        max-width: 600px;
        color: #777;
        font-size: 15px;
        line-height: 1.6;
    }


    /* ==============================
       REVIEW GRID
    ============================== */

    .reviews-grid {
        display: grid;

        grid-template-columns: repeat(3, minmax(0, 1fr));

        gap: 25px;

        align-items: stretch;
    }


    /* ==============================
       REVIEW CARD
    ============================== */

    .review-card {
        width: 100%;
        height: 100%;
        box-sizing: border-box;

        display: flex;
        flex-direction: column;

        background: #ffffff;

        border: 1px solid #eeeeee;
        border-radius: 18px;

        padding: 25px;

        box-shadow: 0 5px 25px rgba(0, 0, 0, 0.06);

        transition: all 0.3s ease;
    }

    .review-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 35px rgba(0, 0, 0, 0.12);
    }


    /* ==============================
       STARS
    ============================== */

    .review-rating {
        display: flex;
        gap: 3px;

        color: #f5a623;

        font-size: 17px;

        margin-bottom: 15px;
    }


    /* ==============================
       TITLE
    ============================== */

    .review-title {
        margin: 0 0 13px;

        color: #222;

        font-size: 19px;
        font-weight: 700;

        line-height: 1.4;
    }


    /* ==============================
       REVIEW TEXT
    ============================== */

    .review-text {
        margin: 0;

        color: #666;

        font-size: 14px;

        line-height: 1.8;
    }


    /* ==============================
       FOOTER
    ============================== */

    .review-footer {
        margin-top: auto;

        padding-top: 18px;

        display: flex;
        align-items: center;
        justify-content: space-between;

        gap: 15px;

        border-top: 1px solid #eeeeee;

        margin-top: 25px;
    }


    /* ==============================
       USER
    ============================== */

    .review-user {
        min-width: 0;
    }

    .review-user strong {
        display: block;

        color: #333;

        font-size: 14px;
        font-weight: 600;

        margin-bottom: 5px;

        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .review-user strong i {
        color: #f39c12;
        margin-right: 5px;
    }

    .review-user small {
        display: block;

        color: #999;

        font-size: 12px;
    }

    .review-user small i {
        margin-right: 5px;
    }


    /* ==============================
       READ MORE
    ============================== */

    .read-more-btn {
        flex-shrink: 0;

        display: inline-flex;
        align-items: center;
        gap: 6px;

        padding: 8px 13px;

        border: 1px solid #f39c12;
        border-radius: 8px;

        background: transparent;

        color: #f39c12;

        font-size: 12px;
        font-weight: 600;

        text-decoration: none;

        white-space: nowrap;

        transition: all 0.3s ease;
    }

    .read-more-btn:hover {
        background: #f39c12;
        color: #ffffff;
    }

    .read-more-btn i {
        transition: transform 0.3s ease;
    }

    .read-more-btn:hover i {
        transform: translateX(3px);
    }


    /* ==============================
       TABLET
    ============================== */

    @media (max-width: 991px) {

        .reviews-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

    }


    /* ==============================
       MOBILE
    ============================== */

    @media (max-width: 600px) {

        .reviews-section {
            padding: 40px 15px;
        }

        .reviews-grid {
            grid-template-columns: 1fr;
        }

        .reviews-heading h2 {
            font-size: 28px;
        }

        .review-card {
            padding: 22px;
        }

    }


    /* ==============================
       SMALL MOBILE
    ============================== */

    @media (max-width: 420px) {

        .review-footer {
            flex-direction: column;
            align-items: flex-start;
        }

        .read-more-btn {
            width: 100%;
            justify-content: center;
        }

    }
</style>


<section class="reviews-section">

    <div class="reviews-container">

        <!-- HEADING -->

        <div class="reviews-heading">

            <div class="sub-title">
                Customer Reviews
            </div>

            <h2>
                What Our Customers Say
            </h2>

            <p>
                Read what our customers have to say about
                their travel experiences with us.
            </p>

        </div>


        <!-- REVIEW GRID -->

        <div class="reviews-grid">

            @forelse($reviews as $rvs)

                <!-- REVIEW CARD -->

                <div class="review-card">

                    <!-- RATING -->

                    <div class="review-rating">

                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>

                    </div>


                    <!-- TITLE -->

                    <h4 class="review-title">

                        {{ $rvs->blogname }}

                    </h4>


                    <!-- DESCRIPTION -->

                    <p class="review-text">

                        “{{ Str::words(
                            strip_tags($rvs->description),
                            15,
                            '...'
                        ) }}”

                    </p>


                    <!-- FOOTER -->

                    <div class="review-footer">

                        <div class="review-user">

                            <strong>

                                <i class="fas fa-user"></i>

                                {{ $rvs->blogname }}

                            </strong>


                            <small>

                                <i class="far fa-calendar-alt"></i>

                                {{ \Carbon\Carbon::parse(
                                    $rvs->created_at
                                )->format('d M Y') }}

                            </small>

                        </div>


                        <!-- READ MORE -->

                        <a href="{{ url('reviews/'.$rvs->id) }}"
                           class="read-more-btn">

                            Read More

                            <i class="fas fa-arrow-right"></i>

                        </a>

                    </div>

                </div>

            @empty

                <div style="
                    grid-column: 1 / -1;
                    text-align: center;
                    padding: 50px 20px;
                ">

                    <i class="far fa-comment-dots"
                       style="font-size:45px;color:#ccc;">
                    </i>

                    <h4>
                        No Reviews Available
                    </h4>

                    <p>
                        Customer reviews will appear here.
                    </p>

                </div>

            @endforelse

        </div>

    </div>

</section>

@endsection