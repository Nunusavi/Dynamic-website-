<?php
include 'Db.php';
class Admin extends Db{
    //properties 
    protected Int $AdminId;
    protected String $User_Name;
    protected String $AdminPassword;

    //Methods 
    protected function getData($user){
        $stmt = "SELECT * from admins where User_Name = '$user'";
        $result = $this->c()->query($stmt);
        return $result;
    }
}
class Project extends Admin{
    //properties 
    protected Int $ProjectId;
    protected String $ProjectTitle;
    protected String $ProjectDescription;
    protected String $ProjectImage;
    protected String $ProjectStatus;
    protected String $ProjectDuration;
    protected String $ProjectTech;

    // Constructor
    public function __construct(){
        $this->ProjectId = 0;
        $this->ProjectTitle = "";
        $this->ProjectDescription = "";
        $this->ProjectImage = "";
        $this->ProjectStatus = "";
        $this->ProjectDuration = "";
        $this->ProjectTech = "";
    }
    //Methods for projectsss
    protected  function getProject(){
        $stmt = "SELECT * from projects";
        $result = $this->c()->query($stmt);
        return $result;
    }
    protected  function getProjectById($ProjectId){
        $stmt = "SELECT * from projects where ProjectId = '$ProjectId'";
        $result = $this->c()->query($stmt);
        return $result;
    }
    protected function getProjectTitle($ProjectTitle){
        $stmt = "SELECT * from projects where ProjectTitle = '$ProjectTitle'";
        $result = $this->c()->query($stmt);
        return $result;
    }
    protected function getProjectDescription($ProjectId){
        $stmt = "SELECT ProjectDescription from projects where ProjectId = '$ProjectId'";
        $result = $this->c()->query($stmt);
        return $result;
    }
    protected function getProjectDuration($ProjectId){
        $stmt = "SELECT ProjectDuration from projects where ProjectId = '$ProjectId'";
        $result = $this->c()->query($stmt);
        return $result;
    }
    protected function getProjectTech($ProjectId){
        $stmt = "SELECT ProjectTech from projects where ProjectId = '$ProjectId'";
        $result = $this->c()->query($stmt);
        return $result;
    }
    protected function getProjectImage($ProjectId){
        $stmt = "SELECT ProjectImage from projects where ProjectId = '$ProjectId'";
        $result = $this->c()->query($stmt);
        return $result;
    }
    
    protected function addProject($ProjectTitle, $ProjectDescription, $ProjectDuration, $ProjectTech, $file, $ProjectStatus)
{
    // Image upload code
    $target_dir = "../uploads/Projects";  // Adjust path as needed
    $file = $_FILES["ProjectImage"];  // Assuming the image input name is "image"
if (!file_exists($target_dir)) {
    mkdir($target_dir, 0755, true); 
}

    // Generate a unique filename with timestamp
    $uniqueFilename = "Techville_" . str_replace(' ', '_', $ProjectTitle) . "_" . time() . ".png";
    $target_file = $target_dir . $uniqueFilename;

    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Image validation checks (same as previous example)

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "<script>alert('Sorry, your file was not uploaded.')</script>";
        exit;
    // If everything is ok, try to upload file
    } else {
        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            echo "<script>alert('The file ". basename( $file["name"]). " has been uploaded.');</script>";
        } else {
            echo "<sript>alert('Sorry, there was an error uploading your file.')</script>";
        }
    }

    // Insert image path into database
    $stmt = "INSERT INTO projects (ProjectTitle, ProjectTech, ProjectDescription, ProjectImage, ProjectDuration, ProjectStatus) VALUES ('$ProjectTitle', '$ProjectTech', '$ProjectDescription', '$target_file', '$ProjectDuration', '$ProjectStatus')";
    $result = $this->c()->query($stmt);
    return $result;
}
    protected  function updateProject($ProjectTitle, $ProjectTech, $ProjectDescription, $file, $ProjectDuration, $ProjectStatus){
        $stmt = "UPDATE projects SET ProjectTech = '$ProjectTech', ProjectDescription = '$ProjectDescription', ProjectImage = '$file', ProjectDuration = '$ProjectDuration', ProjectStatus = '$ProjectStatus' WHERE ProjectTitle = '$ProjectTitle'";
        $result = $this->c()->query($stmt);
        return $result;
    }
    protected  function deleteProject($ProjectId){
        $stmt = "DELETE FROM projects WHERE ProjectId = '$ProjectId'";
        $result = $this->c()->query($stmt);
        return $result;
    }
    protected function getTotalProjects(){
        $stmt = "SELECT COUNT(*) from projects";
        $result = $this->c()->query($stmt);
        return $result;
    }
    public function fetchProjectDatabyTitle($ProjectTitle){
        $pr = new Project();
        $result = $pr->getProjectTitle($ProjectTitle);
        
        if ($result->num_rows == 0) {
            echo "<script>alert('No project found')</script>";
        } else {
            return $result;
        }
    }
    public function importEditProjectData($ProjectTitle, $ProjectTech, $ProjectDescription, $file, $ProjectDuration, $ProjectStatus){
        $pr = new Project();
        $result = $pr->updateProject($ProjectTitle, $ProjectTech, $ProjectDescription, $file, $ProjectDuration, $ProjectStatus);
        return $result;
    }
    public function fetchProjectData(){
        $pr = new Project();
        $result = $pr->getProject();
        return $result;
    }
    public function importProjectData($ProjectTitle, $ProjectDescription, $ProjectTech, $ProjectImage, $ProjectStatus, $ProjectDuration){
        $pr = new Project();
        $result = $pr->addProject($ProjectTitle, $ProjectDescription, $ProjectTech, $ProjectImage, $ProjectStatus, $ProjectDuration);
        return $result;
    }
   
}
class Partners extends admin{
    //properties 
    protected Int $PartnerID;
    protected String $PartnerName;
    protected String $PartnerLogo;
    protected String $PartnerDiscription;
    protected String $PartnerStatus;
    protected String $PartnerDuration;

    //Methods 
    protected  function getPartner(){
        $stmt = "SELECT * from Partners";
        $result = $this->c()->query($stmt);
        return $result;
    }
    protected  function getPartnerById($PartnerID){
        $stmt = "SELECT * from Partners where PartnerID = '$PartnerID'";
        $result = $this->c()->query($stmt);
        return $result;
    }
    protected  function addPartner($PartnerName, $PartnerLogo, $PartnerDiscription, $PartnerStartDate, $PartnerEndDate){
        // add Image upload code here
        // Image upload code
    $target_dir = "../uploads/Partners";  // Adjust path as needed
    $file = $_FILES["PartnerImage"];  // Assuming the image input name is "image"
if (!file_exists($target_dir)) {
    mkdir($target_dir, 0755, true); 
}

    // Generate a unique filename with timestamp
    $uniqueFilename = "Techville_" . str_replace(' ', '_', $PartnerName) . "_" . time() . ".png";
    $target_file = $target_dir . $uniqueFilename;

    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Image validation checks (same as previous example)

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "<script>alert('Sorry, your file was not uploaded.')</script>";
        exit;
    // If everything is ok, try to upload file
    } else {
        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            echo "<script>alert('The file ". basename( $file["name"]). " has been uploaded.');</script>";
        } else {
            echo "<sript>alert('Sorry, there was an error uploading your file.')</script>";
        }
    }
        $stmt = "INSERT INTO Partners (PartnerName, PartnerLogo, PartnerDiscription, PartnerStartDate, PartnerEndDate) VALUES ('$PartnerName', '$PartnerLogo', '$PartnerDiscription', '$PartnerStartDate', '$PartnerEndDate')";
        $result = $this->c()->query($stmt);
        return $result;
    }
    protected  function updatePartner($PartnerID, $PartnerName, $PartnerLogo, $PartnerDiscription, $PartnerStartDate, $PartnerEndDate){
        $stmt = "UPDATE Partners SET PartnerName = '$PartnerName', PartnerLogo = '$PartnerLogo', PartnerDiscription = '$PartnerDiscription', PartnerStartDate = '$PartnerStartDate', PartnerEndDate = '$PartnerEndDate' WHERE PartnerID = '$PartnerID'";
        $result = $this->c()->query($stmt);
        return $result;
    }
    protected  function deletePartner($PartnerID){
        $stmt = "DELETE FROM Partners WHERE PartnerID = '$PartnerID'";
        $result = $this->c()->query($stmt);
        return $result;
    }
    protected function getTotalPartners(){
        $stmt = "SELECT COUNT(*) from Partners";
        $result = $this->c()->query($stmt);
        return $result;
    }
    public function fetchPartnerData(){
        $pr = new Partners();
        $result = $pr->getPartner();
        return $result;
    } 
    public function importPartnerData($PartnerName, $PartnerLogo, $PartnerDiscription, $PartnerStartDate, $PartnerEndDate){
        $pr = new Partners();
        $result = $pr->addPartner($PartnerName, $PartnerLogo, $PartnerDiscription, $PartnerStartDate, $PartnerEndDate);
        return $result;
    }
        
}
class ContactQuery extends Admin{
    //Properties 
    protected int $QueryId;
    protected string $FullName;
    protected string $Email;
    protected String $Query_Message;
    protected string $QueryDate;

    //Methods 
    Protected function get_query(){
        $stmt = "Select * from  ContactQuery";
        $result = $this->c()->query($stmt);
        return $result;
    }

}
?>