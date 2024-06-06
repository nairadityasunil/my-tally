<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Accounts</title>
    <link rel="stylesheet" href="frontend/css/bootstrap.min.css">
    <script type="text/javascript" src="frontend/javascript/bootstrap.min.js"></script>
    <script type="text/javascript " src="frontend/javascript/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="frontend/css/style.css">
</head>
<body>
    <!-- Component Top Navbar -->
    <x-top_navbar/>

    <div class="col-sm-12">
        <div class="row">
            <x-side_navbar/>
            <div class="col-sm-10 px-0">
                <div class="container-fluid px-3">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="card" style="margin-top : 10px; max-height:93vh;">
                                <div class="card-body overflow-auto">
                                    <h1 class="text-center">New Transaction</h1>
                                    <br>
                                    <form action="{{route('save_transaction')}}" method="POST">
                                        @csrf
                                        <div class="form-group row">
                                            <div class="col-sm-4">
                                                <center>
                                                    <label for="name" class="col-form-label">Name :</label>
                                                </center>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" name="name" class="form-control" id="name" placeholder="" value="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-4">
                                                <center>
                                                    <label for="purpose" class="col-form-label">Purpose :</label>
                                                </center>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" name="purpose" class="form-control" id="purpose" placeholder="" value="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-4">
                                                <center>
                                                    <label for="action" class="col-form-label">Action :</label>
                                                </center>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="row ">
                                                    <div class="col-sm-3">
                                                        <select class="form-select" aria-label="Default select example" name="action">
                                                            <option value="" selected>-</option>
                                                            <option value="paid">Paid</option>
                                                            <option value="received">Received</option>
                                                        </select>   
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <center>
                                                                    <label for="mode" class="col-form-label">Mode :</label>
                                                                </center>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <select class="form-select" aria-label="Default select example" name="mode">
                                                                    <option value="" selected>-</option>
                                                                    <option value="cash">Cash</option>
                                                                    <option value="bank transfer">Bank Transfer</option>
                                                                    <option value="net banking">Net Banking</option>
                                                                    <option value="upi">UPI</option>
                                                                </select>   
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-4">
                                                <center>
                                                    <label for="total_amount" class="col-form-label">Total Amount :</label>
                                                </center>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" name="total_amount" class="form-control" id="name" placeholder="" value="">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="container">
                                                <center>
                                                    <table class="table table-striped  border-dark text-center w-75 px-2" id="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <!-- <th>Purpose</th> -->
                                                                <th>Amount</th> 
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <td>
                                                                <input type="text" name="inputs[0][entity_name]" readonly class="form-control table_input" id="name" placeholder="" value="Self">
                                                            </td>
                                                            <td>
                                                                <input type="text" name="inputs[0][amount]"  class="form-control table_input" id="amount" placeholder="-" value="">
                                                            </td>
                                                            <td>
                                                                <button type="button" name="split_btn" class="btn btn-success" id="split_btn">Split</button>
                                                            </td>
                                                        </tbody>
                                                    </table>    
                                                </center>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="col-sm-12">
                                            <center>
                                                <button type="submit" class="btn" id="submit_btn">Submit</button>
                                                <button type="reset" class="btn btn-danger">Reset</button>
                                            </center>
                                        </div>
                                    </form>
                                    <br>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                <div class="container-fluid">
                <div class="card" style="margin-top : 10px;">
                    <div class="card-body">
                        <div class="container">
                            <h3 class="text-center">Today's Transaction</h3>
                            <br>
                            <table class="table table-striped  border-dark text-center">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Purpose</th>
                                        <th>Amount</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($todays_transactions as $transaction)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$transaction->purpose}}</td>
                                            @if($transaction->action == "received")
                                            <td style="color:green;"><b>{{$transaction->amount}}</b></td>
                                            @else
                                            <td style="color:red;"><b>{{$transaction->amount}}</b></td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>    
                        </div>
                    </div>
                </div>
                </div>
            </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <!-- component Side Navbar -->

    <!-- Main Form -->
</body>
</html>
<!-- <script>
    $('document').ready(function()
    {
        var i=0;
        $('#split_btn').click(function(){
            ++i;
            $('#table').append(
                `<tr>
                <td>
                    <input type="text" name="inputs[`+i+`][entity_name]" class="form-control table_input" id="name" placeholder="Enter Name" value="">
                </td>
                <td>
                    <input type="text" name="inputs[`+i+`][amount]"  class="form-control table_input" id="amount" placeholder="-" value="">
                </td>
                <td>
                    <button type="submit" name="" class="btn btn-danger remove-row">Remove</button>
                </td>
                <tr>`
            );
        });

        $(document).on('click','.remove-row',function(){
            $(this).parents('tr').remove();
        });
    });
</script> -->
<script>
    $(document).ready(function() {
        var i = 0;
        $('#split_btn').click(function() {
            ++i;
            $('#table').append(
                `<tr>
                <td>
                    <input type="text" name="inputs[${i}][entity_name]" class="form-control table_input" id="name" placeholder="Enter Name" value="">
                </td>
                <td>
                    <input type="text" name="inputs[${i}][amount]"  class="form-control table_input" id="amount" placeholder="-" value="">
                </td>
                <td>
                    <button type="button" class="btn btn-danger remove-row">Remove</button>
                </td>
                <tr>`
            );
        });

        $(document).on('click', '.remove-row', function() {
            $(this).parents('tr').remove();
        });
    });
</script>
