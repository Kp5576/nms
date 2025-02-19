
@extends('layouts.master')

@section('styles')



@endsection

@section('content')

                            <!-- PAGE-HEADER -->
                            <div class="page-header">
                                <h1 class="page-title">Shop</h1>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">E-Commerce</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Shop</li>
                                </ol>
                            </div>
                            <!-- PAGE-HEADER END -->

                            <!-- ROW-1 OPEN -->
                            <div class="row row-cards">
                                <div class="col-xl-3 col-lg-4">
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12">
                                            <form class="shop__filter card">
                                                <div class="card-header">
                                                    <h3 class="card-title">
                                                        Colors
                                                    </h3>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row gutters-xs">
                                                        <div class="col-auto">
                                                            <label class="colorinput">
                                                                <input name="color" type="radio" value="azure" class="colorinput-input" checked="">
                                                                <span class="colorinput-color bg-azure"></span>
                                                            </label>
                                                        </div>
                                                        <div class="col-auto">
                                                            <label class="colorinput">
                                                                <input name="color" type="radio" value="indigo" class="colorinput-input">
                                                                <span class="colorinput-color bg-indigo"></span>
                                                            </label>
                                                        </div>
                                                        <div class="col-auto">
                                                            <label class="colorinput">
                                                                <input name="color" type="radio" value="purple" class="colorinput-input">
                                                                <span class="colorinput-color bg-purple"></span>
                                                            </label>
                                                        </div>
                                                        <div class="col-auto">
                                                            <label class="colorinput">
                                                                <input name="color" type="radio" value="pink" class="colorinput-input">
                                                                <span class="colorinput-color bg-pink"></span>
                                                            </label>
                                                        </div>
                                                        <div class="col-auto">
                                                            <label class="colorinput">
                                                                <input name="color" type="radio" value="red" class="colorinput-input">
                                                                <span class="colorinput-color bg-red"></span>
                                                            </label>
                                                        </div>
                                                        <div class="col-auto">
                                                            <label class="colorinput">
                                                                <input name="color" type="radio" value="orange" class="colorinput-input">
                                                                <span class="colorinput-color bg-orange"></span>
                                                            </label>
                                                        </div>
                                                        <div class="col-auto">
                                                            <label class="colorinput">
                                                                <input name="color" type="radio" value="yellow" class="colorinput-input">
                                                                <span class="colorinput-color bg-yellow"></span>
                                                            </label>
                                                        </div>
                                                        <div class="col-auto">
                                                            <label class="colorinput">
                                                                <input name="color" type="radio" value="lime" class="colorinput-input">
                                                                <span class="colorinput-color bg-lime"></span>
                                                            </label>
                                                        </div>
                                                        <div class="col-auto">
                                                            <label class="colorinput">
                                                                <input name="color" type="radio" value="green" class="colorinput-input">
                                                                <span class="colorinput-color bg-green"></span>
                                                            </label>
                                                        </div>
                                                        <div class="col-auto">
                                                            <label class="colorinput">
                                                                <input name="color" type="radio" value="teal" class="colorinput-input">
                                                                <span class="colorinput-color bg-teal"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="card-title"> Categories &amp; Fliters</div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="custom-checkbox custom-control">
                                                        <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1" checked="">
                                                        <label for="checkbox-1" class="custom-control-label">Mens</label>
                                                    </div>
                                                    <div class="custom-checkbox custom-control">
                                                        <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-2">
                                                        <label for="checkbox-2" class="custom-control-label">Womens</label>
                                                    </div>
                                                    <div class="custom-checkbox custom-control">
                                                        <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-3">
                                                        <label for="checkbox-3" class="custom-control-label">Kids</label>
                                                    </div>
                                                    <div class="custom-checkbox custom-control">
                                                        <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-4">
                                                        <label for="checkbox-4" class="custom-control-label">Others</label>
                                                    </div>
                                                    <div class="mb-3 mt-3">
                                                        <label class="form-label mt-0">Basic</label>
                                                        <select class="form-control select2 custom-select" data-placeholder="Choose one">
                                                            <option label="Choose one">
                                                            </option>
                                                                    <option value="1">Dress</option>
                                                                    <option value="2">Bags &amp; Purses</option>
                                                                    <option value="3">Coat &amp; Jacket</option>
                                                                    <option value="4">Beauty</option>
                                                                    <option value="5">Jeans</option>
                                                                    <option value="5">Jewellery</option>
                                                                    <option value="5">Electronics</option>
                                                                    <option value="5">Sports</option>
                                                                    <option value="5">Technology</option>
                                                                    <option value="5">Watches</option>
                                                                    <option value="5">Accessories</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label mt-0">Brand</label>
                                                        <select class="form-control select2 custom-select" data-placeholder="Choose one">
                                                            <option label="Choose one">
                                                            </option>
                                                            <option value="1">White</option>
                                                            <option value="2">Black</option>
                                                            <option value="3">Red</option>
                                                            <option value="4">Green</option>
                                                            <option value="5">Blue</option>
                                                            <option value="6">Yellow</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label mt-0">Type</label>
                                                        <select class="form-control select2 custom-select" data-placeholder="Choose one">
                                                            <option label="Choose one">
                                                            </option>
                                                            <option value="1">Extra Small</option>
                                                            <option value="2">Small</option>
                                                            <option value="3">Medium</option>
                                                            <option value="4">Large</option>
                                                            <option value="5">Extra Large</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label mt-0">Color</label>
                                                        <select class="form-control select2 custom-select" data-placeholder="Choose one">
                                                            <option label="Choose one">
                                                            </option>
                                                            <option value="1">White</option>
                                                            <option value="2">Black</option>
                                                            <option value="3">Red</option>
                                                            <option value="4">Green</option>
                                                            <option value="5">Blue</option>
                                                            <option value="6">Yellow</option>
                                                        </select>
                                                    </div>
                                                    <a class="btn btn-primary my-1" href="javascript:void(0);">Apply Filter</a>
                                                    <a class="btn btn-danger" href="javascript:void(0);">Search Now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- COL-END -->
                                <div class="col-xl-9 col-lg-8">
                                    <div class="card">
                                        <div class="row card-body p-2">
                                            <div class="col-sm-12 p-0">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="Search ...">
                                                    <span class="">
                                                        <button class="btn btn-success" type="button">Search</button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-xxl-3 col-xl-6 col-sm-6">
                                            <div class="card item-card">
                                                <div class="ribbone">
                                                        <div class="ribbon"><span>new</span></div>
                                                </div>
                                                <div class="product-grid6  card-body">
                                                    <div class="product-image6">
                                                        <a href="javascript:void(0);">
                                                            <img class="img-fluid" src="{{asset('build/assets/images/pngs/9.png')}}" alt="img">
                                                        </a>
                                                    </div>
                                                    <div class="product-content text-center">
                                                        <div class="mb-2 text-warning">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-half-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                        <h4 class="title"><a href="javascript:void(0);">Perfume</a></h4>
                                                        <div class="price">$16,599<span class="ms-4">$19,799</span></div>
                                                    </div>
                                                    <ul class="icons">
                                                        <li><a href="{{url('shop-description')}}"><i class="fa fa-search "></i></a></li>
                                                        <li><a href="{{url('wishlist')}}"><i class="fa fa-heart-o"></i></a></li>
                                                        <li><a href="{{url('cart')}}"><i class="fa fa-shopping-cart"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xxl-3 col-xl-6 col-sm-6">
                                            <div class="card item-card">
                                                <span class="ribbon">
                                                    <span>25%</span>
                                                </span>
                                                <div class="product-grid6 card-body">
                                                    <div class="product-image6">
                                                        <a href="javascript:void(0);">
                                                            <img class="img-fluid" src="{{asset('build/assets/images/pngs/1.png')}}" alt="img">
                                                        </a>
                                                    </div>
                                                    <div class="product-content text-center">
                                                        <div class="text-center mb-2 text-warning">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-half-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                        <h4 class="title"><a href="javascript:void(0);">Camera</a></h4>
                                                        <div class="price">$529<span class="ms-4">$799</span></div>
                                                    </div>
                                                    <ul class="icons">
                                                        <li><a href="{{url('shop-description')}}"><i class="fa fa-search"></i></a></li>
                                                        <li><a href="{{url('wishlist')}}"><i class="fa fa-heart-o"></i></a></li>
                                                        <li><a href="{{url('cart')}}"><i class="fa fa-shopping-cart"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xxl-3 col-xl-6 col-sm-6">
                                            <div class="card item-card">
                                                <div class="product-grid6  card-body">
                                                    <div class="product-image6">
                                                        <a href="javascript:void(0);">
                                                            <img class="img-fluid" src="{{asset('build/assets/images/pngs/7.png')}}" alt="img">
                                                        </a>
                                                    </div>
                                                    <div class="product-content text-center">
                                                        <div class="text-center mb-2 text-warning">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-half-o"></i>
                                                        </div>
                                                        <h4 class="title"><a href="javascript:void(0);">Smart Watch</a></h4>
                                                        <div class="price">$25,239<span class="ms-4">$34,399</span></div>
                                                    </div>
                                                    <ul class="icons">
                                                        <li><a href="{{url('shop-description')}}"><i class="fa fa-search"></i></a></li>
                                                        <li><a href="{{url('wishlist')}}"><i class="fa fa-heart-o"></i></a></li>
                                                        <li><a href="{{url('cart')}}"><i class="fa fa-shopping-cart"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xxl-3 col-xl-6 col-sm-6">
                                            <div class="card item-card">
                                                <div class="product-grid6  card-body">
                                                    <div class="product-image6">
                                                        <a href="javascript:void(0);">
                                                            <img class="img-fluid" src="{{asset('build/assets/images/pngs/2.png')}}" alt="img">
                                                        </a>
                                                    </div>
                                                    <div class="product-content text-center">
                                                        <div class="text-center mb-2 text-warning">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-half-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                        <h4 class="title"><a href="javascript:void(0);">Flower Pot</a></h4>
                                                        <div class="price">$345<span class="ms-4">$459</span></div>
                                                    </div>
                                                    <ul class="icons">
                                                        <li><a href="{{url('shop-description')}}"><i class="fa fa-search"></i></a></li>
                                                        <li><a href="{{url('wishlist')}}"><i class="fa fa-heart-o"></i></a></li>
                                                        <li><a href="{{url('cart')}}"><i class="fa fa-shopping-cart"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xxl-3 col-xl-6 col-sm-6">
                                            <div class="card item-card">
                                                <div class="product-grid6  card-body ">
                                                    <div class="product-image6">
                                                        <a href="javascript:void(0);">
                                                            <img class="img-fluid" src="{{asset('build/assets/images/pngs/4.png')}}" alt="img">
                                                        </a>
                                                    </div>
                                                    <div class="product-content text-center">
                                                        <div class="text-center mb-2 text-warning">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-half-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                        <h4 class="title"><a href="javascript:void(0);">Womens Bag</a></h4>
                                                        <div class="price">$277<span class="ms-4">$456</span></div>
                                                    </div>
                                                    <ul class="icons">
                                                        <li><a href="{{url('shop-description')}}"><i class="fa fa-search"></i></a></li>
                                                        <li><a href="{{url('wishlist')}}"><i class="fa fa-heart-o"></i></a></li>
                                                        <li><a href="{{url('cart')}}"><i class="fa fa-shopping-cart"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xxl-3 col-xl-6 col-sm-6">
                                            <div class="card item-card">
                                                <div class="product-grid6  card-body">
                                                    <div class="product-image6">
                                                        <a href="javascript:void(0);">
                                                            <img class="img-fluid" src="{{asset('build/assets/images/pngs/8.png')}}" alt="img">
                                                        </a>
                                                    </div>
                                                    <div class="product-content text-center">
                                                        <div class="text-center mb-2 text-warning">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-half-o"></i>
                                                        </div>
                                                        <h4 class="title"><a href="javascript:void(0);">Stylish Shoes</a></h4>
                                                        <div class="price">$567<span class="ms-4">$866</span></div>
                                                    </div>
                                                    <ul class="icons">
                                                        <li><a href="{{url('shop-description')}}"><i class="fa fa-search"></i></a></li>
                                                        <li><a href="{{url('wishlist')}}"><i class="fa fa-heart-o"></i></a></li>
                                                        <li><a href="{{url('cart')}}"><i class="fa fa-shopping-cart"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xxl-3 col-xl-6 col-sm-6">
                                            <div class="card item-card">
                                                <div class="product-grid6  card-body">
                                                    <div class="product-image6">
                                                        <a href="javascript:void(0);">
                                                            <img class="img-fluid" src="{{asset('build/assets/images/pngs/3.png')}}" alt="img">
                                                        </a>
                                                    </div>
                                                    <div class="product-content text-center">
                                                        <div class="text-center mb-2 text-warning">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-half-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                        <h4 class="title"><a href="javascript:void(0);">HeadPhones</a></h4>
                                                        <div class="price">$455<span class="ms-4">$567</span></div>
                                                    </div>
                                                    <ul class="icons">
                                                        <li><a href="{{url('shop-description')}}"><i class="fa fa-search"></i></a></li>
                                                        <li><a href="{{url('wishlist')}}"><i class="fa fa-heart-o"></i></a></li>
                                                        <li><a href="{{url('cart')}}"><i class="fa fa-shopping-cart"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xxl-3 col-xl-6 col-sm-6">
                                            <div class="card item-card">
                                                <div class="product-grid6  card-body">
                                                    <div class="product-image6">
                                                        <a href="javascript:void(0);">
                                                            <img class="img-fluid" src="{{asset('build/assets/images/pngs/5.png')}}" alt="img">
                                                        </a>
                                                    </div>
                                                    <div class="product-content text-center">
                                                        <div class="text-center mb-2 text-warning">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-half-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                        <h4 class="title"><a href="javascript:void(0);">Chair</a></h4>
                                                        <div class="price">$345<span class="ms-4">$499</span></div>
                                                    </div>
                                                    <ul class="icons">
                                                        <li><a href="{{url('shop-description')}}"><i class="fa fa-search"></i></a></li>
                                                        <li><a href="{{url('wishlist')}}"><i class="fa fa-heart-o"></i></a></li>
                                                        <li><a href="{{url('cart')}}"><i class="fa fa-shopping-cart"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-5">
                                        <div class="float-end">
                                            <ul class="pagination ">
                                                <li class="page-item page-prev disabled">
                                                    <a class="page-link" href="javascript:void(0);" tabindex="-1">Prev</a>
                                                </li>
                                                <li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a></li>
                                                <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                                                <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                                                <li class="page-item"><a class="page-link" href="javascript:void(0);">4</a></li>
                                                <li class="page-item"><a class="page-link" href="javascript:void(0);">5</a></li>
                                                <li class="page-item page-next">
                                                    <a class="page-link" href="javascript:void(0);">Next</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div><!-- COL-END -->
                            </div>
                            <!-- ROW-1 CLOSED -->

@endsection

@section('scripts')

		<!-- INTERNAL SELECT2 JS -->
		<script src="{{asset('build/assets/plugins/select2/select2.full.min.js')}}"></script>
		@vite('resources/assets/js/select2.js')

@endsection
