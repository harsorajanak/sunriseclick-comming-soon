<?php
require __DIR__ . '\..\config\database.php';

class SunriseClick {

    protected $db;

    public function __construct() {
        $this->db = DB();
    }

    public function Login($username, $password)
    {
        try {
            $query = $this->db->prepare("SELECT `id`,`name` FROM users WHERE email=:email AND password=:password");
            $query->bindParam("email", $username, PDO::PARAM_STR);
            $enc_password = hash('sha256', $password);
            $query->bindParam("password", $enc_password, PDO::PARAM_STR);
            $query->execute();
            if ($query->rowCount() > 0) {
                $result = $query->fetch(PDO::FETCH_OBJ);
                return $result;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function updateHomePageDetails($data=array()){
        try {
            $query = $this->db->prepare("
            UPDATE cms_content SET 
            heading1=:heading1, 
            heading2=:heading2, 
            count_year=:count_year, 
            count_month=:count_month, 
            count_date=:count_date, 
            count_hours=:count_hours, 
            count_minutes=:count_minutes, 
            count_seconds=:count_seconds, 
            fb_url=:fb_url, 
            ytb_url=:ytb_url, 
            twt_url=:twt_url 
            WHERE id=1");
            $query->bindParam("heading1", $data['heading1'], PDO::PARAM_STR);
            $query->bindParam("heading2", $data['heading1'], PDO::PARAM_STR);
            $query->bindParam("count_year", $data['year'], PDO::PARAM_INT);
            $query->bindParam("count_month", $data['month'], PDO::PARAM_INT);
            $query->bindParam("count_date", $data['date'], PDO::PARAM_INT);
            $query->bindParam("count_hours", $data['hours'], PDO::PARAM_INT);
            $query->bindParam("count_minutes", $data['minutes'], PDO::PARAM_INT);
            $query->bindParam("count_seconds", $data['seconds'], PDO::PARAM_INT);
            $query->bindParam("fb_url", $data['fb_url'], PDO::PARAM_STR);
            $query->bindParam("ytb_url", $data['ytb_url'], PDO::PARAM_STR);
            $query->bindParam("twt_url", $data['twt_url'], PDO::PARAM_STR);
            $query->execute();
            if ($query->rowCount() > 0) {
               return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function getHomePageDetails(){
        try {
            $query = $this->db->prepare("SELECT * FROM cms_content WHERE  id=1");
            $query->execute();
            if ($query->rowCount() > 0) {
                $result = $query->fetch(PDO::FETCH_OBJ);
                return $result;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function updateContactUsDetails($data=array()){

       try {
        $query = $this->db->prepare("
            UPDATE cms_content SET 
            email=:email, 
            phone=:phone, 
            working_time=:working_time, 
            working_days=:working_days, 
            off_days=:off_days
            WHERE id=1");
        $query->bindParam("email", $data['email'], PDO::PARAM_STR);
        $query->bindParam("phone", $data['phone'], PDO::PARAM_STR);
        $query->bindParam("working_time", $data['working_time'], PDO::PARAM_STR);
        $query->bindParam("working_days", $data['working_days'], PDO::PARAM_STR);
        $query->bindParam("off_days", $data['off_days'], PDO::PARAM_STR);
        $query->execute();
        if ($query->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        exit($e->getMessage());
       }
    }

    public function getAllSubscribers(){
        try {
            $query = $this->db->prepare("SELECT * FROM subscribers");
            $query->execute();
            if ($query->rowCount() > 0) {
                $result = $query->fetchAll(PDO::FETCH_OBJ);
                return $result;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function subscribeUser($data=array()){
        try {


            $isEmailExits =  $this->isEmailExists($data['email']);
            if($isEmailExits){
                return 201;
            }

            $query = $this->db->prepare("INSERT INTO subscribers  (`name`,`email`,`created_at`) values (:name,:email,:created_at)");
            $query->execute([
                'name'=>$data['name'],
                'email'=>$data['email'],
                'created_at'=>date('Y-m-d H:i:s')
            ]);
            if ($query->rowCount() > 0) {
                return 200;
            } else {
                return 502;
            }
        } catch (PDOException $e) {
            return 401;
        }
    }

    public function isEmailExists($email){
        try {
            $query = $this->db->prepare("SELECT * FROM subscribers WHERE  email=:email");
            $query->bindParam("email", $email, PDO::PARAM_STR);
            $query->execute();
            if ($query->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
}