@include('system.user.layouts.header')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('assets2/img/page-header.jpg');">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2>Complete your data first ;)</h2>
                    </div>
                </div>
            </div>
        </div>

    </div><!-- End Breadcrumbs -->

    <section class="sample-page">
        <div class="container" data-aos="fade-up">
            <form method="POST" action="{{ url('UpdateUserData') }}" enctype="multipart/form-data">
                @csrf
                <div class="d-flex align-items-center form-group ">
                    <div class="flex-grow-1 mr-3 mb-4 col-lg-3" style="margin-right: 400px">

                        <label>Phone</label>
                        <input type="text" class="form-control" name="phone">

                        <label>Photo</label>
                        <input type="file" class="form-control" name="photo">
                    </div>
                    <input type="submit" value="Add" class="btn btn-success btn-icon-split"
                           style="width: 100px">
                </div>
            </form>
        </div>
    </section>

</main><!-- End #main -->

<!-- ======= Footer ======= -->
@include('system.user.layouts.footer')
