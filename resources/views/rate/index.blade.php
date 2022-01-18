@extends('layout.app')
@section('title', 'Rate table')

@section('content')
    <div class="container">
        <p>Type all input and click "Submit" button</p>
        <div class="row">
            <div class="col-4">
                <label>From date: </label>
                <div id="from-datepicker" class="input-group date">
                    <input class="form-control" readonly="" type="text">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                </div>
            </div>
            <div class="col-4">
                <label>To date: </label>
                <div id="to-datepicker" class="input-group date">
                    <input class="form-control" readonly="" type="text">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                </div>
            </div>
            <div class="col-4">
                <label>Amount(USD): </label>
                <div id="amount-input">
                    <input class="form-control" type="number">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                </div>
            </div>
            <div class="col-2" style="margin-top: 10px; margin-bottom: 10px">
                <button id="submit-button" type="button" class="btn btn-success">Submit</button>
            </div>
        </div>

        <div id="rate-table"></div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        // Data Picker
        $(function () {
            $("#from-datepicker").datepicker({
                autoclose: true,
                todayHighlight: true
            }).datepicker('update', new Date());

            $("#to-datepicker").datepicker({
                autoclose: true,
                todayHighlight: true
            }).datepicker('update', new Date());
        });

        $(document).ready(function(){
            $("#submit-button").click(function(){
                let from = $("#from-datepicker").children("input").val();
                let to = $("#to-datepicker").children("input").val();
                let amount = $("#amount-input").children("input").val();
                let route = '{{ route('rates.index') }}';
                let url = route + "?from_date=" + Date.parse(from)/1000 + "&to_date=" + Date.parse(to)/1000 + "&amount=" + amount;

                $.ajax({
                    method: 'GET',
                    url: url ,
                    success: function(result) {
                        if (result.status === 'success') {
                            $("#rate-table").html(result.data);
                        }
                    },
                    error: function(error) {
                        alert(error.responseJSON.message);
                    }
                });
            });
        });
    </script>
@endsection
