@extends('groups.user.layouts.app')


@section('content')


<div class="resume">
    <!-- Sidebar -->
    <div class="r-sidebar">
        <div class="r-sidebar-item">
            <!-- Sidebar Image -->
            <div class="img">
                @if(is_null($user->image))
                    <img src="/assets/user/static/images/noImage.jpg" alt="" class="img-responsive w-100" />
                @else
                    <img src="/storage/{{ $user->image }}" alt="" class="img-responsive w-100" />
                @endif
            </div>
            <!-- Name -->
            <div class="name">

                <h3>{{ $user->name }}</h3>
                <small>@if($user->freelancer) Фрилансер @else Заказчик @endif</small>
            </div>
            <div class="clearfix"></div>
        </div>
        <!-- Detail -->
        <div class="r-detail">
            <table>
                <tr>
                    <th>D.O.B</th>
                    <td>08 Sep 1985</td>
                </tr>
                <tr>
                    <th>Age</th>
                    <td>28 Yrs</td>
                </tr>
                <tr>
                    <th>Qualification</th>
                    <td>M.E., P.hD</td>
                </tr>
                <tr>
                    <th>Blood Group</th>
                    <td>A Positive</td>
                </tr>
                <tr>
                    <th>Mobile</th>
                    <td>+ 832 933 9498</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <th>Location</th>
                    <td>Bangalore, India</td>
                </tr>
            </table>
        </div>
        <!-- Social -->
        <div class="social">
            <a href="ui-304.html#" class="facebook"><i class="fa fa-facebook"></i></a>
            <a href="ui-304.html#" class="twitter"><i class="fa fa-twitter"></i></a>
            <a href="ui-304.html#" class="google-plus"><i class="fa fa-google-plus"></i></a>
            <a href="ui-304.html#" class="linkedin"><i class="fa fa-linkedin"></i></a>
        </div>

        <a class="btn btn-green" href="{{ route('user.settings.index') }}">
            Settings
        </a>
    </div>
    <!-- Main -->
    <div class="main-block bg-orange">
        <div class="objective">
            <h3>Welcome</h3>
            <div class="objective-content">
                <p>Hi!, I'm Ashok from Madurai, India. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt nui dolorem ipsum quia dolor sit amet consectetur.</p>
            </div>
        </div>
        <hr>

        @includeWhen(count($categories), 'groups.user.pages.index.include.category')

        <hr>
        <!-- Education -->
        <div class="education">
            <h3>Education</h3>
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <!-- Education Item -->
                    <div class="education-item">
                        <h6>[ 2002 - 2006 ]</h6>
                        <h4>Bachelor of Engineering</h4>
                        <p>Lorem ipsum dolor sit ametconsectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <!-- Education Item -->
                    <div class="education-item">
                        <h6>[ 2006 - 2008 ]</h6>
                        <h4>Master of Engineering</h4>
                        <p>Lorem ipsum dolor sit ametconsectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <!-- Education Item -->
                    <div class="education-item">
                        <h6>[ 2008 - 2010 ]</h6>
                        <h4>Doctorate in Engineering</h4>
                        <p>Lorem ipsum dolor sit ametconsectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <hr>
        <!-- Experience -->
        <div class="experience">
            <h3>Experience</h3>
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <!-- Experience Item -->
                    <div class="experience-item">
                        <!-- Experience Detail -->
                        <div class="experience-detail">
                            <h6>[ Sep 2013 To Present ]</h6>
                            <h4>Sr. Web Designer at AshoApps</h4>
                        </div>
                        <p> Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="experience-item">
                        <!-- Experience Detail -->
                        <div class="experience-detail">
                            <h6>[ Aug 2012 To Sep 2013 ]</h6>
                            <h4>Web Designer at TechnoForm</h4>
                        </div>
                        <p> Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="experience-item">
                        <!-- Experience Detail -->
                        <div class="experience-detail">
                            <h6>[ Oct 2011 To Aug 2012 ]</h6>
                            <h4>Web Developer at RokSolution</h4>
                        </div>
                        <p> Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores.</p>
                    </div>
                </div>
            </div>
        </div>

        <hr />

    </div>
    <!-- Clearfix -->
    <div class="clearfix"></div>
</div>
<!-- Resume Ends -->



@endsection

@section('footer')

@endsection