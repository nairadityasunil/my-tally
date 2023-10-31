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
            <div class="col-sm-10 py-3">
                <div class="card">
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="col-sm-4">
                                <div class="row">
                                    <div class="col">
                                        <center>
                                            <label for="">Name : </label>
                                        </center>
                                    </div>
                                    <div class="col">
                                        <input type="text" name="purpose" class="form-control" id="purpose" placeholder="" value="">
                                        <br>
                                        <button type="submit" class="btn btn-dark">Submit</button>
                                        <a href="">
                                            <button type="button" class="btn btn-danger">Clear</button>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="card my-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4 px-4">
                                <a href="">
                                    <button type="button" class="btn _btn">New Transaction</button>
                                </a>
                                <a href="">
                                    <button type="button" class="btn _btn">New Receivable</button>
                                </a>
                                <a href="">
                                    <button type="button" class="btn _btn">New Payable</button>
                                </a>
                                
                            </div>
                            <div class="col-sm-4">
                                <center>
                                    <h3>All Transactions</h3>
                                </center>
                            </div>
                            <div class="col-sm-4"  style="justify-content:end;">
                                
                            </div>
                        </div>
                        <div class="container-fluid px-3 py-3 overflow-auto" style="padding-right:10px; max-height:67vh; overflow-y:auto;">
                        <!--  -->
                            <table class="table table-stripped table-hover border-dark text-center">
                                <thead class="thead-dark" style="position:sticky; top:-17px;">
                                    <tr style=" padding-top:0;">
                                        <th>Sr no.</th>
                                        <th>Transaction Id</th>
                                        <th>Name</th>
                                        <th>Purpose</th>
                                        <th>Action</th>
                                        <th>Mode</th>
                                        <th>Amount</th>
                                        <!-- <th>View</th> -->
                                        <th>Date & Time</th>
                                        <th>Update</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($all_transactions as $transactions)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$transactions->id}}</td>
                                            <td>{{$transactions->name}}</td>
                                            <td>{{$transactions->purpose}}</td>

                                            @if($transactions->action == "paid")
                                            <td style="color:red;"><b>{{$transactions->action}}</b></td>
                                            @else
                                            <td style="color:green;"><b>{{$transactions->action}}</b></td>
                                            @endif
                                            <td>{{$transactions->mode}}</td>

                                            @if($transactions->action == "paid")
                                            <td style="color:red;"><b>{{$transactions->amount}}</b></td>
                                            @else
                                            <td style="color:green;"><b>{{$transactions->amount}}</b></td>
                                            @endif
                                            <td>{{$transactions->created_at}}</td>
                                            <td>
                                                <a href="">
                                                    <button type="button" class="btn _btn">Print</button>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{url('delete_transaction')}}/{{$transactions->id}}">
                                                    <button type="button" class="btn _btn">Delete</button>
                                                </a>
                                            </td>
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
</body>
</html>

