<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Requests</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content col-lg-8 col-md-10 col-sm-12">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Requests List</h3>
                </div>
                <div class="card">
                    <div class="card-body">
                        @if(count($this->requests) > 0)
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th style="width: 10px">User Id</th>
                                    <th>Name</th>
                                    <th>Jub</th>
                                    <th>Date</th>
                                    <th>Shift</th>
                                    <th>status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($this->requests as $request)
                                    <tr>
                                        <td>{{$request->user->id}}</td>
                                        <td>{{$request->user->name}}</td>
                                        <td>security</td>
                                        <td>{{ \Carbon\Carbon::create($request->date)->format('Y/m/d')}}</td>
                                        <td>{{$request->shift}}</td>
                                        <td>
                                            <div class="d-flex ">
                                                <button wire:click="Approve({{$request->id}})" type="button"
                                                        class="btn btn-block btn-success btn-sm mr-3">Approve
                                                </button>

                                                <button wire:click="Decline({{$request->id}})" type="button"
                                                        class="btn btn-block btn-danger mt-0 btn-sm">Decline
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else()
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fas fa-check"></i> Alert!</h5>
                                There Is No Request To Display.
                            </div>
                        @endif
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

