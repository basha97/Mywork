    <!-- BEGIN SIDEBPANEL-->
    <nav class="page-sidebar" data-pages="sidebar">
      <!-- BEGIN SIDEBAR MENU TOP TRAY CONTENT-->
      <div class="sidebar-overlay-slide from-top" id="appMenu">
        <div class="row">
          <div class="col-xs-6 no-padding">
            <a href="#" class="p-l-40"><img src="{{ URL::asset('assets/img/demo/social_app.svg') }}" alt="socail">
            </a>
          </div>
          <div class="col-xs-6 no-padding">
            <a href="#" class="p-l-10"><img src="{{ URL::asset('assets/img/demo/email_app.svg') }}" alt="socail">
            </a>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-6 m-t-20 no-padding">
            <a href="#" class="p-l-40"><img src="{{ URL::asset('assets/img/demo/calendar_app.svg')}}" alt="socail">
            </a>
          </div>
          <div class="col-xs-6 m-t-20 no-padding">
            <a href="#" class="p-l-10"><img src="{{ URL::asset('assets/img/demo/add_more.svg')}}" alt="socail">
            </a>
          </div>
        </div>
      </div>
      <!-- END SIDEBAR MENU TOP TRAY CONTENT-->
      <!-- BEGIN SIDEBAR MENU HEADER-->
      <div class="sidebar-header">
        <img src="{{ URL::asset('assets/img/logo_white.png')}}" alt="logo" class="brand" data-src="{{ URL::asset('assets/img/logo_white.png') }}" data-src-retina="{{ URL::asset('assets/img/logo_white_2x.png') }}" width="78" height="22">
        <div class="sidebar-header-controls">
          <button type="button" class="btn btn-xs sidebar-slide-toggle btn-link m-l-20 hidden-md-down" data-pages-toggle="#appMenu"><i class="fa fa-angle-down fs-16"></i>
          </button>
          <button type="button" class="btn btn-link hidden-md-down" data-toggle-pin="sidebar"><i class="fa fs-12"></i>
          </button>
        </div>
      </div>
      <!-- END SIDEBAR MENU HEADER-->
      <!-- START SIDEBAR MENU -->
      <div class="sidebar-menu">
        <!-- BEGIN SIDEBAR MENU ITEMS-->
        <ul class="menu-items">
          <li class="m-t-30 ">
            <a href="{{ URL::to('/') }}" class="detailed">
              <span class="title">Dashboard</span>
            </a>
            <span class="bg-success icon-thumbnail"><i class="pg-home"></i></span>
          </li>
          <li class="">
            <a href="{{ URL::to('candidate') }}" ><span class="title">Candidate</span></a>
            <span class="icon-thumbnail">Cl</span>
          </li>
          <li>
            <a href="javascriot:;"><span class="title">Reports</span>
            <span class=" arrow"></span></a>
            <span class="icon-thumbnail"><i class="pg-calender"></i></span>
            <ul class="sub-menu">
              <li class="">
                <a href="javascriot:;"><span class="title">Candidates</span>
            <span class=" arrow"></span></a>
            <span class="icon-thumbnail"><i class="fa fa-users"></i></span>
                <ul class="sub-menu">
                  <li class="">
                <a href="{{ URL::to('overview') }}">Overview</a>
                <span class="icon-thumbnail">c</span>
              </li>
              <li class="">
                <a href="{{ URL::to('candidateprogress') }}">Candidate Progress</a>
                <span class="icon-thumbnail">c</span>
              </li>
              <li class="">
                <a href="{{ URL::to('timetohire') }}">Time To Hire</a>
                <span class="icon-thumbnail">c</span>
              </li>
              <li class="">
                <a href="{{ URL::to('timetodisqualify') }}">Time To Disqualify</a>
                <span class="icon-thumbnail">L</span>
              </li>
              <li class="">
                <a href="{{ URL::to('applicantconversation') }}">Applicant Conversation</a>
                <span class="icon-thumbnail">M</span>
              </li>
              <li class="">
                <a href="{{ URL::to('pipelinedetails') }}">Pipeline Details</a>
                <span class="icon-thumbnail">La</span>
              </li>
              <li class="">
                <a href="{{ URL::to('proceeddetails') }}">proceed Details</a>
                <span class="icon-thumbnail">D</span>
              </li>
              <li class="">
                <a href="{{ URL::to('dropoffdetails') }}">Drop-off Details</a>
                <span class="icon-thumbnail">D</span>
              </li>
              <li class="">
                <a href="{{ URL::to('candidateorigin') }}">Candidate Origin</a>
                <span class="icon-thumbnail">D</span>
              </li>
              <li class="">
                <a href="{{ URL::to('slippingaway') }}">Slipping Away</a>
                <span class="icon-thumbnail">D</span>
              </li>
            </ul>
              </li>
              
            </ul>
          </li>

           <li class="">
            <a href="{{ URL::to('jobs') }}" ><span class="title">Jobs</span></a>
            <span class="icon-thumbnail">Jb</span>
          </li>
          <li class="">
            <a href="{{ URL::to('jobAdd') }}" ><span class="title">AddJobs</span></a>
            <span class="icon-thumbnail">AJ</span>
          </li>
          <li class="">
            <a href="{{ URL::to('country') }}" ><span class="title">Country</span></a>
            <span class="icon-thumbnail">C</span>
          </li>
          <li class="">
            <a href="{{ URL::to('state') }}" ><span class="title">State</span></a>
            <span class="icon-thumbnail">S</span>
          </li>
          <li class="">
            <a href="{{ URL::to('pipeline') }}" ><span class="title">pipeline</span></a>
            <span class="icon-thumbnail">PL</span>
          </li>
          <li class="">
            <a href="{{ URL::to('talentpoolindex') }}" ><span class="title">TalentPool</span></a>
            <span class="icon-thumbnail">TP</span>
          </li>
          <li class="">
            <a href="{{ URL::to('applyjobs') }}" ><span class="title">Apply Job</span></a>
            <span class="icon-thumbnail">AJ</span>
          </li>
          <li class="">
            <a href="{{ URL::to('settingDepartment') }}" ><span class="title">Department</span></a>
            <span class="icon-thumbnail">D</span>
          </li>
          <li class="">
            <a href="{{ URL::to('setting') }}" ><span class="title">Setting</span></a>
            <span class="icon-thumbnail">S</span>
          </li>
         </ul>
        <div class="clearfix"></div>
       </div>
      <!-- END SIDEBAR MENU -->
    </nav>
    <!-- END SIDEBAR -->
    <!-- END SIDEBPANEL-->