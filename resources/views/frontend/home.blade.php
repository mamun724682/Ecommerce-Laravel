@extends('frontend.layouts.master')

@section('content')
<div class="ps-section__header mb-50">
  <h3 class="ps-section__title" data-mask="features">- Features Products</h3>
  <ul class="ps-masonry__filter">
    <li class="current"><a href="#" data-filter="*">All <sup>8</sup></a></li>
    <li><a href="#" data-filter=".nike">Nike <sup>1</sup></a></li>
    <li><a href="#" data-filter=".adidas">Adidas <sup>1</sup></a></li>
    <li><a href="#" data-filter=".men">Men <sup>1</sup></a></li>
    <li><a href="#" data-filter=".women">Women <sup>1</sup></a></li>
    <li><a href="#" data-filter=".kids">Kids <sup>4</sup></a></li>
  </ul>
</div>
<div class="ps-section__content pb-50">
  <div class="masonry-wrapper" data-col-md="4" data-col-sm="2" data-col-xs="1" data-gap="30" data-radio="100%">
    <div class="ps-masonry">
      <div class="grid-sizer"></div>
      @foreach ($products as $product)
      <div class="grid-item kids">
        <div class="grid-item__content-wrapper">
          <div class="ps-shoe mb-30">
            <div class="ps-shoe__thumbnail">
              <div class="ps-badge"><span>New</span></div>
              <div class="ps-badge ps-badge--sale ps-badge--2nd">
                <span>0%</span>
              </div>
              {{-- <a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a> --}}
              <form action="{{ route('cart.add') }}" method="post">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                  <button class="ps-shoe__favorite" type="submit"><i class="ps-icon-shopping-cart"></i></button>
              </form>

              <img src="{{ $product->getFirstMediaUrl('products') }}" alt="{{ $product->title }}">
              <a class="ps-shoe__overlay" href="{{ route('frontend.product.details', $product->slug) }}"></a>
            </div>
            <div class="ps-shoe__content">
              <div class="ps-shoe__variants">
                <div class="ps-shoe__variant normal">
                  @foreach ($product->getMedia('products') as $images)
                  {{-- <img src="{{ $images }}" alt=""> --}}
                  {{ $images }}
                  @endforeach
                </div>
                <select class="ps-rating ps-shoe__rating">
                  <option value="1">1</option>
                  <option value="1">2</option>
                  <option value="1">3</option>
                  <option value="1">4</option>
                  <option value="2">5</option>
                </select>
              </div>
              <div class="ps-shoe__detail">
                <a class="ps-shoe__name" href="{{ route('frontend.product.details', $product->slug) }}">{{ Str::limit($product->title, 20) }}</a>
                <p class="ps-shoe__categories">
                  <a href="#">Men shoes</a>,<a href="#"> Nike</a>,
                  <a href="#"> Jordan</a>
                </p>
                <span class="ps-shoe__price">
                  <del>{{ $product->sale_price }}</del> {{ $product->price }}৳</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach


        {{-- <div class="grid-item nike">
          <div class="grid-item__content-wrapper">
            <div class="ps-shoe mb-30">
              <div class="ps-shoe__thumbnail"><a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a><img src="images/shoe/2.jpg" alt=""><a class="ps-shoe__overlay" href="product-detail.html"></a>
              </div>
              <div class="ps-shoe__content">
                <div class="ps-shoe__variants">
                  <div class="ps-shoe__variant normal"><img src="images/shoe/2.jpg" alt=""><img src="images/shoe/3.jpg" alt=""><img src="images/shoe/4.jpg" alt=""><img src="images/shoe/5.jpg" alt=""></div>
                  <select class="ps-rating ps-shoe__rating">
                    <option value="1">1</option>
                    <option value="1">2</option>
                    <option value="1">3</option>
                    <option value="1">4</option>
                    <option value="2">5</option>
                  </select>
                </div>
                <div class="ps-shoe__detail"><a class="ps-shoe__name" href="#">Air Jordan 7 Retro</a>
                  <p class="ps-shoe__categories"><a href="#">Men shoes</a>,<a href="#"> Nike</a>,<a href="#"> Jordan</a></p><span class="ps-shoe__price"> £ 120</span>
                </div>
              </div>
            </div>
          </div>
        </div> --}}
        {{-- <div class="grid-item adidas">
          <div class="grid-item__content-wrapper">
            <div class="ps-shoe mb-30">
              <div class="ps-shoe__thumbnail"><a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a><img src="images/shoe/3.jpg" alt=""><a class="ps-shoe__overlay" href="product-detail.html"></a>
              </div>
              <div class="ps-shoe__content">
                <div class="ps-shoe__variants">
                  <div class="ps-shoe__variant normal"><img src="images/shoe/2.jpg" alt=""><img src="images/shoe/3.jpg" alt=""><img src="images/shoe/4.jpg" alt=""><img src="images/shoe/5.jpg" alt=""></div>
                  <select class="ps-rating ps-shoe__rating">
                    <option value="1">1</option>
                    <option value="1">2</option>
                    <option value="1">3</option>
                    <option value="1">4</option>
                    <option value="2">5</option>
                  </select>
                </div>
                <div class="ps-shoe__detail"><a class="ps-shoe__name" href="#">Air Jordan 7 Retro</a>
                  <p class="ps-shoe__categories"><a href="#">Men shoes</a>,<a href="#"> Nike</a>,<a href="#"> Jordan</a></p><span class="ps-shoe__price"> £ 120</span>
                </div>
              </div>
            </div>
          </div>
        </div> --}}
        {{-- <div class="grid-item kids">
          <div class="grid-item__content-wrapper">
            <div class="ps-shoe mb-30">
              <div class="ps-shoe__thumbnail">
                <div class="ps-badge ps-badge--sale"><span>-35%</span></div><a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a><img src="images/shoe/4.jpg" alt=""><a class="ps-shoe__overlay" href="product-detail.html"></a>
              </div>
              <div class="ps-shoe__content">
                <div class="ps-shoe__variants">
                  <div class="ps-shoe__variant normal"><img src="images/shoe/2.jpg" alt=""><img src="images/shoe/3.jpg" alt=""><img src="images/shoe/4.jpg" alt=""><img src="images/shoe/5.jpg" alt=""></div>
                  <select class="ps-rating ps-shoe__rating">
                    <option value="1">1</option>
                    <option value="1">2</option>
                    <option value="1">3</option>
                    <option value="1">4</option>
                    <option value="2">5</option>
                  </select>
                </div>
                <div class="ps-shoe__detail"><a class="ps-shoe__name" href="#">Air Jordan 7 Retro</a>
                  <p class="ps-shoe__categories"><a href="#">Men shoes</a>,<a href="#"> Nike</a>,<a href="#"> Jordan</a></p><span class="ps-shoe__price">
                    <del>£220</del> £ 120</span>
                  </div>
                </div>
              </div>
            </div>
          </div> --}}
          {{-- <div class="grid-item men">
            <div class="grid-item__content-wrapper">
              <div class="ps-shoe mb-30">
                <div class="ps-shoe__thumbnail"><a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a><img src="images/shoe/5.jpg" alt=""><a class="ps-shoe__overlay" href="product-detail.html"></a>
                </div>
                <div class="ps-shoe__content">
                  <div class="ps-shoe__variants">
                    <div class="ps-shoe__variant normal"><img src="images/shoe/2.jpg" alt=""><img src="images/shoe/3.jpg" alt=""><img src="images/shoe/4.jpg" alt=""><img src="images/shoe/5.jpg" alt=""></div>
                    <select class="ps-rating ps-shoe__rating">
                      <option value="1">1</option>
                      <option value="1">2</option>
                      <option value="1">3</option>
                      <option value="1">4</option>
                      <option value="2">5</option>
                    </select>
                  </div>
                  <div class="ps-shoe__detail"><a class="ps-shoe__name" href="#">Air Jordan 7 Retro</a>
                    <p class="ps-shoe__categories"><a href="#">Men shoes</a>,<a href="#"> Nike</a>,<a href="#"> Jordan</a></p><span class="ps-shoe__price"> £ 120</span>
                  </div>
                </div>
              </div>
            </div>
          </div> --}}
          {{-- <div class="grid-item women">
            <div class="grid-item__content-wrapper">
              <div class="ps-shoe mb-30">
                <div class="ps-shoe__thumbnail"><a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a><img src="images/shoe/6.jpg" alt=""><a class="ps-shoe__overlay" href="product-detail.html"></a>
                </div>
                <div class="ps-shoe__content">
                  <div class="ps-shoe__variants">
                    <div class="ps-shoe__variant normal"><img src="images/shoe/2.jpg" alt=""><img src="images/shoe/3.jpg" alt=""><img src="images/shoe/4.jpg" alt=""><img src="images/shoe/5.jpg" alt=""></div>
                    <select class="ps-rating ps-shoe__rating">
                      <option value="1">1</option>
                      <option value="1">2</option>
                      <option value="1">3</option>
                      <option value="1">4</option>
                      <option value="2">5</option>
                    </select>
                  </div>
                  <div class="ps-shoe__detail"><a class="ps-shoe__name" href="#">Air Jordan 7 Retro</a>
                    <p class="ps-shoe__categories"><a href="#">Men shoes</a>,<a href="#"> Nike</a>,<a href="#"> Jordan</a></p><span class="ps-shoe__price"> £ 120</span>
                  </div>
                </div>
              </div>
            </div>
          </div> --}}
          {{-- <div class="grid-item kids">
            <div class="grid-item__content-wrapper">
              <div class="ps-shoe mb-30">
                <div class="ps-shoe__thumbnail"><a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a><img src="images/shoe/7.jpg" alt=""><a class="ps-shoe__overlay" href="product-detail.html"></a>
                </div>
                <div class="ps-shoe__content">
                  <div class="ps-shoe__variants">
                    <div class="ps-shoe__variant normal"><img src="images/shoe/2.jpg" alt=""><img src="images/shoe/3.jpg" alt=""><img src="images/shoe/4.jpg" alt=""><img src="images/shoe/5.jpg" alt=""></div>
                    <select class="ps-rating ps-shoe__rating">
                      <option value="1">1</option>
                      <option value="1">2</option>
                      <option value="1">3</option>
                      <option value="1">4</option>
                      <option value="2">5</option>
                    </select>
                  </div>
                  <div class="ps-shoe__detail"><a class="ps-shoe__name" href="#">Air Jordan 7 Retro</a>
                    <p class="ps-shoe__categories"><a href="#">Men shoes</a>,<a href="#"> Nike</a>,<a href="#"> Jordan</a></p><span class="ps-shoe__price"> £ 120</span>
                  </div>
                </div>
              </div>
            </div>
          </div> --}}
          {{-- <div class="grid-item kids">
            <div class="grid-item__content-wrapper">
              <div class="ps-shoe mb-30">
                <div class="ps-shoe__thumbnail"><a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a><img src="images/shoe/8.jpg" alt=""><a class="ps-shoe__overlay" href="product-detail.html"></a>
                </div>
                <div class="ps-shoe__content">
                  <div class="ps-shoe__variants">
                    <div class="ps-shoe__variant normal"><img src="images/shoe/2.jpg" alt=""><img src="images/shoe/3.jpg" alt=""><img src="images/shoe/4.jpg" alt=""><img src="images/shoe/5.jpg" alt=""></div>
                    <select class="ps-rating ps-shoe__rating">
                      <option value="1">1</option>
                      <option value="1">2</option>
                      <option value="1">3</option>
                      <option value="1">4</option>
                      <option value="2">5</option>
                    </select>
                  </div>
                  <div class="ps-shoe__detail"><a class="ps-shoe__name" href="#">Air Jordan 7 Retro</a>
                    <p class="ps-shoe__categories"><a href="#">Men shoes</a>,<a href="#"> Nike</a>,<a href="#"> Jordan</a></p><span class="ps-shoe__price"> £ 120</span>
                  </div>
                </div>
              </div>
            </div>
          </div> --}}
        </div>
      </div>
    </div>
    {{-- {{ $products->links() }} --}}
    <div class="ps-section ps-owl-root">
      <div class="ps-container">
        <div class="ps-section__header">
          <div class="row" style="text-align-last: center;">
              <div class="ps-owl-actions">
                {{ $products->links() }}
                {{-- <a class="ps-prev" href="#"><i class="ps-icon-arrow-right"></i>Prev</a>
                <a class="ps-next" href="#">Next<i class="ps-icon-arrow-left"></i></a> --}}
              </div>
          </div>
        </div>
      </div>
    </div>
    @endsection