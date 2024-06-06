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
                            <div class="col-sm-4">
                                <a href="">
                                    <button type="button" class="btn _btn">Add Recievable</button>
                                </a>
                            </div>
                            <div class="col-sm-4">
                                <center>
                                    <h3>Recievables</h3>
                                </center>
                            </div>
                            <div class="col-sm-12">
    
                            </div>
                        </div>
                        <div class="container-fluid px-3 py-3 overflow-auto" style="padding-right:10px; max-height:67vh; overflow-y:auto;">
                            <table class="table table-stripped table-hover border-dark text-center">
                                <thead class="thead-dark"  style="position:sticky; top:-17px;">
                                    <tr>
                                        <th>Sr no.</th>
                                        <th>Recievable Id</th>
                                        <th>Name</th>
                                        <th>Purpose</th>
                                        <th>Mode</th>
                                        <th>Amount</th>
                                        <th>Transaction Id</th>
                                        <!-- <th>View</th> -->
                                        <th>Date & Time</th>
                                        <th>Confirm</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($all_recievables as $recievables)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$recievables->id}}</td>
                                            <td>{{$recievables->name}}</td>
                                            <td>{{$recievables->purpose}}</td>
                                            <td>{{$recievables->mode}}</td>
                                            <td>{{$recievables->amount}}</td>
                                            <td>{{$recievables->transaction_id}}</td>
                                            <td>{{$recievables->created_at}}</td>
                                            <td>
                                                <a href="{{url('confirm_receivable')}}/{{$recievables->id}}">
                                                    <button type="button" class="btn _btn">Received</button>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="">
                                                    <button type="button" class="btn btn-danger">Remove</button>
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

