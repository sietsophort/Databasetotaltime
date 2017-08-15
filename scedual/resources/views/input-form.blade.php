
<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Demo time table for staff</title>
    <!-- Styles -->
    <script type="text/javascript" src="{{asset('bootstrap-3.3.7-dist/js/jquery-3.2.1.js')}}"></script>
    <script type="text/javascript" src="{{asset('bootstrap-3.3.7-dist/js/bootstrap.min.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('bootstrap-3.3.7-dist/css/bootstrap.min.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
    <!--<link type="text/css" rel="stylesheet" href="task1.css">-->
    <style>
        .page-header h1 {
            text-align: center;
        }
        /*.form-group input{*/
            /*width: 500px;*/
        /*}*/
        .inputName input {
            border: none;
            /*width: 200px;*/
            border-radius: 5px
        }

        input {
            margin: 5px;
        }

        tr td {
            text-align: center;
        }

        .inputTime input {
            width: 150px;
            height: 30px;
            /*margin-bottom: 10px;*/
            border: none;
            border-radius: 5px
        }

        select {
            border: none;
            border-radius: 5px
        }

        table {
            width: 100%;
        }

        thead tr th {
            padding: 15px;
        }

        .btn-success {
            float: right;
            margin-top: 50px;
        }
        #snackbar {
            visibility: hidden;
            min-width: 250px;
            margin-left: -125px;
            background-color:green;
            color: #fff;
            text-align: center;
            border-radius: 12px;
            padding: 16px;
            position: fixed;
            z-index: 1;
            left: 50%;
            bottom: 30px;
            font-size: 17px;
        }

        #snackbar.show {
            visibility: visible;
            -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
            animation: fadein 0.5s, fadeout 0.5s 2.5s;
        }

        @-webkit-keyframes fadein {
            from {bottom: 0; opacity: 0;}
            to {bottom: 60px; opacity: 1;}
        }

        @keyframes fadein {
            from {bottom: 0; opacity: 0;}
            to {bottom: 60px; opacity: 1;}
        }

        @-webkit-keyframes fadeout {
            from {bottom: 60px; opacity: 1;}
            to {bottom: 0; opacity: 0;}
        }

        @keyframes fadeout {
            from {bottom: 60px; opacity: 1;}
            to {bottom: 0; opacity: 0;}
        }
    </style>

</head>

<body>

    <div class="page-header">
        <h1>Time Table</h1>
    </div>
    <div class="container">
        
        <div class="timeTable">
            <form action="/store" method="get" class="form-group">
                {{ csrf_field() }}
                <table id="table" class=" table-responsive table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Time In</th>
                        <th>Time Out</th>
                        <th>Status</th>
                        <th hidden>Total Hours</th>
                        <th>Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    @for($i=1;$i<=21;$i++)
                    <tr class="row_{{$i}}">
                        <td>
                                   {{$i}}
                        </td>
                        <td class="inputName">
                            <input type="text" name="name[]" id="name" style="width: 95%" required>
                        </td>
                        <td class="inputTime">
                            <input type="time" name="timein[]" id="timein" required>
                        </td>
                        <td class="inputTime">
                            <input type="time" name="timeout[]" id="timeout" required>
                        </td>
                        <td>
                            <select class="status" name="status[]" id="status" required data-row="row_{{$i}}">
                                <option id="pt" value="Part time"> Part time</option>
                                <option id="ft" value="Full time"> Full time</option>
                                <option id="perm" value="Permission">Permission</option>
                            </select>
                        </td>
                        <td id="total" hidden >
                            <input type="number" name="totalhours[]">
                        </td>
                        <td class="inputTime">
                            <input type="date" name="date[]">
                        </td>
                    </tr>
                   @endfor
                    </tbody>
                </table>

                <input class="btn-success btn-lg" type="submit" value="Submit" id="add"  >
            </form>
        </div>
    </div>

    <script>
        $(function(){

            $('.status').on('change', function(){
    //           console.log($(this).val());
                var status = $(this).val();

                var _selectRow = $(this).data('row');
    //           console.log('select row : ', _selectRow);
                if(status == 'Permission'){
    //                console.log($('tr.'+_selectRow + ' value=["Time"]'));
                    $('tr.'+_selectRow + ' td input[type="time"]').removeAttr('required');
                }
                else{
                    $('tr.'+_selectRow + ' td input[type="time"]').attr('required',true);
                }

            })
        })
    </script>


</body>

</html>

