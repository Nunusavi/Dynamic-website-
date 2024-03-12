<!DOCTYPE html>
<html lang="en">
<?php 
    session_start();
    if (!isset($_SESSION['authenticated'])) {
        // User not logged in, redirect to login
        header('Location: login.php');
        exit;
    }
    if (!isset($_COOKIE['authenticated'])) {
        // User not logged in, redirect to login 
        
        header('Location: login.php');
        exit;
    }
   
 //conneting to the database
    include '../Controllers/Controllers.php';
    $db = new db(); 
    $conn = $db->getConnection();


    
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/img/favicon.jpg" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@2.1.0/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Techville Dashboard</title>
</head>

<body>
    <section>
        <div
            class="d-flex flex-row justify-content-between fixed-top bg-light px-5 border border-2 border-bottom">
            <div class="d-flex flex-row text-center">
                <div>
                    <i class="mycursor m-2 p-3 fa-solid fa-bars d-block d-md-none" id="togglingbtn"></i>
                </div>
                <img src="../Assets/Logo-bg.png" style="width: 50px;" alt="">
                <p class="text-center mt-3 mx-3">TechVilleTechnologies</p>
            </div>
            <div class="d-flex flex-row mt-3 justify-content-around" style="gap: 1em;">
                <p class="mycursor border- border-end"><i class="border-end fa-solid fa-bell"></i></p>
                <p class="vl"></p>
                <p class="mycursor"><?php echo$_SESSION['username'];?></p>
                <a href="../Dashboard/Logout.php" onclick="" id="logoutLink">Logout</a>
            </div>
        </div>
    </section>


    <section>
        <div class="side-menu bg-light border d-none d-md-block" id="side-menu">
            <div>
                <h6>Sections</h6>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#abt"><i class="fa-regular fa-address-card"></i> About
                            us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  text-dark" href="#Project"><i class="fa-solid fa-list"></i> Portfolio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  text-dark" href="#testimony">
                            <i class="fa-solid fa-people-arrows"></i>
                            Testimonials
                        </a>
                    </li>
                </ul>
            </div>
            <div>
                <h6>Category 2</h6>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#">About us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  text-dark" href="#">Portfolio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  text-dark" href="#">Testimonials</a>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section class="content">
        <div style="margin-top: 100px;" id="now">
            <h1 id="abt">About us</h1>
            <div id="abto" class="div p-3">
                <table class="table" style="width: 400px;">
                    <thead>
                        <tr>
                            <th scope="col">Heading</th>
                            <th scope="col">Content</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Projects completed</td>
                            <td>40+</td>
                            <td><button class="btn btn-primary" onclick="editRow(1)">Edit</button></td>
                        </tr>
                        <tr>
                            <td>Clients</td>
                            <td>30+</td>
                            <td><button class="btn btn-primary" onclick="editRow(2)">Edit</button></td>
                        </tr>
                        <tr>
                            <td>Experts</td>
                            <td>10+</td>
                            <td><button class="btn btn-primary" onclick="editRow(3)">Edit</button></td>
                        </tr>
                        <tr>
                            <td>Awards</td>
                            <td>4</td>
                            <td><button class="btn btn-primary" onclick="editRow(4)">Edit</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal to edit about us-->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Row</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Form fields for editing -->
                        <div class="form-group">
                            <label for="editHeading">Heading:</label>
                            <input type="text" id="editHeading" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="editContent">Content:</label>
                            <input type="text" id="editContent" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" onclick="saveChanges()">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        
        <!--For Project -->
        <div>
            <h1 id="Project">Projects</h1>
            <div class="div p-3">
                <div class="d-flex justify-content-start mb-3">
                    <div class="d-flex mb-3">
                        <input type="text" class="form-control" id="titleFilter" placeholder="Filter by title">
                    </div>
                    <div>
                        <button  class="btn btn-warning rounded" id="addPortfolioBtn">+ Add Project</button>
                    </div>
                </div>
                <table id="ProjectTable" class="table">
                    <thead>
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Category</th>
                            <th scope="col">Image </th>
                            <th scope="col">Duration</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $controller = new Controllers();
                        // Fetch projects from the controller
                        $projects = $controller->getProject();
                        // Put the result of getProject() into an array
                        
                        // Loop through the projects and display them in the table
                        while ($row = $projects->fetch_assoc()){
                            echo '<tr>';
                            echo '<td>' . $row['ProjectTitle'] . '</td>';
                            echo '<td>' . $row['ProjectDescription'] . '</td>';
                            echo '<td>' . $row['ProjectTech'] . '</td>';
                            echo '<td><img src="' . $row['ProjectImage'] . '" id="projectImage" style="width: 50%; height: 50%;" alt="Project Image"></td>';
                            echo '<td>' . $row['ProjectDuration'] . '</td>';
                            echo '<td>' . $row['ProjectStatus'] . '</td>';
                            echo '<td>' . (isset($row['Project']) ? $row['Project'] : '') . '</td>';
                            echo '<td>' . '<button class="btn btn-primary edit-btn" data-bs-toggle="modal" data-bs-target="#editPortfolioModal"><i class="fas fa-pen"></i> Edit</button>' . '<button class="btn btn-danger delete-btn mx-1"><i class="fas fa-trash"></i> Delete</button>' . '</td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- Modal for adding new Project -->
        <div class="modal fade" id="addProjectModal" tabindex="-1" role="dialog" aria-labelledby="addProjectModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addProjectModalLabel">Add Portfolio</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
                    </div>
                    <div class="modal-body">
                        <!-- Form for adding a new Project -->
                        <form id="addPortfolioForm" action="" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="ProjectTitle" class="form-label">Title</label>
                                <input type="text" class="form-control" id="ProjectTitle" name="ProjectTitle" placeholder="Enter title">
                            </div>
                            <div class="mb-3">
                                <label for="ProjectCategory" class="form-label">Project Tech</label>
                                <input type="text" class="form-control" id="ProjectCategory" name="ProjectTech" placeholder="Enter category">
                            </div>
                            <div class="mb-3">
                                <label for="ProjectDescription" class="form-label">Description</label>
                                <textarea class="form-control" id="ProjectDescription" rows="3" name="ProjectDescription" placeholder="Enter description"></textarea>
                            </div>
                            <div class="">
                                <label for="image1" class="form-label">Images</label>
                                <input type="File" class="form" id="image" name="ProjectImage" placeholder="Upload Imgae">
                            </div>
                            <div class="mb-3">
                                <label for="ProjectUrl" class="form-label">Project Duration</label>
                                <input type="text" class="form-control" id="ProjectUrl" name="ProjectDuration" placeholder="Enter Project Duration">
                            </div>
                            
                            <!-- You can add more fields as needed -->
                            <div class="mb-3">
                                <label for="ProjectStatus" class="form-label"> Project Status</label>
                                <input type="radio" name="ProjectStatus" id="ongoingSelect" checked>
                                <label for="ongoingSelect">Ongoing</label>
                                <input type="radio" name="ProjectStatus" id="completedSelect">
                                <label for="completedSelect">Completed</label>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" id="savePortfolioBtn">Save changes</button>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
        <?php
            
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Get the form data
                if(isset($_POST['ProjectTitle']) && isset($_POST['ProjectTech']) && isset($_POST['ProjectDescription']) && isset($_FILES['ProjectImage']) && isset($_POST['ProjectDuration']) && isset($_POST['ProjectStatus'])){
                $ProjectTitle = $_POST['ProjectTitle'];
                $ProjectTech = $_POST['ProjectTech'];
                $ProjectDescription = $_POST['ProjectDescription'];
                $file = $_FILES['ProjectImage'];
                $ProjectDuration = $_POST['ProjectDuration'];
                $ProjectStatus = ($_POST['ProjectStatus'] === 'completedSelect') ? 'Completed' : 'Ongoing';
            }
                // Create an instance of the controller class
                $controller = new Controllers();
                
                // Call the method to upload the project to the database
                $controller->addProject($ProjectTitle, $ProjectDescription, $ProjectDuration, $ProjectTech, $file,$ProjectStatus);
            }
            
        ?>
        
        <!-- Modal for editing existing Project -->
        <div class="modal fade" id="editPortfolioModal" tabindex="-1" role="dialog" aria-labelledby="editPortfolioModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editPortfolioModalLabel">Edit Portfolio</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
                    </div>
                    <div class="modal-body">
                        <!-- Form for editing an existing Project -->
                        <form id="editPortfolioForm" method="post">
                            <div class="mb-3">
                                <label for="editPortfolioTitle" class="form-label">Title</label>
                                <input type="text" class="form-control" name="editProjectTitle"  id="editPortfolioTitle" placeholder="Enter title">
                            </div> 
                            <div class="mb-3">
                                <label for="editPortfolioCategory" class="form-label">Category</label>
                                <input type="text" class="form-control" name="editProjectCatagory" id="editPortfolioCategory" placeholder="Enter category">
                            </div>
                            <div class="mb-3">
                                <label for="editPortfolioDescription" class="form-label">Description</label>
                                <textarea class="form-control" name="editProjectDescription" id="editPortfolioDescription" rows="3" placeholder="Enter description"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="editImage1" class="form-label">Image </label>
                                <input type="file" class="" name="editProjectImage" id="editImage" placeholder="Upload image">
                            </div>
                            <div class="mb-3">
                                <label for="editPortfolioUrl" class="form-label">Poroject Duration</label>
                                <input type="text" class="form-control" name="editProjectDuration" id="editPortfolioUrl" placeholder="Enter Project Duration">
                            </div>
                            <div class="mb-3">
                                <label for="ProjectStatus" class="form-label"> Project Status</label>
                                <input type="radio" name="ProjectStatus" id="ongoingSelect" checked>
                                <label for="ongoingSelect">Ongoing</label>
                                <input type="radio" name="ProjectStatus" id="completedSelect">
                                <label for="completedSelect">Completed</label>
                            </div>
                            <!-- Hidden field to store the index of the row being edited -->
                            <input type="hidden" id="editRowIndex">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" id="updatePortfolioBtn">Update</button>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
       </div>
        <?php
    if(isset($_POST['editProjectTitle']) && isset($_POST['editProjectCatagory']) && isset($_POST['editProjectDescription']) && isset($_FILES['editProjectImage']) && isset($_POST['editProjectDuration']) && isset($_POST['ProjectStatus'])){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Get the form data
            if (isset($_POST['editProjectTitle']) && isset($_POST['editProjectCatagory']) && isset($_POST['editProjectDescription']) && isset($_FILES['editProjectImage']) && isset($_POST['editProjectDuration']) && isset($_POST['ProjectStatus'])) {
                $ProjectTitle = $_POST['editProjectTitle'];
                $ProjectTech = $_POST['editProjectCatagory'];
                $ProjectDescription = $_POST['editProjectDescription'];
                $file = $_FILES['editProjectImage'];
                $ProjectDuration = $_POST['editProjectDuration'];
                $ProjectStatus = ($_POST['ProjectStatus'] === 'completedSelect') ? 'Completed' : 'Ongoing';
            }
            // Create an instance of the controller class
            $controller = new Controllers();
            
            // Call the method to upload the project to the database
            $controller->editProject($ProjectTitle, $ProjectTech, $ProjectDescription, $file, $ProjectDuration, $ProjectStatus);
        }
    }
        ?>
         <!--For Project -->
         <div>
            <h1 id="Project">Partners</h1>
            <div class="div p-3">
                <div class="d-flex justify-content-start mb-3">
                    <div class="d-flex mb-3">
                        <input type="text" class="form-control" id="titleFilter" placeholder="Filter by title">
                    </div>
                    <div>
                        <button  class="btn btn-warning rounded" id="addPartnerBtn">+ Add Partner</button>
                    </div>
                </div>
                <table id="PartnerTable" class="table">
                    <thead>
                        <tr>
                            <th scope="col"> Company Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Logo</th>
                            <th scope="col">Duration</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $controller = new Controllers();
                        // Fetch projects from the controller
                        $partner = $controller->getPartner();
                        // Put the result of getProject() into an array
                        
                        // Loop through the projects and display them in the table
                        while ($row = $partner->fetch_assoc()){
                            echo '<tr>';
                            echo '<td>' . $row['Company name'] . '</td>';
                            echo '<td>' . $row['Description'] . '</td>';
                            echo '<td><img src="' . $row['Logo'] . '" id="projectImage" style="width: 50%; height: 50%;" alt="Project Image"></td>';
                            echo '<td>' . $row['Duration'] . '</td>';
                            echo '<td>' . $row['Status'] . '</td>';
                            echo '<td>' . (isset($row['Partner']) ? $row['Partner'] : '') . '</td>';
                            echo '<td>' . '<button class="btn btn-primary edit-btn" data-bs-toggle="modal" data-bs-target="#editPortfolioModal"><i class="fas fa-pen"></i> Edit</button>' . '<button class="btn btn-danger delete-btn mx-1"><i class="fas fa-trash"></i> Delete</button>' . '</td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- Modal for adding new Partner -->
<div class="modal fade" id="addPartnerModal" tabindex="-1" role="dialog" aria-labelledby="addPartnerModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addPartnerModalLabel">Add Portfolio</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
                    </div>
                    <div class="modal-body">
                        <!-- Form for adding a new Partner -->
                        <form id="addPortfolioForm" action="" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="PartnerTitle" class="form-label">Company Name</label>
                                <input type="text" class="form-control" id="PartnerTitle" name="PartnerName" placeholder="Enter Name">
                            </div>
                            <div class="mb-3">
                                <label for="PartnerCategory" class="form-label">Description</label>
                                <input type="text" class="form-control" id="PartnerCategory" name="Description" placeholder="Enter Discription">
                            </div>
                            <div class="">
                                <label for="image1" class="form-label">Company Logo</label>
                                <input type="File" class="form" id="image" name="PartnerImage" placeholder="Upload Imgae">
                            </div>
                            <div class="mb-3">
                                <label for="PartnerDuration" class="form-label">Partner Duration</label>
                                <input type="text" class="form-control" id="PartnerUrl" name="PartnerDuration" placeholder="Enter Partner Duration">
                            </div>                            
                            <!-- You can add more fields as needed -->
                            <div class="mb-3">
                                <label for="PartnerStatus" class="form-label"> Partner Status</label>
                                <input type="radio" name="PartnerStatus" id="ongoingSelect" checked>
                                <label for="active">Active</label>
                                <input type="radio" name="PartnerStatus" id="completedSelect">
                                <label for="inactive">Inactive</label>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" id="savePortfolioBtn">Save changes</button>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
        <?php
            if(isset($_POST['PartnerName']) && isset($_POST['Description']) && isset($_FILES['PartnerImage']) && isset($_POST['PartnerDuration']) && isset($_POST['PartnerStatus'])){
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    // Get the form data
                    if (isset($_POST['PartnerName']) && isset($_POST['Description']) && isset($_FILES['PartnerImage']) && isset($_POST['PartnerDuration']) && isset($_POST['PartnerStatus'])) {
                        $PartnerName = $_POST['PartnerName'];
                        $Description = $_POST['Description'];
                        $PartenrImage = $_FILES['PartnerImage'];
                        $PartnerDuration = $_POST['PartnerDuration'];
                        $PartnerStatus = ($_POST['PartnerStatus'] === 'completedSelect') ? 'Completed' : 'Ongoing';
                    }
                    // Create an instance of the controller class
                    $controller = new Controllers();
                    
                    // Call the method to upload the project to the database
                    $controller->addPartner($PartnerName, $Description, $PartenrImage, $PartnerDuration, $PartnerStatus);
                }
            }
        ?>
        <!-- Add testimony -->
        <div>
            <h1 id="testimony">Testimonials</h1>
            <div class="p-3">
                <!-- <div class="d-flex justify-content-en mb-3">
                    <p class="m-2"><i class="fa-solid fa-filter"></i> Filters</p>
                    <button class="btn-warning rounded">+Add testimony</button>
                </div> -->
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">title</th>
                            <th scope="col">Testimony</th>
                            <th scope="col">image 1</th>
                            <!-- <th scope="col">URL link</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>John Micheal</td>
                            <td>Web dev</td>
                            <td>What a dedication</td>
                            <td>Upload</td>
                            <!-- <td><i class="mycursor fa-solid fa-pen-to-square"></i></td> -->
                        </tr>
                        <tr>
                            <td>Smith George</td>
                            <td>Mobile app</td>
                            <td>Best</td>
                            <td>Upload</td>
                            <!-- <td><i class="mycursor  fa-solid fa-pen-to-square"></i></td> -->
                        </tr>
                        <tr>
                            <td>Grace </td>
                            <td>Wordpress</td>
                            <td>Examplary work</td>
                            <td>Upload</td>
                            <!-- <td><i class="mycursor fa-solid fa-pen-to-square"></i></td> -->
                        </tr>
                        <tr>
                            <td>Mary</td>
                            <td>Awards</td>
                            <td>Wow </td>
                            <td>Upload</td>
                            <!-- <td><i class="mycursor fa-solid fa-pen-to-square"></i></td> -->
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</body>
<?php
    
?>


<script>
    document.getElementById('togglingbtn').addEventListener('click', function () {
        document.getElementById('side-menu').classList.toggle('d-none');
    });
</script>



<!-- Modal for about us -->
<script>
    let rowToEdit;
    
    function editRow(rowNumber) {
        // Store the row number to be edited
        rowToEdit = rowNumber;
        
        // Fill modal fields with current row data for the second and third columns
        let row = document.querySelectorAll("#now table tbody tr")[rowNumber - 1];
        let cells = row.getElementsByTagName("td");
        document.getElementById("editHeading").value = cells[0].textContent; // Second column
        document.getElementById("editContent").value = cells[1].textContent; // Third column
        
        // Show the modal
        $('#editModal').modal('show');
    }
    
    function saveChanges() {
        // Retrieve edited values
        let newHeading = document.getElementById("editHeading").value;
        let newContent = document.getElementById("editContent").value;
        
        // Update the table
        let row = document.querySelectorAll("#now table tbody tr")[rowToEdit - 1];
        let cells = row.getElementsByTagName("td");
        cells[0].textContent = newHeading;
        cells[1].textContent = newContent;
        
        // Hide the modal
        $('#editModal').modal('hide');
    }
</script>


<!-- Code for Project -->
<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

<script>
    // Script to handle modal opening when clicking "Add Project" button
    document.getElementById('addPortfolioBtn').addEventListener('click', function () {
        $('#addProjectModal').modal('show');
    });
    document.getElementById('addPartnerBtn').addEventListener('click', function () {
        $('#addPartnerModal').modal('show');
    });



    // Script to handle opening the edit modal with data using event delegation
    $('#ProjectTable').on('click', '.edit-btn', function() {
        var rowIndex = $(this).closest('tr').index();
        var rowData = $('#ProjectTable tbody tr').eq(rowIndex).find('td');
        $('#editPortfolioTitle').val(rowData.eq(0).text());
        $('#editPortfolioDescription').val(rowData.eq(2).text());
        $('#editPortfolioCategory').val(rowData.eq(1).text());
        $('#editPortfolioUrl').val(rowData.eq(3).text());
        $('#editRowIndex').val(rowIndex);
        $('#editPortfolioModal').modal('show');
    });

    // Script to handle updating existing Project
    $('#updatePortfolioBtn').click(function() {
        var rowIndex = $('#editRowIndex').val();
        var rowData = $('#ProjectTable tbody tr').eq(rowIndex).find('td');
        rowData.eq(0).text($('#editPortfolioTitle').val());
        rowData.eq(1).text($('#editPortfolioCategory').val());
        rowData.eq(2).text($('#editPortfolioDescription').val());
        rowData.eq(3).text($)
        rowData.eq(6).text($('#editPortfolioUrl').val());
        $('#editPortfolioModal').modal('hide');
    });

    // Script to handle deleting a row
    $(document).on('click', '.delete-btn', function() {
        if (confirm("Are you sure you want to delete this Project?")) {
            $(this).closest('tr').remove();
        }
    });

    // Script to handle filtering
    $('#titleFilter').on('input', function() {
        var titleFilter = $('#titleFilter').val().toLowerCase();
        
        $('#ProjectTable tbody tr').each(function() {
            var title = $(this).find('td:nth-child(1)').text().toLowerCase();
            
            if (title.includes(titleFilter)) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });
</script>


<!-- Loging out -->
<script>
    document.getElementById('logoutLink').addEventListener('click', function (event) {
        event.preventDefault(); // Prevents the default link behavior (redirecting to the href)

        // You can add additional logic here before redirecting
        // For example, you could display a confirmation dialog:
        if (confirm('Are you sure you want to log out?')) {
            window.location.href = event.target.href; // Redirect to the href of the link
        }
    });
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>