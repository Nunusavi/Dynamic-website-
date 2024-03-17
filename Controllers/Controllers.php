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
        $result = $pr->importProjectData($ProjectTitle, $ProjectDescription, $ProjectTech, $file, $ProjectDuration, $ProjectStatus);
    
        return $result;
        $this->refresh();
    }
    
    // Method to edit project
    public function editProject($ProjectTitle, $ProjectTech, $ProjectDescription, $file, $ProjectDuration, $ProjectStatus, $ProjectID){
        $pr = new Project();
        $result = $pr->importEditProjectData($ProjectTitle, $ProjectTech, $ProjectDescription, $file, $ProjectDuration, $ProjectStatus, $ProjectID);
        return $result;
    }
    // Method to delete project
    public function deleteProject($ProjectId){
        $pr = new Project();
        $result = $pr->importdeleteProject($ProjectId);
        return $result;
    }
    //Method to get partner data 
    public function getPartner(){
        $pa = new Partners();
        $result = $pa->fetchPartnerData();
        return $result;
    }
    // Method to add partner
    public function addPartner($PartnerName, $PartnerDiscription, $PartnerLogo, $PartnerDuration, $PartnerStatus){
        $pa = new Partners();
        $result = $pa->importPartnerData($PartnerName,$PartnerDiscription, $PartnerLogo,  $PartnerDuration, $PartnerStatus);
        return $result;

    }
    // Method to edit partner
    public function editPartner($PartnerID, $PartnerName, $PartnerLogo, $PartnerDiscription, $PartnerDuration, $PartnerStatus){
        $pa = new Partners();
        $result = $pa->importEditPartnerData($PartnerID, $PartnerName, $PartnerLogo, $PartnerDiscription, $PartnerDuration, $PartnerStatus);
        return $result;

    }
    // Method to delete partner
    public function deletePartner($PartnerID){
        $pa = new Partners();
        $result = $this->$pa->deletePartner($PartnerID);
        return $result;

    }
    public function getQuery(){
        $qu = new Query();
        $result = $qu->fetchQueryData();
        return $result;
    }
    // Fucntion to reply to query using the query email
    public function replyQuery($to, $subject, $queryReply){
        mail($to, $subject, $queryReply);
        return '<script>alert("Reply Sent Successfully")</script>';
    }


}
?>