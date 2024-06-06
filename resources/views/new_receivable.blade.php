<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Receivable</title>
    <link rel="stylesheet" href="frontend/css/bootstrap.min.css">
    <script type="text/javascript" src="frontend/javascript/bootstrap.min.js"></script>
    <script type="text/javascript " src="frontend/javascript/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="/frontend/css/style.css">
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
                                    <h1 class="text-center">New Receivable</h1>
                                    <br>
                                    <form action="{{route('save_new_receivable')}}" method="POST">
                                        @csrf
                                        <div class="form-group row">
                                    
                                            <div class="col-sm-4">
                                                <center>
                                                    <label for="name" class="col-form-label">Name :</label>
                                                </center>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" name="name" class="form-control" id="name" placeholder="" value="" >
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
                                        <div class="form-group row">
                                            <div class="col-sm-4">
                                                <center>
                                                    <label for="total_amount" class="col-form-label">Amount :</label>
                                                </center>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" name="total_amount" class="form-control" id="name" placeholder="" value="">
                                            </div>
                                        </div>
                                       
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
                            <h3 class="text-center">All Receivables</h3>
                            <br>
                            <table class="table table-striped  border-dark text-center">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Amount</th> 
                                        <th>Confirm</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($all_receivables as $receivables)
                                        
                                            <tr>
                                                <td>{{$receivables->id}}</td>
                                                <td>{{$receivables->name}}</td>
                                                <td style="color:green;"><b>{{$receivables->amount}}</b></td> 
                                                <td>
                                                <a href="{{url('confirm_receivable')}}/{{$receivables->id}}" class="btn _btn">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-square-fill" viewBox="0 0 16 16">
  <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm10.03 4.97a.75.75 0 0 1 .011 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.75.75 0 0 1 1.08-.022z"/>
</svg>
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
            </div>
            
        </div>
    </div>
    <!-- component Side Navbar -->

    <!-- Main Form -->
</body>
</html>
