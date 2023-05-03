@section('sidebar')
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link " href="{{url('dashboard')}}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{url('station')}}">
                    <i class="bi bi-ev-station"></i>
                    <span>Station</span>
                </a>

            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{'trains'}}">
                    <i class="bi bi-train-front"></i>
                    <span>Trains</span>
                </a>
            </li><!-- End Trains Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{'schedule'}}">
                    <i class="bi bi-table"></i>
                    <span>Schedule</span>
                </a>
            </li><!-- End Schedule Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{'tickets'}}">
                    <i class="bi bi-ticket-detailed"></i>
                    <span>Tickets</span>
                </a>
            </li><!-- End Tickets Page Nav -->


            <li class="nav-item">
                <a class="nav-link collapsed" href="bookings">
                    <i class="bi bi-card-list"></i>
                    <span>Bookings</span>
                </a>
            </li><!-- End Bookings Page Nav -->

        </ul>

    </aside><!-- End Sidebar-->
@show
