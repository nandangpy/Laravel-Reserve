@extends('layouts.public')

@section('content')
    <div class="row mt-4">
        <div class="card">
            <div class="card-body">
                <h4 class="text-center">Pilih Tanggal Jam Layanan</h4>
                <hr>
                {{-- <div class="row"> --}}
                    <div class="col-5">
                        <form action="{{ route('cart.store') }}" method="post">
                            @csrf
                                        <div class="form-group">
                                            <label for="time">Select Date: </label>
                                            <input type="text" id="datePicker" class="form-control" name="tgl"/>
                                        </div>

                                        <div class="form-group">
                                            <label for="time">Select Time: </label>
                                            <input type="text" id="timePicker" class="form-control" name="jam"/>
                                        </div>

                                      <p class="card-text"><strong class="text-danger">Note:</strong> <br> Reservasi hanya berlaku pada Jam <b>09:00-21:00 WIB</b> dan Pastikan panjang jam pada 00menit - 30menit</p>

                            <button type="submit" class="btn btn-primary"><i class="fas fa-arrow-circle-right"></i>
                                Next
                            </button>
                        </form>
                    </div>
                    <div class="col-7">

                    </div>
                {{-- </div> --}}
            </div>
        </div>

    </div>
@endsection
@section('script')
    <script>
        $('#datePicker').datetimepicker({
            timepicker: false,
            datepicker: true,
            format: 'Y-m-d',
            minDate: '+1970/01/02'
        });
        $('#timePicker').datetimepicker({
            timepicker: true,
            datepicker: false,
            format: 'H:i',
            value: '09:00',
            hours12: true,
            step: 5,
            allowTimes: ['09:00', '09:30', '10:30', '11:00', '11:30', '12:00', '12:30', '13:00', '13:30', '14:00', '14:30', '15:00',
                        '15:30', '16:00', '16:30', '17:00', '17:30', '18:00', '18:30', '19:00', '19:30', '20:00', '20:30', '21:00' ]
        });
    </script>
@endsection
