@include('system.admin.layouts.header')
<!-- End Header -->

<!-- ======= Sidebar ======= -->
@include('system.admin.layouts.sidebar')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Train</h1>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="row">
            <div class="row">
                <div class="">
                    <form method="POST" action="{{ url('addTrain') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex align-items-center form-group ">
                            <div class="flex-grow-1 mr-3 mb-4 col-lg-3" style="margin-right: 400px">
                                <label>Train's Name</label>
                                <input type="text" class="form-control" name="trainNum">
                                <label>Type</label>
                                <select name="type" class="form-control">
                                    <option selected value="0">Choose Type...</option>
                                    <option value="0">Express</option>
                                    <option value="1">VIP</option>
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
                                <h5 class="card-title">Trains</h5>

                                <table class="table table-borderless datatable">
                                    <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Train Name</th>
                                        <th scope="col">Type</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($trains as $t)
                                        <tr>
                                            <th scope="row">{{$t->id}}</th>
                                            <td>{{$t->TrainNum}}</td>
                                            @if($t->Type == 0)
                                                <td>Express</td>
                                            @else
                                                <td>VIP</td>
                                            @endif
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
