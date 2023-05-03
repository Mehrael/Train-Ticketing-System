@include('system.admin.layouts.header')
<!-- End Header -->

<!-- ======= Sidebar ======= -->
@include('system.admin.layouts.sidebar')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Station</h1>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="row">
            <div class="row">
                <div class="">
                    <form method="POST" action="{{ url('addStation') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex align-items-center form-group ">
                            <div class="flex-grow-1 mr-3 mb-4 col-lg-3" style="margin-right: 400px">
                                <label>Station's Name</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <input type="submit" value="Add" class="btn btn-success btn-icon-split"
                                   style="width: 100px">
                        </div>
                    </form>
                    <br>


                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">

                            <div class="card-body">
                                <h5 class="card-title">Stations</h5>

                                <table class="table table-borderless datatable">
                                    <thead>
                                    <tr>
                                        <th scope="col">Station ID</th>
                                        <th scope="col">Station Name</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($stations as $s)
                                        <tr>
                                            <th scope="row">{{$s->id}}</th>
                                            <td>{{$s->name}}</td>
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
