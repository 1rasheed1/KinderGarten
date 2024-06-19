<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>LittleLearners - Preschool Website</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
    <link rel="icon" type="image/png" href="../images/Logo.png">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@600&family=Lobster+Two:wght@700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!--   Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style>
    .selected-row {
        background-color: #ff8b53; 
    }
    .hidden {
        display: none;
    }
</style>

</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5 py-lg-0">
            <a href="index.php" class="navbar-brand">
                <h1 class="m-0 text-primary"><i class="fa fa-book-reader me-3"></i>LittleLearners</h1>
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    <a href="index.php" class="nav-item nav-link active">Home</a>
                    <a href="about.php" class="nav-item nav-link">About Us</a>
                    <a href="classes.php" class="nav-item nav-link">Classes</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0">
                            <a href="facility.php" class="dropdown-item">School Facilities</a>
                            <a href="team.php" class="dropdown-item">Popular Teachers</a>
                            <a href="call-to-action.php" class="dropdown-item">Become A Teachers</a>
                            <a href="appointment.php" class="dropdown-item">Make Appointment</a>
                            <a href="testimonial.php" class="dropdown-item">Testimonial</a>
                            <?php
                            session_start();
                            // Check if isAdmin session variable is set and true
                            if ($_SESSION['isAdmin']==true) {
                                echo '<a href="404.php" class="dropdown-item">Admin Page</a>';
                            }
                            ?>
                        </div>
                        
                    </div>
                    <a href="contact.php" class="nav-item nav-link">Contact Us</a>
                    
                </div>
                <a href="#" class="nav-item nav-link"><?php  echo $_SESSION['userEmail']; ?></a>
                <a href="../HTML/Login.php" class="btn btn-primary rounded-pill px-3 d-none d-lg-block">Log out<i class="fa fa-arrow-right ms-3"></i></a>
            </div>
        </nav>
        <!-- Navbar End -->


        <!-- Page Header End -->
        <div class="container-xxl py-5 page-header position-relative mb-5">
            <div class="container py-5">
                <h1 class="display-2 text-white animated slideInDown mb-4">Admin Page</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Admin Page</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header End -->


        <!-- Page admin Start -->
        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container text-center">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <?php include '../pageAdminHandle.php';?>
                        <div class="my-3">
                            <button class="btn btn-danger me-3" onclick="deleteSelected()">Delete</button>
                            <button class="btn btn-success" onclick="showAddForm()">Add</button>
                        </div>
                        <!-- Add Teacher Form -->
                        <div id="addTeacherForm" class="hidden">
                            <form id="teacherForm">
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="name" placeholder="Name" required autocomplete="off">
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="work" placeholder="Work" required autocomplete="off">
                                </div>
                                <div class="mb-3">
                                    <input type="number" class="form-control" id="age" placeholder="Age" required autocomplete="off">
                                </div>
                                <div class="mb-3">
                                    <input type="number" class="form-control" id="salary" placeholder="Salary" required autocomplete="off">
                                </div>
                                <div class="mb-3">
                                    <input type="email" class="form-control" id="email" placeholder="Email" required autocomplete="off">
                                </div>
                                <button type="button" class="btn btn-primary" onclick="addTeacher()">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container text-center">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <?php include '../studentAdmin.php';?>
                        <div class="my-3">
                            <button class="btn btn-danger me-3" onclick="deleteSelected2()">Delete</button>
                            <button class="btn btn-success" onclick="showAddForm2()">Add</button>
                        </div>
                        <!-- Add Teacher Form -->
                        <div id="addStudentForm" class="hidden">
                            <form id="studentForm">
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="name1" placeholder="Name" required autocomplete="off">
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="father1" placeholder="Father" required autocomplete="off">
                                </div>
                                <div class="mb-3">
                                    <input type="number" class="form-control" id="age1" placeholder="Age" required autocomplete="off">
                                </div>
                                <div class="mb-3">
                                    <input type="number" class="form-control" id="class1" placeholder="Class" required autocomplete="off">
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="phone1" placeholder="Phone" required autocomplete="off"> 
                                </div>
                                <button type="button" class="btn btn-primary" onclick="addStudent()">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page admin End -->


        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <h3 class="text-white mb-4">Get In Touch</h3>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>69 Street, Jenin, Palestine</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+970 594 971026</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>LittleLearnerns@job.com</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h3 class="text-white mb-4">Quick Links</h3>
                        <a class="btn btn-link text-white-50" href="">About Us</a>
                        <a class="btn btn-link text-white-50" href="">Contact Us</a>
                        <a class="btn btn-link text-white-50" href="">Our Services</a>
                        <a class="btn btn-link text-white-50" href="">Privacy Policy</a>
                        <a class="btn btn-link text-white-50" href="">Terms & Condition</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h3 class="text-white mb-4">Photo Gallery</h3>
                        <div class="row g-2 pt-2">
                            <div class="col-4">
                                <img class="img-fluid rounded bg-light p-1" src="img/classes-1.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid rounded bg-light p-1" src="img/classes-2.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid rounded bg-light p-1" src="img/classes-3.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid rounded bg-light p-1" src="img/classes-4.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid rounded bg-light p-1" src="img/classes-5.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid rounded bg-light p-1" src="img/classes-6.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h3 class="text-white mb-4">Newsletter</h3>
                        <p>We will close on Monday.</p>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">LittleLearners</a>, All Right Reserved. 

                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <div class="footer-menu">
                                <a href="">Home</a>
                                <a href="">Cookies</a>
                                <a href="">Help</a>
                                <a href="">FQAs</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!--   Javascript -->
    <script src="js/main.js"></script>
    <script>
// Global variable to store the last selected table ID
var lastTableId = 'teacherTable'; // Initialize with a default table ID

// Function to handle row selection
function selectRow(tableId, row) {
    // Deselect all other rows in the specified table
    var table = document.getElementById(tableId);
    if (!table) {
        console.error("Table with id '" + tableId + "' not found.");
        return;
    }

    // Check if the current table is different from the last selected table
    if (tableId !== lastTableId) {
        // Deselect all rows in the last selected table
        var lastTable = document.getElementById(lastTableId);
        if (lastTable) {
            var lastTableRows = lastTable.getElementsByTagName("tr");
            for (var i = 0; i < lastTableRows.length; i++) {
                lastTableRows[i].classList.remove("selected-row");
            }
        }
        
        // Update lastTableId to the current tableId
        lastTableId = tableId;
    }

    // Deselect all rows in the current table
    var rows = table.getElementsByTagName("tr");
    for (var i = 0; i < rows.length; i++) {
        rows[i].classList.remove("selected-row");
    }

    // Select the clicked row
    row.classList.add("selected-row");
}

    // Function to handle row deletion
    function deleteSelected() {
        var selectedRow = document.querySelector(".selected-row");
        if (selectedRow) {
            var email = selectedRow.cells[4].textContent.trim(); // Assuming the email is in the fifth column
            $.ajax({
                url: '../deleteRow.php',
                type: 'POST',
                data: {email: email},
                success: function(response) {
                    // Handle success response
                    console.log(response);
                    selectedRow.remove();
                },
                error: function(xhr, status, error) {
                    // Handle error response
                    console.error(xhr.responseText);
                }
            });
        } else {
            alert("Please select a row to delete.");
        }
    }
    function deleteSelected2() {
        var selectedRow = document.querySelector(".selected-row");
        if (selectedRow) {
            var Sphone = selectedRow.cells[4].textContent.trim(); // Assuming the email is in the fifth column
            $.ajax({
                url: '../deleteStudent.php',
                type: 'POST',
                data: {Sphone: Sphone},
                success: function(response) {
                    // Handle success response
                    console.log(response);
                    selectedRow.remove();
                },
                error: function(xhr, status, error) {
                    // Handle error response
                    console.error(xhr.responseText);
                }
            });
        } else {
            alert("Please select a row to delete.");
        }
    }

    // Function to show add teacher form
    function showAddForm() {
        document.getElementById('addTeacherForm').classList.toggle('hidden');
    }
    function showAddForm2() {
        document.getElementById('addStudentForm').classList.toggle('hidden');
    }

    // Function to handle add teacher
    function addTeacher() {
        var name = document.getElementById('name').value;
        var work = document.getElementById('work').value;
        var age = document.getElementById('age').value;
        var salary = document.getElementById('salary').value;
        var email = document.getElementById('email').value;

        $.ajax({
            url: '../addTeacher.php',
            type: 'POST',
            data: {
                name: name,
                work: work,
                age: age,
                salary: salary,
                email: email
            },
            success: function(response) {
                // Handle success response
                console.log(response);
                // Assuming the response returns the new row HTML
                $('#teacherTable tbody').append(response);
                // Reset form and hide
                document.getElementById('teacherForm').reset();
                document.getElementById('addTeacherForm').classList.add('hidden');
            },
            error: function(xhr, status, error) {
                // Handle error response
                console.error(xhr.responseText);
            }
        });
    }
    function addStudent() {
        var name1 = document.getElementById('name1').value;
        var father1 = document.getElementById('father1').value;
        var age1 = document.getElementById('age1').value;
        var claSS1 = document.getElementById('class1').value;
        var phone1 = document.getElementById('phone1').value;

        $.ajax({
            url: '../addStudent.php',
            type: 'POST',
            data: {
                name1: name1,
                father1: father1,
                age1: age1,
                claSS1: claSS1,
                phone1: phone1
            },
            success: function(response) {
                // Handle success response
                console.log(response);
                // Assuming the response returns the new row HTML
                $('#studentTable tbody').append(response);
                // Reset form and hide
                document.getElementById('studentForm').reset();
                document.getElementById('addStudentForm').classList.add('hidden');
            },
            error: function(xhr, status, error) {
                // Handle error response
                console.error(xhr.responseText);
            }
        });
    }
</script>

</body>

</html>
