@include('system.admin.layouts.header')
<!-- End Header -->

<!-- ======= Sidebar ======= -->
@include('system.admin.layouts.sidebar')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Bookings</h1>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="row">
            <div class="row">
                <div class="">

                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">

                            <div class="card-body">
                                <h5 class="card-title">Bookings</h5>

                                <table class="table table-borderless datatable">
                                    <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">User Name</th>
                                        <th scope="col">User Phone</th>
                                        <th scope="col">Number of tickets</th>
                                        <th scope="col">Train Number</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Class</th>
                                        <th scope="col">From</th>
                                        <th scope="col">To</th>
                                        <th scope="col">Date Time</th>
                                        <th scope="col">Booking Date Time</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($bookings as $b)
                                        <tr>
                                            <th scope="row">{{$b->id}}</th>
                                            <td>{{$b->user_name}}</td>
                                            <td>{{$b->phone}}</td>
                                            <td>{{$b->NumberOfTickets}}</td>
                                            <td>{{$b->TrainNum}}</td>

                                            @if($b->Type == 0)
                                                <td>Express</td>
                                            @else
                                                <td>VIP</td>
                                            @endif
                                            @if($b->class == 1)
                                                <td>1st</td>
                                            @else
                                                <td>2nd</td>
                                            @endif
                                            <td>{{$b->start_station}}</td>
                                            <td>{{$b->end_station}}</td>
                                            <td>{{$b->Date}} {{$b->Time}}</td>
                                            <td>{{$b->BookingDate}} {{$b->BookingTime}}</td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->

<!-- ======= Footer ======= -->
@include('system.admin.layouts.footer')
