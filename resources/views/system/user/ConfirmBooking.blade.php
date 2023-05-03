@include('system.user.layouts.header')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center"
             style="background-image: url('assets2/img/page-header.jpg');">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2>Confirm your booking</h2>
                    </div>
                </div>
            </div>
        </div>

    </div><!-- End Breadcrumbs -->

    <section class="sample-page">
        <div class="container" data-aos="fade-up">
            <div class="col-12">
                <div class="card overflow-auto">
                    <div class="card-body">
                        <form method="POST" action="{{ url('Confirm') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row row-cols-2">
                                <div class="col" style="width: 85%">
                                    <h5 class="card-title" style="color: #0a53be">Your Ticket </h5>
                                </div>
                                <div class="col" style="width: 15%">
                                    <input value="Confirm" type="submit"
                                           class="btn btn-success btn-icon-split"
                                           style="width: 150px;align-self: flex-end">
                                    <input name="TicketID" value="{{$ticketDetails->id}}" hidden="hidden">
                                </div>
                            </div>
                            <br>
                            <div class="row row-cols-2">
                                <div class="col">
                                    <label style="font-weight: bold;color: red">Name:</label>
                                    <label>  {{$userDetails->name}}</label>
                                </div>

                                <div class="col">
                                    <label style="font-weight: bold;color: red">Phone:</label>
                                    <label>  {{$userDetails->phone}}</label>
                                </div>
                            </div>
                            <br>
                            <div class="row row-cols-2">
                                <div class="col">
                                    <label style="font-weight: bold;color: red">Train number:</label>
                                    <label>  {{$ticketDetails->TrainNum}}</label>
                                </div>

                                <div class="col">
                                    <label style="font-weight: bold;color: red">Class:</label>
                                    <label>    @if($ticketDetails->class == 1)
                                            1st
                                        @else
                                            2nd
                                        @endif
                                    </label>
                                </div>
                            </div>
                            <br>
                            <div class="row row-cols-2">
                                <div class="col">
                                    <label style="font-weight: bold;color: red">Date:</label>
                                    <label>  {{$ticketDetails->Date}}</label>
                                </div>

                                <div class="col">
                                    <label style="font-weight: bold;color: red">Time:</label>
                                    <label>  {{$ticketDetails->Time}}</label>
                                </div>
                            </div>
                            <br>
                            <div class="row row-cols-2">
                                <div class="col">
                                    <label style="font-weight: bold;color: red">Booking Date:</label>
                                    <label>  {{$currentDate}}</label> <input name="date" value=" {{$currentDate}}"
                                                                             hidden="hidden">
                                </div>

                                <div class="col">
                                    <label style="font-weight: bold;color: red">Booking Time:</label>
                                    <label>  {{$currentTime}}</label> <input name="time" value=" {{$currentTime}}"
                                                                             hidden="hidden">
                                </div>
                            </div>
                            <br>
                            <div class="row row-cols-2">
                                <div class="col">
                                    <label style="font-weight: bold;color: red">Number of tickets:</label>
                                    <label>  {{$NofTickets}}</label>
                                    <input name="NTic" value=" {{$NofTickets}}" hidden="hidden">
                                </div>

                                <div class="col">
                                    <label style="font-weight: bold;color: red">Total price:</label>
                                    <label> ${{$total}}</label>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>

            </div>


        </div>

    </section>

</main><!-- End #main -->

<!-- ======= Footer ======= -->
@include('system.user.layouts.footer')
