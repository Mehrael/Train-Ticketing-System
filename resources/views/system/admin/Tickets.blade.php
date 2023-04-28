@include('system.admin.layouts.header')
<!-- End Header -->

<!-- ======= Sidebar ======= -->
@include('system.admin.layouts.sidebar')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Tickets</h1>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="row">
            <div class="row">
                <div class="">
                    <form method="POST" action="{{ url('addTicket') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex align-items-center form-group ">
                            <div class="flex-grow-1 mr-3 mb-4 col-lg-3" style="margin-right: 400px">
                                <label>Schedule ID</label>
                                <select name="scheduleID" class="form-control">
                                    <option selected>Choose Schedule...</option>
                                    @foreach($schedule as $s)
                                        <option value="{{$s->id}}">{{$s->id}}</option>
                                    @endforeach
                                </select>

                                <label>Class</label>
                                <select name="class" class="form-control">
                                    <option selected value="0">Choose Class...</option>
                                    <option value="1">1st</option>
                                    <option value="2">2nd</option>
                                </select>

                                <label>Price</label>
                                <input type="text" class="form-control" name="price">
                            </div>
                            <input type="submit" value="Add" class="btn btn-success btn-icon-split"
                                   style="width: 100px">
                        </div>
                    </form>
                    <br>

                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">

                            <div class="card-body">
                                <h5 class="card-title">Tickets</h5>

                                <table class="table table-borderless datatable">
                                    <thead>
                                    <tr>
                                        <th scope="col">Schedule ID</th>
                                        <th scope="col">Train Number</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Time</th>
                                        <th scope="col">From</th>
                                        <th scope="col">To</th>
                                        <th scope="col">Class</th>
                                        <th scope="col">Price</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($tickets as $t)
                                        <tr>
                                            <th scope="row">{{$t->id}}</th>
                                            <td>{{$t->TrainNum}}</td>
                                            <td>{{$t->Date}}</td>
                                            <td>{{$t->Time}}</td>
                                            <td>{{$t->start_station}}</td>
                                            <td>{{$t->end_station}}</td>
                                            <td>@if($t->class == 1)
                                                    1st
                                                @else
                                                    2nd
                                                @endif</td>
                                            <td>${{$t->price}}</td>
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
