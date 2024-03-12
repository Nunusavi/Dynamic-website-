<?php
Include '../Model/Models.php';
class Controllers extends Admin{
    //Method to Login
    public function  Login($user, $pass){
        $ad = new Admin();
        $result = $ad->getData($user);
        while($row = $result->fetch_assoc()){
            if($user == $row['USER_NAME'] && $pass == $row['PASS_WORD']){
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $user;
                return true;
            }else{
                return false;
            }
        }  
    }
    
    
    //method to get Project data
    public function getProject(){
        $pr = new Project();
        $result = $pr->fetchProjectData();
        return $result;
    }
    public function getProjectByTitle($ProjectTitle){
        $pr = new Project();
        $result = $pr->fetchProjectDatabyTitle($ProjectTitle);
        return $result;
    }

    public function addProject($ProjectTitle, $ProjectDescription, $ProjectTech, $file, $ProjectStatus, $ProjectDuration) {
        
        // Create a new Project instance
        $pr = new Project();
    
        // Use the uploaded image path for insertion
        $result = $pr->importProjectData($ProjectTitle, $ProjectDescription, $ProjectTech, $file, $ProjectStatus, $ProjectDuration);
    
        return $result;
    }
    
    // Method to edit project
    public function editProject( $ProjectTitle, $ProjectTech, $ProjectDescription, $file, $ProjectDuration, $ProjectStatus){
        $pr = new Project();
        $result = $this->$pr->editProject($ProjectTitle, $ProjectTech, $ProjectDescription, $file, $ProjectDuration, $ProjectStatus);
        return $result;
    }
    // Method to delete project
    public function deleteProject($ProjectId){
        $pr = new Project();
        $result = $this->$pr->deleteProject($ProjectId);
        return $result;
    }
    //Method to get partner data 
    public function getPartner(){
        $pa = new Partners();
        $result = $pa->fetchPartnerData();
        return $result;
    }
    // Method to add partner
    public function addPartner($PartnerName, $PartnerLogo, $PartnerDiscription, $PartnerStartDate, $PartnerEndDate){
        $pa = new Partners();
        $result = $this->$pa->addPartner($PartnerName, $PartnerLogo, $PartnerDiscription, $PartnerStartDate, $PartnerEndDate);
        return $result;
    }
    // Method to edit partner
    public function editPartner($PartnerID, $PartnerName, $PartnerLogo, $PartnerDiscription, $PartnerStartDate, $PartnerEndDate){
        $pa = new Partners();
        $result = $this->$pa->editPartner($PartnerID, $PartnerName, $PartnerLogo, $PartnerDiscription, $PartnerStartDate, $PartnerEndDate);
        return $result;
    }
    // Method to delete partner
    public function deletePartner($PartnerID){
        $pa = new Partners();
        $result = $this->$pa->deletePartner($PartnerID);
        return $result;
    }

    

}
?>