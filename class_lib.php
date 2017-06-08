<?php
    class game {
        public $category_id;
        public $username;
        public $game_id;
        public $participant_id;
        public $is_new;
        public $user_id;
        public $player_turn_type;
        //Only for existing game:
        public $user_points;

        function get_game_from_post($start_game_request) {
            $this->category_id = $start_game_request['category_id'];
            $this->username = $start_game_request['username'];
            $this->game_id = $start_game_request['game_id'];
            $this->participant_id = $start_game_request['participant_id'];

            $_SESSION['katid'] = $this->category_id;
	        $_SESSION['bruger'] = $this->username;
	        $_SESSION['spilid'] = $this->game_id;
	        $_SESSION['deltager'] = $this->participant_id;

            $this->is_new = true;
            $this->user_id = $_SESSION['userid'];

            if ($start_game_request['start_type'] == 'new_game')
            {   
                $this->player_turn_type = 1;
            } else if ($start_game_request['start_type'] == 'participate')
            {
                $this->player_turn_type = 0;
            }

            $this->user_points = 0;

            include('conn.php');
            mysqli_query($link, "INSERT INTO spilkategori (kategoriid,spilid,deltagerid,vundet100,vundet200,vundet300,vundet400,vundet500) VALUES ('$this->category_id','$this->game_id','$this->participant_id',NULL,NULL,NULL,NULL,NULL)");
        }
        function get_game_from_cookie() {
            $this->category_id = $_SESSION['katid'];
	        $this->username = $_SESSION['bruger'];
	        $this->game_id = $_SESSION['spilid'];
	        $this->participant_id = $_SESSION['deltager'];
            $this->is_new = false;
            $this->user_id = $_SESSION['userid'];

            include('conn.php');
            //Points calculation:
            $sql100points = mysqli_query($link, "SELECT COUNT(*) as count FROM spilkategori WHERE spilid='$this->game_id' AND vundet100='$this->participant_id'");
            $row100p = mysqli_fetch_assoc($sql100points);
            $sql200points = mysqli_query($link, "SELECT COUNT(*) as count FROM spilkategori WHERE spilid='$this->game_id' AND vundet200='$this->participant_id'");
            $row200p = mysqli_fetch_assoc($sql200points);
            $sql300points = mysqli_query($link, "SELECT COUNT(*) as count FROM spilkategori WHERE spilid='$this->game_id' AND vundet300='$this->participant_id'");
            $row300p = mysqli_fetch_assoc($sql300points);
            $sql400points = mysqli_query($link, "SELECT COUNT(*) as count FROM spilkategori WHERE spilid='$this->game_id' AND vundet400='$this->participant_id'");
            $row400p = mysqli_fetch_assoc($sql400points);
            $sql500points = mysqli_query($link, "SELECT COUNT(*) as count FROM spilkategori WHERE spilid='$this->game_id' AND vundet500='$this->participant_id'");
            $row500p = mysqli_fetch_assoc($sql500points);
            $this->user_points = 100*$row100p['count']+200*$row200p['count']+300*$row300p['count']+400*$row400p['count']+500*$row500p['count'];
            //Get turn
            $sql = mysqli_query($link, "SELECT tur FROM deltager WHERE deltagerid='$this->participant_id'");
            if($sql)
            {
                $row = mysqli_fetch_assoc($sql);
                $this->player_turn_type = $row['tur'];
                $_SESSION['tur'] = $this->player_turn_type;
                
            }
            else
            {
                $error = 'Kunne ikke finde tur.' . mysqli_error($link);
                include 'error.html.php';
                exit();
            }
            
        }
        function submit_choice($choice) {
            include('conn.php');
            
            $gamecategorychoice = substr($choice, 0, -3);
            $pointchoice = substr($choice, -3);

            mysqli_query($link, "UPDATE spil SET spilkategoriid='$gamecategorychoice', latestchooser='$this->username', point='$pointchoice', aktivtidspunkt=NOW() WHERE spilid='$this->game_id'");
            mysqli_query($link, "UPDATE deltager SET tur='0' WHERE deltagerid='$this->participant_id'");
            $sql = mysqli_query($link,
                "SELECT deltagerid
                FROM spilkategori
                WHERE spilkategoriid='$gamecategorychoice'");
            $row = mysqli_fetch_assoc($sql);
            $catdeltager = $row['deltagerid'];
            mysqli_query($link, "UPDATE deltager SET tur='2' where deltagerid='$catdeltager'");
            $this->player_turn_type=0;
        }
    }
?>