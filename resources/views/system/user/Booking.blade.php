@include('system.user.layouts.header')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center"
             style="background-image: url('assets2/img/page-header.jpg');">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2>Time to book your trip</h2>
                    </div>
                </div>
            </div>
        </div>

    </div><!-- End Breadcrumbs -->

    <section class="sample-page">
        <div class="container" data-aos="fade-up">
            <form method="POST" action="{{ url('confirmBooking') }}" enctype="multipart/form-data">
                @csrf
                <div class="d-flex align-items-center form-group ">
                    <div class="flex-grow-1 mr-3 mb-4 col-lg-3" style="margin-right: 400px">
                        <label>Train Number</label>
                        <select name="TrainID" class="form-control">
                            <option selected>Choose...</option>
                            @foreach($trains as $t)
                                <option value="{{$t->id}}">{{$t->TrainNum}}</option>
                            @endforeach
                        </select>

                        <label>Class</label>
                        <select name="class" class="form-control">
                            <option selected value="0">Choose Class...</option>
                            <option value="1">1st</option>
                            <option value="2">2nd</option>
                        </select>

                        <label>Number of tickets</label>
                        <input type="number" class="form-control" name="NumTickets" placeholder="1" min="1">
                    </div>
                    <input type="submit" value="Book" class="btn btn-success btn-icon-split"
                           style="width: 100px">
                </div>
            </form>
            <br>

            <div class="col-12">
                <div class="card recent-sales overflow-auto">

                    <div class="card-body">
                        <h5 class="card-title" style="color: #0a53be">Tickets</h5>

                        <table class="table table-borderless datatable">
                            <thead>
                            <tr>
                                <th scope="col">Train Number</th>
{{--                                <th scope="col">Train Number</th>--}}
                                <th scope="col">Class</th>
                                <th scope="col">From</th>
                                <th scope="col">To</th>
                                <th scope="col">Date</th>
                                <th scope="col">Time</th>
                                <th scope="col">Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tickets as $t)
                                <tr>
                                    <th scope="row">{{$t->TrainNum}}</th>
{{--                                    <td>{{$t->TrainNum}}</td>--}}
                                    @if($t->class == 1)
                                        <td style="color: goldenrod"> 1st</td>
                                    @else
                                        <td style="color: green"> 2nd</td>
                                    @endif
                                    <td>{{$t->start_station}}</td>
                                    <td style="color: #001f8d">{{$t->end_station}}</td>
                                    <td>{{$t->Date}}</td>
                                    <td>{{$t->Time}}</td>
                                    <td style="color: red;font-weight: bold">${{$t->price}}</td>
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
