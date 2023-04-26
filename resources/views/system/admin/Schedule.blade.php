@include('system.admin.layouts.header')
<!-- End Header -->

<!-- ======= Sidebar ======= -->
@include('system.admin.layouts.sidebar')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Schedule</h1>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="row">
            <div class="row">
                <div class="">
                    <form method="POST" action="{{ url('addToSchedule') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex align-items-center form-group ">
                            <div class="flex-grow-1 mr-3 mb-4 col-lg-3" style="margin-right: 400px">
                                <label>Train</label>
                                <select name="TrainID" class="form-control">
                                    <option selected>Choose Train...</option>
                                    @foreach($trains as $t)
                                        <option value="{{$t->id}}">{{$t->TrainNum}}</option>
                                    @endforeach
                                </select>

                                <label>Date</label>
                                <input type="date" class="form-control" name="date">

                                <label>Time</label>
                                <input type="time" class="form-control" name="time">

                                <label>From</label>
                                <select name="StartID" class="form-control">
                                    <option selected>Choose Station...</option>
                                    @foreach($stations as $s)
                                        <option value="{{$s->id}}">{{$s->name}}</option>
                                    @endforeach
                                </select>

                                <label>To</label>
                                <select name="EndID" class="form-control">
                                    <option selected>Choose Station...</option>
                                    @foreach($stations as $s)
                                        <option value="{{$s->id}}">{{$s->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="submit" value="Add" class="btn btn-success btn-icon-split"
                                   style="width: 100px">
                        </div>
                    </form>
                    <br>


                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">

                            <div class="card-body">
                                <h5 class="card-title">Schedules</h5>

                                <table class="table table-borderless datatable">
                                    <thead>
                                    <tr>
                                        <th scope="col">ID</th>
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
                                            <th scope="row">{{$s->id}}</th>
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
            </div>
        </div>
    </section>

</main><!-- End #main -->

<!-- ======= Footer ======= -->
@include('system.admin.layouts.footer')
