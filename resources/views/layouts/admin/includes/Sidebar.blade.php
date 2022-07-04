<!--********************************** Sidebar start ***********************************-->
<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
            <li>
                <a href="{{ route('dashboard') }}" aria-expanded="false">
                    <i class="flaticon-381-networking"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('profile.view', \Illuminate\Support\Facades\Crypt::encrypt(\Illuminate\Support\Facades\Auth::user()->id)) }}" aria-expanded="false">
                    <i class="flaticon-381-user-1"></i>
                    <span class="nav-text">My Profile</span>
                </a>
            </li>
            @if(Auth::user()->info->role_id !== '5')
                <li>
                    <a href="{{ route('call.analytics') }}" aria-expanded="false">
                        <i class="flaticon-381-note"></i>
                        <span class="nav-text">Analytics</span>
                    </a>
                </li>
            @endif
            <li>
                <a href="{{ route('generate.qr') }}" aria-expanded="false">
                    <i class="flaticon-381-on"></i>
                    <span class="nav-text">Door QR</span>
                </a>
            </li>
            @if(isset(Auth::user()->info->roleDetail->rolePermission->permissions['fee']['list']) OR isset(Auth::user()->info->roleDetail->rolePermission->permissions['fee']['update']) OR isset(Auth::user()->info->roleDetail->rolePermission->permissions['fee']['delete']))
            <li>
                <a class="has-arrow ai-icon" href="javascript:void(0)" aria-expanded="false">
                    <i class="flaticon-381-unlocked"></i>
                    <span class="nav-text">Fee Collection</span>
                </a>
                <ul aria-expanded="false">
                    @if(isset(Auth::user()->info->roleDetail->rolePermission->permissions['fee']['update']))
                    <li><a href="{{route('new.collection')}}">Collect Fees</a></li>
                    @endif
                    @if(isset(Auth::user()->info->roleDetail->rolePermission->permissions['fee']['update']))
                    <li><a href="{{route('collection.request')}}">Collection Requests</a></li>
                    @endif
                    @if(isset(Auth::user()->info->roleDetail->rolePermission->permissions['fee']['list']))
                    <li><a href="{{ route('collection.history') }}">Collection History</a></li>
                    @endif
                </ul>
            </li>
            @endif
            @if(isset(Auth::user()->info->roleDetail->rolePermission->permissions['member']['create']) OR isset(Auth::user()->info->roleDetail->rolePermission->permissions['member']['create']))
            <li><a class="has-arrow ai-icon" href="javascript:void(0)" aria-expanded="false">
                    <i class="flaticon-381-user-2"></i>
                    <span class="nav-text">Member</span>
                </a>
                <ul aria-expanded="false">
                    @if(isset(Auth::user()->info->roleDetail->rolePermission->permissions['member']['create']))
                    <li><a href="{{route('member.create')}}">Create Member </a></li>
                    @endif
                    @if(isset(Auth::user()->info->roleDetail->rolePermission->permissions['member']['list']))
                    <li><a href="{{ route('member.index') }}">Member List</a></li>
                    @endif
                </ul>
            </li>
            @endif

            @if(isset(Auth::user()->info->roleDetail->rolePermission->permissions['member']['create']) OR isset(Auth::user()->info->roleDetail->rolePermission->permissions['member']['create']))
                <li><a class="has-arrow ai-icon" href="javascript:void(0)" aria-expanded="false">
                        <i class="flaticon-381-user-2"></i>
                        <span class="nav-text">product</span>
                    </a>
                    <ul aria-expanded="false">
                        @if(isset(Auth::user()->info->roleDetail->rolePermission->permissions['member']['create']))
                            <li><a href="{{route('category.index')}}">Category </a></li>
                        @endif
                        @if(isset(Auth::user()->info->roleDetail->rolePermission->permissions['member']['list']))
                            <li><a href="{{ route('subcategory.index') }}">Sub category</a></li>
                        @endif
                            @if(isset(Auth::user()->info->roleDetail->rolePermission->permissions['member']['list']))
                                <li><a href="{{ route('product.index') }}">Product list</a></li>
                            @endif
                    </ul>
                </li>
            @endif

            @if(isset(Auth::user()->info->roleDetail->rolePermission->permissions['attendance']['list']))
            <li><a class="has-arrow ai-icon" href="javascript:void(0)" aria-expanded="false">
                    <i class="flaticon-381-controls-3"></i>
                    <span class="nav-text">Attendance</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('attendance.index') }}">Show Attendance</a></li>
                </ul>
            </li>
            @endif
            @if(isset(Auth::user()->info->roleDetail->rolePermission->permissions['role']['create']) OR isset(Auth::user()->info->roleDetail->rolePermission->permissions['role']['list']))
            <li><a class="has-arrow ai-icon" href="javascript:void(0)" aria-expanded="false">
                    <i class="flaticon-381-privacy"></i>
                    <span class="nav-text">Roles Setting</span>
                </a>
                <ul aria-expanded="false">
                    @if(isset(Auth::user()->info->roleDetail->rolePermission->permissions['role']['list']))
                    <li><a href="{{ route('roles.index') }}">Manage Roles</a></li>
                    @endif
                    @if(isset(Auth::user()->info->roleDetail->rolePermission->permissions['role']['create']))
                    <li><a href="{{ route('roles.create') }}">Create Role</a></li>
                    @endif
                </ul>
            </li>
            @endif
            @if(isset(Auth::user()->info->roleDetail->rolePermission->permissions['package']['create']) OR isset(Auth::user()->info->roleDetail->rolePermission->permissions['package']['list']))
            <li><a class="has-arrow ai-icon" href="javascript:void(0)" aria-expanded="false">
                    <i class="flaticon-381-notepad"></i>
                    <span class="nav-text">Package</span>
                </a>
                <ul aria-expanded="false">
                    @if(isset(Auth::user()->info->roleDetail->rolePermission->permissions['package']['list']))
                    <li><a href="{{ route('package.index') }}">Package List</a></li>
                    @endif
                    @if(isset(Auth::user()->info->roleDetail->rolePermission->permissions['package']['create']))
                    <li><a href="{{ route('package.create') }}">Create Package</a></li>
                    @endif
                </ul>
            </li>
            @endif
            @if(isset(Auth::user()->info->roleDetail->rolePermission->permissions['exercise']['create']) OR isset(Auth::user()->info->roleDetail->rolePermission->permissions['exercise']['list']))
            <li><a class="has-arrow ai-icon" href="javascript:void(0)" aria-expanded="false">
                    <i class="flaticon-381-notepad"></i>
                    <span class="nav-text">Exercises</span>
                </a>
                <ul aria-expanded="false">
                    @if(isset(Auth::user()->info->roleDetail->rolePermission->permissions['exercise']['list']))
                    <li><a href="{{ route('manage.index') }}">Exercise's List</a></li>
                    @endif
                    @if(isset(Auth::user()->info->roleDetail->rolePermission->permissions['exercise']['create']))
                    <li><a href="{{ route('exercise.index') }}">Create Exercise</a></li>
                    @endif
                </ul>
            </li>
            @endif
            @if(isset(Auth::user()->info->roleDetail->rolePermission->permissions['diet']['create']) OR isset(Auth::user()->info->roleDetail->rolePermission->permissions['diet']['list']))
            <li><a class="has-arrow ai-icon" href="javascript:void(0)" aria-expanded="false">
                    <i class="flaticon-381-notepad"></i>
                    <span class="nav-text">Diet</span>
                </a>
                <ul aria-expanded="false">
                    @if(isset(Auth::user()->info->roleDetail->rolePermission->permissions['diet']['list']))
                    <li><a href="{{route('diet.index')}}">Diet Requests</a></li>
                    @endif
                    @if(isset(Auth::user()->info->roleDetail->rolePermission->permissions['diet']['create']))
                    <li><a href="{{ route('diet.create') }}">Assign Diet</a></li>
                    @endif
                </ul>
            </li>
            @endif
            @if(isset(Auth::user()->info->roleDetail->rolePermission->permissions['video']['create']) OR isset(Auth::user()->info->roleDetail->rolePermission->permissions['video']['list']))
            <li>
                <a class="has-arrow ai-icon" href="javascript:void(0)" aria-expanded="false">
                    <i class="flaticon-381-notepad"></i>
                    <span class="nav-text">Video Post</span>
                </a>
                <ul aria-expanded="false">
                    @if(isset(Auth::user()->info->roleDetail->rolePermission->permissions['video']['list']))
                    <li><a href="{{route('video.index')}}">Video's Post</a></li>
                    @endif
                    @if(isset(Auth::user()->info->roleDetail->rolePermission->permissions['video']['create']))
                    <li><a href="{{ route('video.create') }}">Create Video Post</a></li>
                    @endif
                </ul>
            </li>
            @endif

            @if(isset(Auth::user()->info->roleDetail->rolePermission->permissions['member']['create']) OR isset(Auth::user()->info->roleDetail->rolePermission->permissions['member']['create']))
                <li><a class="has-arrow ai-icon" href="javascript:void(0)" aria-expanded="false">
                        <i class="flaticon-381-user-2"></i>
                        <span class="nav-text">Enquiry</span>
                    </a>
                    <ul aria-expanded="false">
                        @if(isset(Auth::user()->info->roleDetail->rolePermission->permissions['member']['create']))
                            <li><a href="{{route('index.index')}}">Enquiry list </a></li>
                        @endif

                    </ul>
                </li>
            @endif

        </ul>
        <div class="add-menu-sidebar">
            <img src="{{asset('images/calendar.png')}}" alt="Create Workout" class="mr-3">
            <p class="font-w500 mb-0">Create Workout Plan Now</p>
        </div>
        <div class="copyright">
            <p><strong>Body Fitness Gym</strong> © 2021 All Rights Reserved</p>
            <p>Made with <span class="heart"></span> by <a href="http://globaldesign.in/" target="_blank">Global Design India</a></p>
        </div>
    </div>
</div>
<!--********************************** Sidebar end ***********************************-->
