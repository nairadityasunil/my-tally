<!-- Include Bootstrap CSS and JavaScript -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
<style>
    .side_navbar
    {
        height: 100vh; 
        background:white;
        padding-top: 20px;
        box-shadow: 4px 0px 2px -2px rgba(0, 0, 0, 0.2  ) !important;
    }

    a
    {
        text-decoration : none;
        width : 100%;
        text-align: center !important;
        color : black;
    }

    a:hover
    {
        text-decoration : none;
        color : white;
    }

    .navbar-hover
    {
        text-align: center !important;
    }
    
    .navbar-hover:hover
    {
        background : #04444D;
        color : white !important;
        text-align: center !important;
        text-decoration : none;
    }

    .navbar-hover_active
    {
        background : #04444D;
        color : white !important;
        text-align: center !important;
        text-decoration : none;
    }

    .items-menu
    {
        background: #012B31;
        text-align : center;
    }

    .items-menu a
    {
        color : black;
    }


    .menu-item:hover
    {
        border-left:8px solid #3A929E;
        border-right : 8px solid #3A929E;
        background : #04444D;
        text-align: center;
        text-decoration : none;
    }

    .menu_item:active
    {
        border-left:8px solid #3A929E;
        border-right : 8px solid #3A929E;
        background : #04444D;
        text-align: center;
        text-decoration : none;
    }

    a:visited
    {
        border : none;
    }

    .a-hover:hover
    {
        text-decoration : none;
        color : white;
        border-radius : 0px 0px 10px 10px;
    }

   
</style>
<div class="col-sm-2 side_navbar">
    <div>
        <a href="" class="btn btn-link navbar-hover"style = "color : black; text-decoration:none; text-align:justify">Home</a>
        <br>
    </div>
    <div>
        <a href="" class="btn btn-link navbar-hover py-2" id="transaction_toggle" data-toggle="collapse" data-target="#transaction_menu" aria-expanded="false" aria-controls="transaction_menu" style = "color : black; text-decoration:none; text-align:justify">Transactions <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
  <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
</svg></i></a>
        <div class="collapse items-menu mx-2" id="transaction_menu"  style="border-radius : 0px 0px 10px 10px;">
            <div class="menu-item">
                <a href="{{route('add_transaction')}}" class="a-hover btn btn-link navbar-hover" style = "color : white; text-decoration:none; text-align:justify">New Transaction</a>
            </div>
            <div class="menu-item">
                <a href="{{route('all_received')}}" class="a-hover btn btn-link navbar-hover" style = "color : white; text-decoration:none; text-align:justify">All Received</a>
            </div>
            <div class="menu-item">
                <a href="{{route('all_paid')}}" class="a-hover btn btn-link navbar-hover" style = "color : white; text-decoration:none; text-align:justify">All Paid</a>
            </div>
            <div class="menu-item a-hover">
                <a href="{{route('all_transactions')}}" class="a-hover btn btn-link" style = "color : white; text-decoration:none; text-align:justify">All Transactions</a>
            </div>
        </div>
        <!-- <br> -->
    </div>
    <div>
        <a href="" class="btn btn-link navbar-hover"  id="pending_toggle" data-toggle="collapse" data-target="#pending_menu" aria-expanded="false" aria-controls="pending_menu" style = "color : black; text-decoration:none; text-align:justify">Account Receivable <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
  <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
</svg></a>
        <div class="collapse items-menu mx-2" id="pending_menu"  style="border-radius : 0px 0px 10px 10px;">
            <div class="menu-item">
                <a href="{{url('new_receivable')}}" class="a-hover btn btn-link navbar-hover" style = "color : white; text-decoration:none; text-align:justify">Add Receivable</a>
            </div>
            <div class="menu-item a-hover">
                <a href="{{route('all_recievables')}}" class="a-hover btn btn-link" style = "color : white; text-decoration:none; text-align:justify">All Receivables</a>
            </div>
        </div>
        <!-- <br> -->
    </div>
    <div>
        <a href="" class="btn btn-link navbar-hover" id="outstanding_toggle" data-toggle="collapse" data-target="#outstanding_menu" aria-expanded="false" aria-controls="outstanding_menu" style = "color : black; text-decoration:none; text-align:justify">Account Payable <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
  <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
</svg></a>
        <div class="collapse items-menu mx-2" id="outstanding_menu"  style="border-radius : 0px 0px 10px 10px;">
            <div class="menu-item">
                <a href="{{url('new_payable')}}" class="a-hover btn btn-link navbar-hover" style = "color : white; text-decoration:none; text-align:justify">Add Payable</a>
            </div>
            <div class="menu-item a-hover">
                <a href="{{route('all_payables')}}" class="a-hover btn  tn-link" style = "color : white; text-decoration:none; text-align:justify">All Payable</a>
            </div>
        </div>
        <!-- <br> -->
    </div>
    <div>
        <a href="{{route('all_personal_expense')}}" class="btn btn-link navbar-hover"style = "color : black; text-decoration:none; text-align:justify">Personal Expense</a>
        <br>
    </div>
    <div>
        <a href="" class="btn btn-link navbar-hover"style = "color : black; text-decoration:none; text-align:justify">Report Master</a>
        <br>
    </div>
    <div>
        <a href="" class="btn btn-link navbar-hover"style = "color : black; text-decoration:none; text-align:justify">User Master</a>
        <br>
    </div>
</div>

<script>
    $('document').ready(function()
    {
        var transac_count=0;
        var pending_count=0;
        var outstanding_count=0;
        $('#transaction_toggle').click(function(){
            if (transac_count==0)
            {
                $('#transaction_toggle').addClass("navbar-hover_active");
                $('#pending_toggle').removeClass("navbar-hover_active");
                $('#outstanding_toggle').removeClass("navbar-hover_active");
                $('#pending_menu').collapse('hide');
                $('#outstanding_menu').collapse('hide');
                transac_count = transac_count+1;
                pending_count=0;
                outstanding_count=0;
            }
            else
            {
                $('#transaction_toggle').removeClass("navbar-hover_active");
                transac_count = 0;
            }
        });
        $('#pending_toggle').click(function(){
            if (pending_count==0)
            {
                $('#pending_toggle').addClass("navbar-hover_active");
                $('#transaction_toggle').removeClass("navbar-hover_active");
                $('#outstanding_toggle').removeClass("navbar-hover_active");
                $('#transaction_menu').collapse('hide');
                $('#outstanding_menu').collapse('hide');
                pending_count = pending_count+1;
                transac_count = 0;
                outstanding_count=0;
            }
            else
            {
                $('#pending_toggle').removeClass("navbar-hover_active");
                pending_count = 0;
            }
        });
        $('#outstanding_toggle').click(function(){
            if (outstanding_count==0)
            {
                $('#outstanding_toggle').addClass("navbar-hover_active");
                $('#pending_toggle').removeClass("navbar-hover_active");
                $('#transaction_toggle').removeClass("navbar-hover_active");
                $('#transaction_menu').collapse('hide');
                $('#pending_menu').collapse('hide');
                outstanding_count = outstanding_count+1;
                transac_count = 0;
                pending_count=0;

            }
            else
            {
                $('#outstanding_toggle').removeClass("navbar-hover_active");
                outstanding_count = 0;
            }
        });
    });
</script>



