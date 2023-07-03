<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);

$connection = mysqli_connect('localhost', 'root', '', 'simple_visa_tracker');

//check connection
if (!$connection) {
    die('Database connection failed.');
}

$query = "SELECT anzsco_code, occupation FROM anzsco_list";
$result_set = mysqli_query($connection, $query);
$occupation_list = '';

while ($result = mysqli_fetch_assoc($result_set)) {
    $occupation_list .= "<option value=\"{$result['occupation']}\">{$result['occupation']} ({$result['anzsco_code']})</option>";
}
;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Visa Tracker</title>


    <link rel='stylesheet' type='text/css'
        href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css'>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script> -->

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Offcanvas navbar large">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Simple Visa Tracker</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar2"
                aria-controls="offcanvasNavbar2" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasNavbar2"
                aria-labelledby="offcanvasNavbar2Label">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbar2Label">Offcanvas</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="logout.php">Logout</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Dropdown
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li> -->
                    </ul>
                    <!-- <form class="d-flex mt-3 mt-lg-0" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form> -->
                </div>
            </div>
        </div>
    </nav>


</body>

<body class="bg-body-tertiary">
    <div style="padding:5px 40px">
        <h3>Hello
            <?php echo $user_data['username']; ?>...
        </h3>
    </div>
    <center>
        <h1>Simple Visa Tracker</h1>
        <h2>Visa tracking system</h2>
    </center>
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check2" viewBox="0 0 16 16">
            <path
                d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z">
            </path>
        </symbol>
        <symbol id="circle-half" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"></path>
        </symbol>
        <symbol id="moon-stars-fill" viewBox="0 0 16 16">
            <path
                d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z">
            </path>
            <path
                d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z">
            </path>
        </symbol>
        <symbol id="sun-fill" viewBox="0 0 16 16">
            <path
                d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z">
            </path>
        </symbol>
    </svg>

    <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
        <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center" id="bd-theme" type="button"
            aria-expanded="false" data-bs-toggle="dropdown" aria-label="Toggle theme (light)">
            <svg class="bi my-1 theme-icon-active" width="1em" height="1em">
                <use href="#sun-fill"></use>
            </svg>
            <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
        </button>
        <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="light"
                    aria-pressed="true">
                    <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
                        <use href="#sun-fill"></use>
                    </svg>
                    Light
                    <svg class="bi ms-auto d-none" width="1em" height="1em">
                        <use href="#check2"></use>
                    </svg>
                </button>
            </li>
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark"
                    aria-pressed="false">
                    <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
                        <use href="#moon-stars-fill"></use>
                    </svg>
                    Dark
                    <svg class="bi ms-auto d-none" width="1em" height="1em">
                        <use href="#check2"></use>
                    </svg>
                </button>
            </li>
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="auto"
                    aria-pressed="false">
                    <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
                        <use href="#circle-half"></use>
                    </svg>
                    Auto
                    <svg class="bi ms-auto d-none" width="1em" height="1em">
                        <use href="#check2"></use>
                    </svg>
                </button>
            </li>
        </ul>
    </div>

    <div class="container">
        <main>
            <div class="col-md-6 col-lg-8" style="margin:auto">
                <h4 class="mb-3">Enter your details...</h4>
                <form class="needs-validation" action="savetodb.php" method='POST'>
                    <div class="row g-3">
                        <form>

                            <div class="col-12">
                                <label for="userName" class="form-label">User Name</label>
                                <input type="text" class="form-control" name="username" id="userName" placeholder=""
                                    value="<?php echo $user_data['username']; ?>" required="true" readonly>
                                <div class="invalid-feedback">
                                    Valid user name is required.
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-4 col-lg-4">
                                <label for="gender" class="form-label">Gender</label>
                                <select class="form-select" name="gender" id="gender" required="true">
                                    <option value="">Select...</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                            </div>

                            <div class="col-xs-12 col-md-8 col-lg-4">
                                <label for="age" class="form-label">Age</label>
                                <select class="form-select" name="age" id="age" required="required">
                                    <option value="">Select age...</option>
                                    <option>18</option>
                                    <option>19</option>
                                    <option>20</option>
                                    <option>21</option>
                                    <option>22</option>
                                    <option>23</option>
                                    <option>24</option>
                                    <option>25</option>
                                    <option>26</option>
                                    <option>27</option>
                                    <option>28</option>
                                    <option>29</option>
                                    <option>30</option>
                                    <option>31</option>
                                    <option>32</option>
                                    <option>33</option>
                                    <option>34</option>
                                    <option>35</option>
                                    <option>36</option>
                                    <option>37</option>
                                    <option>38</option>
                                    <option>39</option>
                                    <option>40</option>
                                    <option>41</option>
                                    <option>42</option>
                                    <option>43</option>
                                    <option>44</option>
                                    <option>45</option>
                                </select>
                            </div>

                            <div class="col-md-12 col-lg-4">
                                <label for="country" class="form-label">No. of dependants</label>
                                <select class="form-select" name="dependants" id="dependants" required="true">
                                    <option value="">Select...</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                </select>
                            </div>

                            <div class="col-12">
                                <label for="occupation" class="form-label">Skilled Occupation</label>
                                <select class="form-select" name="occupation" id="" required="true">
                                    <?php echo $occupation_list; ?>
                                </select>
                            </div>

                            <div class="col-12">
                                <label for="country" class="form-label visaType">Visa Type</label>
                                <select class="form-select" name="visatype" id="visaType" required="true">
                                    <option value="select">Select visa type</option>
                                    <option value="sc189">Skilled Independent visa (subclass 189) </option>
                                    <option value="sc190">Skilled Nominated visa (subclass 190) </option>
                                    <option value="sc491">Skilled Work Regional visa (subclass 491)</option>
                                    <option value="sc491rda">Skilled Work Regional visa (subclass 491 - RDA)</option>
                                </select>
                            </div>

                            <hr class="my-4">

                            <div class="col-12 hidden">
                                <label for="country" class="form-label">State</label>
                                <select class="form-select" name="state" id="state" required="">
                                    <option value="">Select State</option>
                                    <option>Victoria</option>
                                    <option>New South Wales</option>
                                    <option>Australia Capitol Territory</option>
                                    <option>Queensland</option>
                                    <option>South Australia</option>
                                    <option>Tasmania</option>
                                    <option>Western Australia</option>
                                    <option>Northern Territory</option>
                                </select>
                            </div>

                            <div>
                                <div class="" id="date_pid">
                                    <label for="pre_invite" class="form-label">Pre-Invite date</label>
                                    <input class="form-select" type="text" name="pre_invite" id="datepicker-pid"
                                        placeholder="Select pre-invite date"><br>
                                </div>

                                <div class="">
                                    <label for="nomination_applied" class="form-label">Nomination Applied date</label>
                                    <input class="form-select" type="text" name="nomination_applied" id="datepicker-nad"
                                        placeholder="Select nomination applied date"><br>
                                </div>

                                <div class="">
                                    <label for="payment_rda" class="form-label">Payment date for RDA</label>
                                    <input class="form-select" type="text" name="payment_rda" id="datepicker-prda"
                                        placeholder="Select payment done date for RDA"><br>
                                </div>

                                <div class="">
                                    <label for="invitation" class="form-label">Final Invitation Recieved
                                        date</label>
                                    <input class="form-select" type="text" name="invitation" id="datepicker-ird"
                                        placeholder="Select final invitation date">
                                </div>

                                <hr class="my-4 ">

                                <div class="col-12">
                                    <label for="visaLodgeDate" class="form-label">Visa Lodged Date</label>
                                    <input type="text" name="visa_lodged" id="datepicker-vld" class="form-select">
                                </div>

                                <div class="col-12">
                                    <label for="coContactDate" class="form-label">CO Contact Date</label>
                                    <input type="text" name="co_contact" id="datepicker-ccd" class="form-select">
                                </div>

                                <div class="col-12">
                                    <label for="coContactDate" class="form-label">VISA Grant Date</label>
                                    <input type="text" name="grant_date" id="datepicker-vgd" class="form-select">
                                </div>

                                <div class="col-md-12">
                                    <hr class="my-4">
                                    <input class="w-100 btn btn-primary btn-lg" type="submit" value="Submit">
                                    <div class="invalid-feedback"></div>
                                </div>

                        </form>

                    </div>
            </div>
    </div>

    </form>
    </div>
    </div>
    </main>

    <footer class="my-5 pt-5 text-body-secondary text-center text-small">
        <p class="mb-1">© 2023 <a href="https://www.itexphere.com/">iTexphere Solutions</a></p>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="#">Privacy</a></li>
            <li class="list-inline-item"><a href="#">Terms</a></li>
            <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
    </footer>
    </div>
    <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
        </script>

    <script src="checkout.js"></script>

    <div id="KJojHiJRdvS"></div><iframe frameborder="0" scrolling="no"
        style="background-color: transparent; border: 0px; display: none;"></iframe>
    <div id="GOOGLE_INPUT_CHEXT_FLAG" style="display: none;" input=""
        input_stat="{&quot;tlang&quot;:true,&quot;tsbc&quot;:true,&quot;pun&quot;:true,&quot;mk&quot;:true,&quot;ss&quot;:true}">
    </div>

    <script>

    </script>

    <script src="index.js"></script>
</body>


</html>