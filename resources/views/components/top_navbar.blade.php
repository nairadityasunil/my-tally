
<style>
    .center-align
    {
        text-align:center !important;
    }

    .top-navbar
    {
        background:#04444D;;
        box-shadow: 0 4px 2px -2px rgba(0, 0, 0, 0.4) !important;
        max-height : 10vw !important;
    }
</style>

<div class="top-navbar">
    <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid">
            <div class="row w-100">
                <div class="col-sm-4">
                    <a href="" style="text-decoration:none;">
                        <span class="navbar-brand text-white"><b>MY-TALLY</b></span>
                    </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                </div>
                <div class="col-sm-4 text-white center-align py-2" style="font-weight:bold !important;">
                 <center>
                    <span id="hours">00</span>
                    <span>:</span>
                    <span id="minutes">00</span>
                    <span>:</span>
                    <span id="seconds">00</span>
                    <span> </span>
                    <span id="session">AM</span>
                 </center>
                </div>
                <div class="col-sm-4">
                    <ul class="justify-content-end navbar-nav w-100 d-flex flex-row-end">
                        <span class="text-white my-2" style="padding-right: 2vw; font-weight:bold;">{{session()->get('username')}} username</span>
                        <span>
                            <a href="">
                                <button class="btn btn-danger" id="logout">Logout</button>
                            </a>
                        </span>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>

<script>
    function displayTime()
    {
        var dateTime = new Date();
        var hrs = dateTime.getHours();
        var mins = dateTime.getMinutes();
        var sec = dateTime.getSeconds();
        var session = document.getElementById('session');
        if(hrs >= 12)
        {
            session.innerHTML = 'PM';
        }
        else
        {
            session.innerHTML = 'AM';
        }

        if (hrs > 12)
        {
            hrs = hrs - 12;
        }
        document.getElementById('hours').innerHTML = hrs;
        document.getElementById('minutes').innerHTML = mins;
        document.getElementById('seconds').innerHTML = sec;

    }
    setInterval(displayTime, 10);
</script>