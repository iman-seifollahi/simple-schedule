<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">New Request</h1>
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
                    <h3 class="card-title">Request Form</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form wire:submit.prevent="sendRequest">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Date:</label>
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input"
                                       data-target="#reservationdate">
                                <div class="input-group-append" data-target="#reservationdate"
                                     data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div wire:click="changeShift('morning')" class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="morning"
                                       name="morning" {{$this->shift == "morning" ? 'checked' : ''}}>
                                <label for="customRadio1" class="custom-control-label">Morning</label>
                            </div>

                            <div wire:click="changeShift('evening')" class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="evening"
                                       name="evening" {{$this->shift == "evening" ? 'checked' : ''}}>
                                <label for="customRadio2" class="custom-control-label">Evening</label>
                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </section>
    <!-- /.content -->
</div>

<script>
    document.addEventListener('livewire:load', () => {
        $('#reservationdate').datetimepicker({
            format: 'YYYY/MM/DD',
            defaultDate: {!! json_encode($this->date) !!}
        });

        $('#reservationdate').on("change.datetimepicker", function (e) {
            var date = moment(e.date).format('YYYY-MM-DD');
            Livewire.emit('changeDate', date);
        });
    });

</script>
