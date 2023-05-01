@include('system.user.layouts.header')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center"
             style="background-image: url('assets2/img/page-header.jpg');">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2>Enjoy your Trip ;)</h2>
                    </div>
                </div>
            </div>
        </div>

    </div><!-- End Breadcrumbs -->

    <section class="sample-page">
        <div class="container" data-aos="fade-up">
            <div class="card-body col">
                <div class="row row-cols-2">
                    <div class="col" style="justify-self: start">
                        <p>Here is Your Ticket save it to pay at the station</p>
                    </div>
                    <div class="col" style="justify-self: end;position: relative">
                        <a class="col btn btn-primary" style="float: right; width: 200px"
                           href="{{asset($path)}}" download>Download</a>
                    </div>
                </div>
                <br>
                <div class="row" style="justify-self: center">
                    <img src="{{asset($path)}}" width="500" height="500">
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->

<!-- ======= Footer ======= -->
@include('system.user.layouts.footer')
