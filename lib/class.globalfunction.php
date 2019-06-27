<?php
date_default_timezone_set('Asia/Calcutta'); 
ini_set("display_errors", 1);
error_reporting(E_ALL);

include ('class.mysqldb.php');

class GlobalFunction{
    
    
    public function encrypt($pure_string) {
        $dirty = array("+", "/", "=");
        $clean = array("_PLUS_", "_SLASH_", "_EQUALS_");
        
        $encrypted_string = base64_encode($pure_string);
        return str_replace($dirty, $clean, $encrypted_string);
    }
    
    public function decrypt($encrypted_string) {
        $dirty = array("+", "/", "=");
        $clean = array("_PLUS_", "_SLASH_", "_EQUALS_");
        
        return $encrypted_string = base64_decode(str_replace($clean, $dirty, $encrypted_string));
    }
    
    public function getHomeSliderImage(){
        $db = new MySqlDB();
       
        $sql = "select
                    a.SliderImage,
                    a.SliderTitle
                from homeslider a
                where 1 = 1
                and a.ActiveFl = 1  ";
        $rs = $db->getResultSet($sql);
        
        return $rs;        
    }
        
    public function getHomePageProject(){
        $db = new MySqlDB();
       
        $sql = "select
                    a.ProjectID,
                    a.ProjectTitle,
                    (Select ifnull(FilePath, '') from projectgallery pg where 1 = 1 and pg.ProjectID = a.ProjectID order by GalleryID limit 1) as Image
                from project a
                where 1 = 1
                and a.ActiveFl = 1
                order by a.ProjectTitle asc
                limit 20";
        $rs = $db->getResultSet($sql);
        
        return $rs;        
    }
    
    public function getCboProjectType(){
        $db = new MySqlDB();
       
        $sql = "select
                    a.CategoryID,
                    a.CatergoryName
                from projectcategory a
                where 1 = 1
                and a.ActiveFl = 1
                order by a.CatergoryName asc ";
        $rs = $db->getResultSet($sql);
        
        return $rs;        
    }
    
    public function getCboProjectLocation($CategoryID){
        $db = new MySqlDB();
       
              $sql = "select 
                    distinct b.LocationID,
                    b.LocationTitle
                from project a
                join projectlocation b
                on b.LocationID = a.LocationID
                where 1 = 1
                and a.CategoryID = $CategoryID
                and b.ActiveFl = 1
                order by b.LocationTitle asc   ";
            
              
        $rs = $db->getResultSet($sql);
        
        return $rs;        
    }
    
    
    public function getProjectLists($TypeID, $LocationID){
        $db = new MySqlDB();
       
        $sql = "select
                    a.ProjectID,
                    a.ProjectTitle,
                    a.CategoryID,
                    (Select ifnull(FilePath, '') from projectgallery pg where 1 = 1 and pg.ProjectID = a.ProjectID order by GalleryID limit 1) as Image
                from project a
                where 1 = 1
                and a.ActiveFl = 1";
        if($TypeID != '0'){
            $sql .=" and a.CategoryID = $TypeID ";
        }
        
        if($LocationID != '0'){
            $sql .=" and a.LocationID = $LocationID ";
        }
        
        $sql .=" order by a.ProjectTitle asc ";
        
        $rs = $db->getResultSet($sql);
        
        return $rs;        
    }
    
    
    public function getProjectDetail($ProjectID){
        $db = new MySqlDB();
       
        $sql = "select
                    a.ProjectID,
                    a.ProjectTitle,
                    a.ProjectDescription,
                    a.ProjectMapLocation,
                    b.CatergoryName,
                    c.LocationTitle,
                    a.Appointment,
                    a.Area,
                    a.ClientName,
                    a.Engineer,
                    a.Completion,
                    a.Capacity,
                    a.QuantitySurveyor
                from project a
                join projectcategory b
                on b.CategoryID = a.CategoryID
                left outer join projectlocation c
                on c.LocationID = a.LocationID
                where 1 = 1
                and a.ActiveFl = 1
                and a.ProjectID = $ProjectID";
        
        $rs = $db->getSingleRow($sql);
        
        
        $Gallery = array();
        
        $sql = "select
                    GalleryID,
                    FilePath
                from projectgallery
                where 1 = 1
                and ProjectID = $ProjectID ";
        
        $rg = $db->getResultSet($sql);
        
        while($r = $rg->fetch_assoc()){
            array_push($Gallery,$r['FilePath']);
        }
        
        $Award = array();
        
        $sql = "select
                    AwardID,
                    AwardName
                from projectaward
                where 1 = 1
                and ProjectID = $ProjectID ";
        $ra = $db->getResultSet($sql);
        
        while($r = $ra->fetch_assoc()){
            array_push($Award,$r['AwardName']);
        }
        
        $Team = array();
        
        $sql = "select
                    TeamID,
                    TeamName
                from projectteam
                where 1 = 1
                and ProjectID = $ProjectID ";
        $ra = $db->getResultSet($sql);
        
        while($r = $ra->fetch_assoc()){
            array_push($Team,$r['TeamName']);
        }
        
        return array(
            'Detail' => $rs, 
            'Gallery' => $Gallery, 
            'Award' => $Award, 
            'Team' => $Team 
        );        
    }
    
    
    
}

?>