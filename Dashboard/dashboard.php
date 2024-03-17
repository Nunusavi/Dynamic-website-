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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@2.1.0/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
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
                <img src="../Dashboard/Assets/Logo-bg.png" style="width: 50px;" alt="">
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
                            <th scope="col">ID</th>
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
                        
                        // Loop through the projects and display them in the table
                        while ($row = $projects->fetch_assoc()){
                            echo '<tr>';
                            echo '<td>' . $row['ProjectID'] . '</td>';
                            echo '<td>' . $row['ProjectTitle'] . '</td>';
                            echo '<td>' . $row['ProjectDescription'] . '</td>';
                            echo '<td>' . $row['ProjectTech'] . '</td>';
                            echo '<td><img src="' . $row['ProjectImage'] . '" id="projectImage" style="width: 50%; height: 50%;" alt="Project Image"></td>';
                            echo '<td>' . $row['ProjectDuration'] . '</td>';
                            echo '<td>' . $row['ProjectStatus'] . '</td>';
                            echo '<td>' . (isset($row['Project']) ? $row['Project'] : '') . '</td>';
                            echo '<td>' . '' . '<a href="dashboard.php?ProjectID=' . $row['ProjectID'] . '" class="btn btn-primary">Delete</a>';
                            echo '</tr>';
                        }
                            // Save each ProjectID in a array to be used in the edit modal globally
                            if(isset($_GET['ProjectID'])){
                                try{
                                    $ProjectID = $_GET['ProjectID'];
                                    $controller = new Controllers();
                                    $controller->deleteProject($ProjectID);
                                    echo '<script>window.location.href="dashboard.php";</script>';
                                }catch(Exception $e){
                                    echo $e->getMessage();
                                }
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
                        <form id="addProjectForm" action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="form_id" value="addProjectForm">
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
                                <select name="ProjectStatus">
                                    <option value="completedSelect">Completed</option>
                                    <option value="ongoingSelect">Ongoing</option>
                                </select>

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
                        <form id="editProjectForm" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="form_id" value="editProjectForm">
                            <div class="mb-3">
                                <lable for="editProjectID" class="form-label">ID</lable>
                                <input type="text" class="form-control" name="editProjectID" id="editProjectID" placeholder="Enter ID" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="editProjectTitle" class="form-label">Title</label>
                                <input type="text" class="form-control" name="editProjectTitle"  id="editProjectTitle" placeholder="Enter title">
                            </div> 
                            <div class="mb-3">
                                <label for="editProjectCategory" class="form-label">Category</label>
                                <input type="text" class="form-control" name="editProjectCatagory" id="editProjectCategory" placeholder="Enter category">
                            </div>
                            <div class="mb-3">
                                <label for="editProjectDescription" class="form-label">Description</label>
                                <textarea class="form-control" name="editProjectDescription" id="editProjectDescription" rows="3" placeholder="Enter description"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="editImage1" class="form-label">Image </label>
                                <input type="file" class="" name="editProjectImage" id="editImage" placeholder="Upload image">
                            </div>
                            <div class="mb-3">
                                <label for="editProjectDuration" class="form-label">Project Duration</label>
                                <input type="text" class="form-control" name="editProjectDuration" id="editProjectDuration" placeholder="Enter Project Duration">
                            </div>
                            <div class="mb-3">
                                <label for="ProjectStatus" class="form-label"> Project Status</label>
                                <select name="ProjectStatus">
                                    <option value="completedSelect">Completed</option>
                                    <option value="ongoingSelect">Ongoing</option>
                                </select>
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
   
        ?>
         <!--For Partner -->
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
                            <th scope="col">ID</th>
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
                            echo '<td>' . $row['PartnerID'] . '</td>';
                            echo '<td>' . $row['CompanyName'] . '</td>';
                            echo '<td>' . $row['CompanyDescription'] . '</td>';
                            echo '<td><img src="' . $row['CompanyLogo'] . '" id="projectImage" style="width: 50%; height: 50%;" alt="Project Image"></td>';
                            echo '<td>' . $row['CompanyDuration'] . '</td>';
                            echo '<td>' . $row['PartnershipStatus'] . '</td>';
                            echo '<td>' . (isset($row['Partner']) ? $row['Partner'] : '') . '</td>';
                            echo '<td>' . '' . '<a href="dashboard.php?PartnerID=' . $row['PartnerID'] . '" class="btn btn-primary">Delete</a>';
                            echo '</tr>';
                        }   
                        if(isset($_GET['PartnerID'])){
                            try{
                                $PartnerID = $_GET['PartnerID'];
                                $controller = new Controllers();
                                $controller->deletePartner($PartnerID);
                                echo '<script>window.location.href="dashboard.php";</script>';
                            }catch(Exception $e){
                                echo $e->getMessage();
                            }
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
                        <form id="addPartnerForm" action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="form_id" value="addPartnerForm">
                            <div class="mb-3">
                                <label for="PartnerTitle" class="form-label">Company Name</label>
                                <input type="text" class="form-control" id="PartnerTitle" name="PartnerName" placeholder="Enter Name">
                            </div>
                            <div class="mb-3">
                                <label for="PartnerCategory" class="form-label">Description</label>
                                <textarea class="form-control" id="PartnerDescription" name="Description" placeholder="Enter Discription"></textarea>
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
        <!-- Modal to edit partner -->
        <div class="modal fade" id="editPortfolioModal" tabindex="-1" role="dialog" aria-labelledby="editPortfolioModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editPortfolioModalLabel">Edit Portfolio</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
                    </div>
                    <div class="modal-body">
                        <!-- Form for editing an existing Project -->
                        <form id="editPartnerForm" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="form_id" value="editPartnerForm">
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
       </div>
        <!-- Add testimony -->
        <div>
            <h1 id="testimony">Contacts</h1>
            <div class="p-3">
            <div class="d-flex justify-content-start mb-3">
                    
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Recived Date</th>
                            <th scope="col">Message</th>
                            <th scope="col">Action</th>
                            <!-- <th scope="col">URL link</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $controller = new Controllers();

                        $Query = $controller->getQuery();

                        while ($row = $Query->fetch_assoc()){
                            echo '<tr>';
                            echo '<td>' . $row['ContactID'] . '</td>';
                            echo '<td>' . $row['FullName'] . '</td>';
                            echo '<td>' . $row['Email'] . '</td>';
                            echo '<td>' . $row['PhoneNumber'] . '</td>';
                            echo '<td>' . $row['SubmitedDate'] . '</td>';
                            echo '<td>' . $row['Message'] . '</td>';
                            echo '<td>' . '' . '<button class="btn btn-danger delete-btn mx-1"><i class="fas fa-trash"></i> Delete</button>' . '</td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</body>
<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $form_id = $_POST['form_id'] ?? null;

        if( $form_id === 'addProjectForm'){
            if(isset($_POST['ProjectTitle']) && isset($_POST['ProjectTech']) && isset($_POST['ProjectDescription']) && isset($_FILES['ProjectImage']) && isset($_POST['ProjectDuration']) && isset($_POST['ProjectStatus'])){
                $ProjectTitle = $_POST['ProjectTitle'];
                $ProjectTech = $_POST['ProjectTech'];
                $ProjectDescription = $_POST['ProjectDescription'];
                $file = $_FILES['ProjectImage'];
                $ProjectDuration = $_POST['ProjectDuration'];
                if ($_POST['ProjectStatus'] === 'completedSelect') {
                    $ProjectStatus = 'Completed';
                } else {
                    $ProjectStatus = 'Ongoing';
                }
            }
                // Create an instance of the controller class
                $controller = new Controllers();
                // Call the method to upload the project to the database
                $controller->addProject($ProjectTitle, $ProjectTech, $ProjectDescription, $file, $ProjectDuration,$ProjectStatus);
                echo "<meta http-equiv='refresh' content='0'>";
        }elseif( $form_id === 'editProjectForm'){
            $ProjectID = $ProjectTitle = $ProjectTech = $ProjectDescription = $ProjectDuration = $ProjectStatus = '';
            $file = array();
            
            if (isset($_POST['editProjectID']) && isset($_POST['editProjectTitle']) && isset($_POST['editProjectCatagory']) && isset($_POST['editProjectDescription']) && isset($_FILES['editProjectImage']) && isset($_POST['editProjectDuration']) && isset($_POST['ProjectStatus'])) {
                // get the id of the row to be edited
                $ProjectID = $_POST['editProjectID'];
                $ProjectTitle = $_POST['editProjectTitle'];
                $ProjectTech = $_POST['editProjectCatagory'];
                $ProjectDescription = $_POST['editProjectDescription'];
                $file = $_FILES['editProjectImage'];
                $ProjectDuration = $_POST['editProjectDuration'];
                if ($_POST['ProjectStatus'] === 'completedSelect') {
                    $ProjectStatus = 'Completed';
                } else {
                    $ProjectStatus = 'Ongoing';
                }
            }
            $controller = new Controllers();
            
            // Call the method to upload the project to the database
            $controller->editProject($ProjectTitle, $ProjectTech, $ProjectDescription, $file, $ProjectDuration, $ProjectStatus, $ProjectID);
            echo "<meta http-equiv='refresh' content='0'>";
        }elseif($form_id === 'addPartnerForm'){
            if(isset($_POST['PartnerName']) && isset($_POST['Description']) && isset($_FILES['PartnerImage']) && isset($_POST['PartnerDuration']) && isset($_POST['PartnerStatus'])){
                $PartnerName = $_POST['PartnerName'];
                $Description = $_POST['Description'];
                $PartnerLogo = $_FILES['PartnerImage'];
                $PartnerDuration = $_POST['PartnerDuration'];
                $PartnerStatus = ($_POST['PartnerStatus'] === 'completedSelect') ? 'Completed' : 'Ongoing';
            }
            // Create an instance of the controller class
            $controller = new Controllers();
            
            // Call the method to upload the project to the database
            $controller->addPartner($PartnerName, $Description, $PartnerLogo, $PartnerDuration, $PartnerStatus);
            echo "<meta http-equiv='refresh' content='0'>";
        }elseif($form_id === 'editPartnerForm'){
            if(isset($_POST['PartnerName']) && isset($_POST['Description']) && isset($_FILES['PartnerImage']) && isset($_POST['PartnerDuration']) && isset($_POST['PartnerStatus'])){
                // get the id of the row to be edited
                $PartnerID = $_POST['PartnerID'];
                $PartnerName = $_POST['PartnerName'];
                $Description = $_POST['Description'];
                $PartenrImage = $_FILES['PartnerImage'];
                $PartnerDuration = $_POST['PartnerDuration'];
                $PartnerStatus = ($_POST['PartnerStatus'] === 'completedSelect') ? 'Completed' : 'Ongoing';
            }
            // Create an instance of the controller class
            $controller = new Controllers();
            
            // Call the method to upload the project to the database
            $controller->editPartner($PartnerID,$PartnerName, $Description, $PartenrImage, $PartnerDuration, $PartnerStatus);
            echo "<meta http-equiv='refresh' content='0'>";
        }

    }

    // Delete a project wehn the delete button is clicked

?>


<script>
    document.getElementById('togglingbtn').addEventListener('click', function () {
        document.getElementById('side-menu').classList.toggle('d-none');
    });
</script>




<!-- Code for Project -->
<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script>
   $(document).ready(function() { // Wrap code within jQuery's ready function

$('#DeleteProject').click(function() { // Use jQuery selector for event listener
  // Get the project ID from the table row
  var projectId = $(this).closest('tr').data('project-id');
  deleteProject(projectId);
});

function deleteProject(projectId) {
  // Confirmation prompt (optional)
  if (confirm("Are you sure you want to delete this project?")) {
    // Send AJAX request to PHP script for deletion
    try {
      $.ajax({ // Use jQuery.ajax instead of $.ajax
        type: 'POST',
        url: 'deleteProject.php',
        data: { ProjectID: projectId },
        success: function(response) {
          if (response === 'Success') {
            // Remove the table row from the DOM
            $(this).closest('tr').remove();
          } else {
            alert('Failed to delete project');
          }
        }.bind(this) // Bind the success callback function to the current context
      });
    } catch (error) {
      alert(error);
    }
  }
}
});
</script>
<script>
    // Script to handle modal opening when clicking "Add Project" button
    document.getElementById('addPortfolioBtn').addEventListener('click', function () {
        $('#addProjectModal').modal('show');
    });
    document.getElementById('addPartnerBtn').addEventListener('click', function () {
        $('#addPartnerModal').modal('show');
    });
   

$(document).ready(function() {
  // Edit button click event handler
  $('.edit-btn').click(function(event) {
    event.preventDefault(); // Prevent default form submission

    // Get the clicked button's closest table row (TR element)
    var clickedRow = $(this).closest('tr');

    // Extract data from relevant table cells (assuming specific columns hold data)
    var projectID = clickedRow.find('td:nth-child(1)').text();
    var projectTitle = clickedRow.find('td:nth-child(2)').text(); 
    var projectCategory = clickedRow.find('td:nth-child(4)').text(); 
    var projectDescription = clickedRow.find('td:nth-child(3)').text();
    var projectDuration = clickedRow.find('td:nth-child(6)').text();
   

  

    // Populate the edit modal form with extracted data
    $('#editProjectForm #editProjectID').val(projectID);
    $('#editProjectForm #editProjectTitle').val(projectTitle);
    $('#editProjectForm #editProjectCategory').val(projectCategory);
    $('#editProjectForm #editProjectDescription').val(projectDescription);
    $('#editProjectForm #editProjectDuration').val(projectDuration);
  
  });
});


    
   

  // Filreter for Project
    $(document).ready(function(){
        $("#titleFilter").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#ProjectTable tbody tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
    // filter for Partner
    $(document).ready(function(){
        $("#titleFilter").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#PartnerTable tbody tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
    </script>



<!-- Loging out -->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>