@include('system.user.layouts.header')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('assets2/img/page-header.jpg');">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2>Trains' Schedule</h2>
                    </div>
                </div>
            </div>
        </div>

    </div><!-- End Breadcrumbs -->

    <section class="sample-page">
        <div class="container" data-aos="fade-up">
            <div class="col-12">
                <div class="card recent-sales overflow-auto">

                    <div class="card-body">
                        <h4 class="card-title">Schedules</h4>
<br>
                        <table class="table table-borderless datatable">
                            <thead>
                            <tr>
                                <th scope="col">Train Number</th>
                                <th scope="col">Date</th>
                                <th scope="col">Time</th>
                                <th scope="col">From</th>
                                <th scope="col">To</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($schedule as $s)
                                <tr>
                                    <td>{{$s->TrainNum}}</td>
                                    <td>{{$s->Date}}</td>
                                    <td>{{$s->Time}}</td>
                                    <td>{{$s->start_station_name}}</td>
                                    <td>{{$s->end_station_name}}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->

<!-- ======= Footer ======= -->
@include('system.user.layouts.footer')
