@extends('templates.project-invoice')

@section('content')

<div class="row justify-content-center text-center align-content-center"></div>
    <div class="col-4">
        <button id="pay_invoice" type="button" class="btn btn-success no-print"><i class="far fa-credit-card"></i> Bayar Invoice
    </div>
</div>


@endsection

@push('scripts')

    <script>
        $(document).ready(function(){

            if(status == 0){
                $('#pay_invoice').click(function(){
                    window.snap.pay('{{$snapToken}}')
                });
            };
        });
    </script>


@endpush
