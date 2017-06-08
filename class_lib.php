<?php
    class game {
        public $link;
        public $category_id;
        public $username;
        public $game_id;
        public $participant_id;
        public $is_new;
        public $user_id;
        public $player_turn_type;
        public $game_categories;
        //Only for existing game:
        public $user_points;
        public $turn_holder;
        public $latest_chooser;
        public $turn_type;
        public $selected_category;
        public $selected_category_owner;
        public $selected_points;
        public $category_count;
        public $jeopardy_category_name;
        public $jeopardy_points;
        public $jeopardy_answer;
        public $jeopardy_game_category_id;
        public $players;

        function __construct($link) {
            $this->link = $link;
        }

        function get_game_from_post($start_game_request) {
            $this->category_id = $start_game_request['category_id'];
            $this->username = $start_game_request['username'];
            $this->game_id = $start_game_request['game_id'];
            $this->participant_id = $start_game_request['participant_id'];
            $this->category_count = 1;

            $_SESSION['katid'] = $this->category_id;
	        $_SESSION['bruger'] = $this->username;
	        $_SESSION['spilid'] = $this->game_id;
	        $_SESSION['deltager'] = $this->participant_id;

            $this->is_new = true;
            $this->user_id = $_SESSION['userid'];

            if ($start_game_request['start_type'] == 'new_game') {   
                $this->player_turn_type = 1;
            } else if ($start_game_request['start_type'] == 'participate') {
                $this->player_turn_type = 0;
            }

            $this->user_points = 0;

            $this->add_game_category();
            $this->get_game_categories();
        }

        function get_game_from_cookie() {
            $this->category_id = $_SESSION['katid'];
	        $this->username = $_SESSION['bruger'];
	        $this->game_id = $_SESSION['spilid'];
	        $this->participant_id = $_SESSION['deltager'];
            $this->is_new = false;
            $this->user_id = $_SESSION['userid'];
            $this->get_points();
            $this->get_turn();
            $this->get_game_categories();
            $this->get_category_count();
        }

        function submit_choice($choice) {
            $gamecategorychoice = substr($choice, 0, -3);
            $pointchoice = substr($choice, -3);

            mysqli_query($this->link, "UPDATE spil SET spilkategoriid='$gamecategorychoice', latestchooser='$this->username', point='$pointchoice', aktivtidspunkt=NOW() WHERE spilid='$this->game_id'");
            mysqli_query($this->link, "UPDATE deltager SET tur='0' WHERE deltagerid='$this->participant_id'");
            $sql = mysqli_query($this->link,
                "SELECT deltagerid
                FROM spilkategori
                WHERE spilkategoriid='$gamecategorychoice'");
            $row = mysqli_fetch_assoc($sql);
            $catdeltager = $row['deltagerid'];
            mysqli_query($this->link, "UPDATE deltager SET tur='2' where deltagerid='$catdeltager'");
            $this->player_turn_type=0;
        }

        private function get_points() {
            $sql100points = mysqli_query($this->link, "SELECT COUNT(*) as count FROM spilkategori WHERE spilid='$this->game_id' AND vundet100='$this->participant_id'");
            $sql200points = mysqli_query($this->link, "SELECT COUNT(*) as count FROM spilkategori WHERE spilid='$this->game_id' AND vundet200='$this->participant_id'");
            $sql300points = mysqli_query($this->link, "SELECT COUNT(*) as count FROM spilkategori WHERE spilid='$this->game_id' AND vundet300='$this->participant_id'");
            $sql400points = mysqli_query($this->link, "SELECT COUNT(*) as count FROM spilkategori WHERE spilid='$this->game_id' AND vundet400='$this->participant_id'");
            $sql500points = mysqli_query($this->link, "SELECT COUNT(*) as count FROM spilkategori WHERE spilid='$this->game_id' AND vundet500='$this->participant_id'");
            if($sql100points and $sql200points and $sql300points and $sql400points and $sql500points)
            {
                $row100p = mysqli_fetch_assoc($sql100points);
                $row200p = mysqli_fetch_assoc($sql200points);
                $row300p = mysqli_fetch_assoc($sql300points);
                $row400p = mysqli_fetch_assoc($sql400points);
                $row500p = mysqli_fetch_assoc($sql500points);
            } else {
                $error = 'Kunne ikke finde point.' . mysqli_error($this->link);
                include 'error.html.php';
                exit();
            }
            $this->user_points = 100*$row100p['count']+200*$row200p['count']+300*$row300p['count']+400*$row400p['count']+500*$row500p['count'];
        }

        private function get_turn() {
            $sql = mysqli_query($this->link, "SELECT tur FROM deltager WHERE deltagerid='$this->participant_id'");
            if($sql)
            {
                $row = mysqli_fetch_assoc($sql);
                $this->player_turn_type = $row['tur'];
                $_SESSION['tur'] = $this->player_turn_type;
                
            } else {
                $error = 'Kunne ikke finde tur.' . mysqli_error($this->link);
                include 'error.html.php';
                exit();
            }
        }

        private function add_game_category() {
            mysqli_query($this->link, "INSERT INTO spilkategori (kategoriid,spilid,deltagerid,vundet100,vundet200,vundet300,vundet400,vundet500) VALUES ('$this->category_id','$this->game_id','$this->participant_id',NULL,NULL,NULL,NULL,NULL)");
        }

        private function get_game_categories() {
            $sql = mysqli_query($this->link,
                "SELECT spilkategori.kategoriid,spilkategori.spilkategoriid,kategori.navn
                FROM spilkategori
                INNER JOIN kategori
                ON spilkategori.kategoriid=kategori.kategoriid
                WHERE spilkategori.spilid='$this->game_id'
                AND deltagerid!=$this->participant_id");
            if(!$sql) {
                $error = 'Kunne ikke finde spilkategorier.' . mysqli_error($this->link);
                include 'error.html.php';
                exit();
            }
            $categories = array();
            while ($row = mysqli_fetch_array($sql, MYSQLI_ASSOC)) {
                $categories[] = array($row['kategoriid'],$row['spilkategoriid'],$row['navn']);
            }
            $this->game_categories = $categories;
        }

        function submit_round_winner($round_winner_request) {
            $roundwinner = $round_winner_request['roundwinner'];
            $pointswon = $round_winner_request['pointswon'];
            $categorywon = $round_winner_request['categorywon'];

            $sqlpoints = 'vundet' . $pointswon;

            mysqli_query($this->link, "UPDATE spilkategori SET $sqlpoints='$roundwinner' WHERE spilkategoriid='$categorywon'");
            mysqli_query($this->link, "UPDATE deltager SET tur=1 WHERE deltagerid='$roundwinner'");
            mysqli_query($this->link, "UPDATE deltager SET tur=0 WHERE deltagerid='$this->participant_id'");
            $this->player_turn_type = 0;
        }

        function get_turn_holder() {
            $sql = mysqli_query($this->link,
                "SELECT bruger.navn,spil.latestchooser,kategori.navn as kategorinavn,deltager.tur
                FROM deltager
                    JOIN spil ON deltager.spilid=spil.spilid
                    JOIN bruger ON deltager.brugerid=bruger.brugerid
                    JOIN spilkategori ON spilkategori.deltagerid=deltager.deltagerid
                    JOIN kategori ON spilkategori.kategoriid=kategori.kategoriid
                WHERE spil.spilid='$this->game_id' AND deltager.tur!='0'");
            $row = mysqli_fetch_assoc($sql);
            $this->turn_holder = $row['navn'];
            $this->latest_chooser = $row['latestchooser'];
            $this->turn_type = $row['tur'];
        }

        function get_category_owner_points() {
            $sql = mysqli_query($this->link,
                "SELECT kategori.navn,spil.point,bruger.navn as brugernavn
                FROM spil
                    JOIN spilkategori ON spil.spilkategoriid=spilkategori.spilkategoriid
                    JOIN kategori ON spilkategori.kategoriid=kategori.kategoriid
                    JOIN bruger ON kategori.brugerid=bruger.brugerid
                WHERE spil.spilid='$this->game_id'");
            $row = mysqli_fetch_assoc($sql);
            $this->selected_category = $row['navn'];
            $this->selected_category_owner = $row['brugernavn'];
            $this->selected_points = $row['point'];
        }

        private function get_category_count() {
            $sql = mysqli_query($this->link, "SELECT count(*) as count FROM spilkategori WHERE spilid='$this->game_id' AND (vundet100 IS NULL OR vundet200 IS NULL OR vundet300 IS NULL OR vundet400 IS NULL OR vundet500 IS NULL)");
            $row = mysqli_fetch_assoc($sql);
            $this->category_count = $row['count'];
        }

        function end() {
            mysqli_query($this->link, "UPDATE spil SET status='inaktiv' WHERE spilid='$this->game_id'");
        }

        function category_chooser() {
            $sql = mysqli_query($this->link, "SELECT count(*) as count FROM spilkategori WHERE spilid='$this->game_id'");
            $row = mysqli_fetch_array($sql);
            $this->new_category_count = $row['count'];
            $_SESSION['count'] = $this->new_category_count;

            $this->last_category_owner = false;
            if($this->category_count == 1 && $this->new_category_count > 1)
            {
                $sql = mysqli_query($this->link, "SELECT deltagerid FROM spilkategori WHERE spilid='$this->game_id' AND (vundet100 IS NULL OR vundet200 IS NULL OR vundet300 IS NULL OR vundet400 IS NULL OR vundet500 IS NULL)");
                $row = mysqli_fetch_assoc($sql);
                if ($row['deltagerid'] == $this->participant_id)
                {
                    $this->last_category_owner = true;
                }
                if ($this->last_category_owner == true)
                {
                    $sql = mysqli_query($this->link,
                        "SELECT spilkategori.kategoriid,spilkategori.spilkategoriid,kategori.navn
                        FROM spilkategori
                        INNER JOIN kategori
                        ON spilkategori.kategoriid=kategori.kategoriid
                        WHERE spilkategori.spilid='$this->game_id'
                        AND deltagerid=$this->participant_id");
                    $row = mysqli_fetch_assoc($sql);
                    $this->game_categories = array();
                    $this->game_categories[0] = array($row['kategoriid'],$row['spilkategoriid'],$row['navn']);
                }
            }
        }

        function category_reader() {
            $sql = mysqli_query($this->link, "SELECT point FROM spil WHERE spilid='$this->game_id'");
            $row = mysqli_fetch_assoc($sql);
            $this->jeopardy_points = $row['point'];
            $answer_string = "kategori." . $this->jeopardy_points . "point";

            $sql = mysqli_query($this->link,
            "SELECT $answer_string as answer, kategori.navn as name, spilkategori.spilkategoriid as spilcatid
            FROM kategori
                JOIN spilkategori ON kategori.kategoriid=spilkategori.kategoriid
                JOIN spil ON spilkategori.spilkategoriid=spil.spilkategoriid
            WHERE spil.spilid='$this->game_id'");
            
            $row = mysqli_fetch_assoc($sql);
            $this->jeopardy_answer = $row['answer'];
            $this->jeopardy_category_name = $row['name'];
            $this->jeopardy_game_category_id = $row['spilcatid'];

            $sql = mysqli_query($this->link,
                "SELECT deltager.deltagerid as deltagerid, bruger.navn as navn
                FROM deltager JOIN bruger ON deltager.brugerid=bruger.brugerid
                WHERE deltager.spilid='$this->game_id'
                AND deltager.brugerid != '$this->user_id'");
            $this->players = array();
            while ($row = mysqli_fetch_array($sql, MYSQLI_ASSOC))
            {
                $this->players[] =  array($row['deltagerid'],$row['navn']);
            }
        }
    }
?>