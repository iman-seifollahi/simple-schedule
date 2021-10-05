<div class="card">
    <div class="card-header bg-gray-light font-weight-bold">
        <h1 class="text-center ">Simple Schedule</h1>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="card">
            <div class="card-header ">
                <div class="float-left">
                    @auth()
                        <div class="d-flex">
                            @if(\Illuminate\Support\Facades\Auth::user()->rule == 'admin')
                                <a class="btn btn-block btn-outline-primary mr-5" href="{{route('profileIndex')}}">Profile
                                    ( {{auth()->user()->name}} )</a>
                            @else()
                                <a class="btn btn-block btn-outline-primary mr-5" href="{{route('newRequest')}}">Profile
                                    ( {{auth()->user()->name}} )</a>
                            @endif
                            <form action="{{route('logout')}}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-block btn-outline-danger">LogOut</button>
                            </form>
                        </div>

                    @endauth
                    @guest()
                        <div class="d-flex">
                            <a class="btn btn-block btn-outline-warning mr-5" href="{{route('login')}}">Login</a>
                            <a class="btn btn-block btn-outline-primary mt-0" href="{{route('register')}}">Register</a>
                        </div>
                    @endguest
                </div>
                <div class="float-right">
                    <span class="btn btn-dark justify-end" wire:click="changeWeek('previous')">Past Week </span>
                    <span class="btn btn-dark justify-end" wire:click="changeWeek('next')">Next Week</span>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                    <tr class="text-center bg-gray-light">
                        <th style="width: 10px"></th>
                        @foreach($this->scheduleWeek->first() as $key => $value)
                            <th class="justify-content-center">
                                <div class="text-uppercase">
                                    {{\Carbon\Carbon::create($key)->format('l')}}
                                </div>
                                <div class="text-lowercase">
                                    {{\Carbon\Carbon::create($key)->format('d M Y')}}
                                </div>
                            </th>
                        @endforeach
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($this->scheduleWeek as $key => $job)
                        <tr class="text-center">
                            <td class="text-uppercase text-bold text-center bg-gradient-gray">{{$key}}</td>
                            @foreach($job as $day)
                                <td class="">
                                    @if(count($day) > 0)
                                        @foreach($day->sortByDesc('shift') as $item)

                                            @if($item->shift == "morning")
                                                <span
                                                    class="btn btn-block btn-outline-warning active text-bold">{{$item->user->name}}
                                                <div class="text-secondary">Morning</div>
                                                </span>
                                            @else
                                                <span
                                                    class="btn btn-block btn-outline-info active text-bold">{{$item->user->name}}
                                                <div class="text-secondary">Evening</div>
                                                </span>
                                            @endif
                                        @endforeach
                                    @else
                                        <span></span>
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
</div>
