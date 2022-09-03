<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Shop Homepage - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('public/assets/assets/favicon.ico') }}" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('public/assets/css/styles.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/assets/css/loader.css') }}" rel="stylesheet" />
    <style>
        span.badge {
            position: absolute;
            background: #5f5493;
            top: 5px;
            left: 5px;
        }
    </style>
</head>

<body>
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Product Lazy Loading</h1>
                <p class="lead fw-normal text-white-50 mb-0">Load products after the page has been loaded</p>
            </div>
        </div>
    </header>
    <!-- Section-->

    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row">
                <h3>Featured Products</h3>
            </div>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center product-grid">
                <button class="has-ajax-load-data d-none" onclick="ajaxProductLoad(this)"
                    data-producttype="featuredProducts"></button>
                <div class="steps-container">
                    <div class="step-item loading"><span></span></div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row">
                <h3>Top Products</h3>
            </div>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center product-grid">
                <button class="has-ajax-load-data d-none" onclick="ajaxProductLoad(this)"
                    data-producttype="topProducts"></button>
                <div class="steps-container">
                    <div class="step-item loading"><span></span></div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row">
                <h3>Best Products</h3>
            </div>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center product-grid">
                <button class="has-ajax-load-data d-none" onclick="ajaxProductLoad(this)"
                    data-producttype="bestProducts"></button>
                <div class="steps-container">
                    <div class="step-item loading"><span></span></div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row">
                <h3>Random Products</h3>
            </div>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center product-grid">
                <button class="has-ajax-load-data d-none" onclick="ajaxProductLoad(this)"
                    data-producttype="randomProducts"></button>
                <div class="steps-container">
                    <div class="step-item loading"><span></span></div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; <a
                    href="https://github.com/muhammadZihad/ajax-product-loading-test">Muhammad AR Zihad</a> 2022</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Core theme JS-->
    <script>
        const ajaxLoadUrl = "{{ route('ajax-load-products') }}"
    </script>
    <script src="{{ asset('public/assets/js/scripts.js') }}"></script>
</body>

</html>
