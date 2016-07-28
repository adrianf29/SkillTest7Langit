<?php
	header('Content-Type: application-vnd.ms-excel');
	header('Content-Disposition: attachment;filename="Laporan_Pertandingan.xls"');
?>

<h2 align="center">Match Report</h2>
<br/>
<h3>Singles</h2>
<table border="1">
<tr>
	<th rowspan="2" align="center"><b>No</b></th>
	<th rowspan="2" align="center"><b>Player 1 Name</b></th>
	<th rowspan="2" align="center"><b>Country Player 1</b></th>
	<th rowspan="2" align="center"><b>Player 2 Name</b></th>
	<th rowspan="2" align="center"><b>Country Player 2</b></th>
	<th rowspan="2" align="center"><b>Umpire</b></th>
	<th rowspan="2" align="center"><b>Subclass</b></th>
	<th rowspan="2" align="center"><b>Shuttle Cock</b></th>
	<th rowspan="2" align="center"><b>Main ke</b></th>
	<th rowspan="2" align="center"><b>Status</b></th>
	<th rowspan="2" align="center"><b>Court</b></th>
	<th align="center" colspan="2"><b>Score Game 1</b></th>
	<th align="center" colspan="2"><b>Score Game 2</b></th>
	<th align="center" colspan="2"><b>Score Game 3</b></th>
</tr>
<tr>
	<th align="center"><b>Team 1</b></th>
	<th align="center"><b>Team 2</b></th>
	<th align="center"><b>Team 1</b></th>
	<th align="center"><b>Team 2</b></th>
	<th align="center"><b>Team 1</b></th>
	<th align="center"><b>Team 2</b></th>
</tr>
<?php
	$no=1;
	function getField($select,$field,$where,$tabel){
	    $ci = &get_instance();
	    $sql = $ci->db->where($where,$field)->get($tabel)->result();
	    foreach($sql as $row){
	        return $row->$select;
	    }
	}
	foreach($singles_game->result() as $row){
?>
<tr>
	<td align="center"><?php echo $no;?></td>
	<td align="center"><?php echo $row->player_single_1;?></td>
	<td align="center"><?php echo getField('country_name',$row->country_id1,'country_id','tbl_country')?></td>
	<td align="center"><?php echo $row->player_single_2;?></td>
	<td align="center"><?php echo getField('country_name',$row->country_id2,'country_id','tbl_country')?></td>
	<td align="center"><?php echo $row->umpire_name;?></td>
	<td align="center"><?php echo $row->subclass_name;?></td>
	<td align="center"><?php echo $row->shuttle_cock;?></td>
	<td align="center"><?php echo $row->order_of_play;?></td>
	<td><?php if($row->status=='0') {?>
		Belum Main
		<?php } if($row->status=='2'){ ?>
		Sudah Main
		<?php } if($row->status=='1'){?>
		Sedang Main
		<?php }?>
	</td>
	<td align="center"><?php echo $row->court_number;?></td>
	<td align="center">
		<?php
		$this->m_team->set_court_id($row->court_id);
		$team_id = array();
		$team = $this->m_team->get_team_by_court_id();
		$i = 1;
		foreach($team->result() as $rows) {
           	$team_id[$i] = $rows->team_id;
	        $i++;
        }
        
        $this->m_stage->set_team_id($team_id[1]);
        $this->m_stage->set_stage_number(1);
		$score = $this->m_stage->stage_check();
		if (count($score->result())>0) {
			foreach($score->result() as $score1) {
	           echo $score1->score;
	        }
		}else{
			echo "-";
		}
		?>
	</td>
	<td align="center">
		<?php
		$this->m_team->set_court_id($row->court_id);
		$team_id = array();
		$team = $this->m_team->get_team_by_court_id();
		$i = 1;
		foreach($team->result() as $rows) {
           	$team_id[$i] = $rows->team_id;
	        $i++;
        }
        
        $this->m_stage->set_team_id($team_id[2]);
        $this->m_stage->set_stage_number(1);
		$score = $this->m_stage->stage_check();
		if (count($score->result())>0) {
			foreach($score->result() as $score1) {
	           echo $score1->score;
	        }
		}else{
			echo "-";
		}
		?>
	</td>
	<td align="center">
		<?php
		$this->m_team->set_court_id($row->court_id);
		$team_id = array();
		$team = $this->m_team->get_team_by_court_id();
		$i = 1;
		foreach($team->result() as $rows) {
           	$team_id[$i] = $rows->team_id;
	        $i++;
        }
        
        $this->m_stage->set_team_id($team_id[1]);
        $this->m_stage->set_stage_number(2);
		$score = $this->m_stage->stage_check();
		if (count($score->result())>0) {
			foreach($score->result() as $score1) {
	           echo $score1->score;
	        }
		}else{
			echo "-";
		}
		?>
	</td>
	<td align="center">
		<?php
		$this->m_team->set_court_id($row->court_id);
		$team_id = array();
		$team = $this->m_team->get_team_by_court_id();
		$i = 1;
		foreach($team->result() as $rows) {
           	$team_id[$i] = $rows->team_id;
	        $i++;
        }
        
        $this->m_stage->set_team_id($team_id[2]);
        $this->m_stage->set_stage_number(2);
		$score = $this->m_stage->stage_check();
		if (count($score->result())>0) {
			foreach($score->result() as $score1) {
	           echo $score1->score;
	        }
		}else{
			echo "-";
		}
		?>
	</td>

	<td align="center">
		<?php
		$this->m_team->set_court_id($row->court_id);
		$team_id = array();
		$team = $this->m_team->get_team_by_court_id();
		$i = 1;
		foreach($team->result() as $rows) {
           	$team_id[$i] = $rows->team_id;
	        $i++;
        }
        
        $this->m_stage->set_team_id($team_id[1]);
        $this->m_stage->set_stage_number(3);
		$score = $this->m_stage->stage_check();
		if (count($score->result())>0) {
			foreach($score->result() as $score1) {
	           echo $score1->score;
	        }
		}else{
			echo "-";
		}
		?>
	</td>
	<td align="center">
		<?php
		$this->m_team->set_court_id($row->court_id);
		$team_id = array();
		$team = $this->m_team->get_team_by_court_id();
		$i = 1;
		foreach($team->result() as $rows) {
           	$team_id[$i] = $rows->team_id;
	        $i++;
        }
        
        $this->m_stage->set_team_id($team_id[2]);
        $this->m_stage->set_stage_number(3);
		$score = $this->m_stage->stage_check();
		if (count($score->result())>0) {
			foreach($score->result() as $score1) {
	           echo $score1->score;
	        }
		}else{
			echo "-";
		}
		?>
	</td>
</tr>
<?php
	$no++;
	}
?>
</table>
<br/>
<h3>Doubles</h2>
<table border="1">
<tr>
	<th rowspan="2" align="center"><b>No</b></th>
	<th rowspan="2" align="center"><b>Player 1a Name</b></th>
	<th rowspan="2" align="center"><b>Player 1b Name</b></th>
	<th rowspan="2" align="center"><b>Country Player 1</b></th>
	<th rowspan="2" align="center"><b>Player 2a Name</b></th>
	<th rowspan="2" align="center"><b>Player 2b Name</b></th>
	<th rowspan="2" align="center"><b>Country Player 2</b></th>
	<th rowspan="2" align="center"><b>Umpire</b></th>
	<th rowspan="2" align="center"><b>Subclass</b></th>
	<th rowspan="2" align="center"><b>Shuttle Cock</b></th>
	<th rowspan="2" align="center"><b>Main ke</b></th>
	<th rowspan="2" align="center"><b>Status</b></th>
	<th rowspan="2" align="center"><b>Court</b></th>
	<th align="center" colspan="2"><b>Score Game 1</b></th>
	<th align="center" colspan="2"><b>Score Game 2</b></th>
	<th align="center" colspan="2"><b>Score Game 3</b></th>
</tr>
<tr>
	<th align="center"><b>Team 1</b></th>
	<th align="center"><b>Team 2</b></th>
	<th align="center"><b>Team 1</b></th>
	<th align="center"><b>Team 2</b></th>
	<th align="center"><b>Team 1</b></th>
	<th align="center"><b>Team 2</b></th>
</tr>
<?php
	$no=1;
	foreach($doubles_game->result() as $row){
?>
<tr>
	<td align="center"><?php echo $no;?></td>
	<td align="center"><?php echo $row->player_name_1;?></td>
	<td align="center"><?php echo $row->player_name_2;?></td>
	<td align="center"><?php echo getField('country_name',$row->country_id1,'country_id','tbl_country')?></td>
	<td align="center"><?php echo $row->player_name_3;?></td>
	<td align="center"><?php echo $row->player_name_4;?></td>
	<td align="center"><?php echo getField('country_name',$row->country_id2,'country_id','tbl_country')?></td>
	<td align="center"><?php echo $row->umpire_name;?></td>
	<td align="center"><?php echo $row->subclass_name;?></td>
	<td align="center"><?php echo $row->shuttle_cock;?></td>
	<td align="center"><?php echo $row->order_of_play;?></td>
	<td><?php if($row->status=='0') {?>
		Belum Main
		<?php } if($row->status=='2'){ ?>
		Sudah Main
		<?php } if($row->status=='1'){?>
		Sedang Main
		<?php }?>
	</td>
	<td align="center"><?php echo $row->court_number;?></td>
	<td align="center">
		<?php
		$this->m_team->set_court_id($row->court_id);
		$team_id = array();
		$team = $this->m_team->get_team_by_court_id();
		$i = 1;
		foreach($team->result() as $rows) {
           	$team_id[$i] = $rows->team_id;
	        $i++;
        }
        
        $this->m_stage->set_team_id($team_id[1]);
        $this->m_stage->set_stage_number(1);
		$score = $this->m_stage->stage_check();
		if (count($score->result())>0) {
			foreach($score->result() as $score1) {
	           echo $score1->score;
	        }
		}else{
			echo "-";
		}
		?>
	</td>
	<td align="center">
		<?php
		$this->m_team->set_court_id($row->court_id);
		$team_id = array();
		$team = $this->m_team->get_team_by_court_id();
		$i = 1;
		foreach($team->result() as $rows) {
           	$team_id[$i] = $rows->team_id;
	        $i++;
        }
        
        $this->m_stage->set_team_id($team_id[2]);
        $this->m_stage->set_stage_number(1);
		$score = $this->m_stage->stage_check();
		if (count($score->result())>0) {
			foreach($score->result() as $score1) {
	           echo $score1->score;
	        }
		}else{
			echo "-";
		}
		?>
	</td>
	<td align="center">
		<?php
		$this->m_team->set_court_id($row->court_id);
		$team_id = array();
		$team = $this->m_team->get_team_by_court_id();
		$i = 1;
		foreach($team->result() as $rows) {
           	$team_id[$i] = $rows->team_id;
	        $i++;
        }
        
        $this->m_stage->set_team_id($team_id[1]);
        $this->m_stage->set_stage_number(2);
		$score = $this->m_stage->stage_check();
		if (count($score->result())>0) {
			foreach($score->result() as $score1) {
	           echo $score1->score;
	        }
		}else{
			echo "-";
		}
		?>
	</td>
	<td align="center">
		<?php
		$this->m_team->set_court_id($row->court_id);
		$team_id = array();
		$team = $this->m_team->get_team_by_court_id();
		$i = 1;
		foreach($team->result() as $rows) {
           	$team_id[$i] = $rows->team_id;
	        $i++;
        }
        
        $this->m_stage->set_team_id($team_id[2]);
        $this->m_stage->set_stage_number(2);
		$score = $this->m_stage->stage_check();
		if (count($score->result())>0) {
			foreach($score->result() as $score1) {
	           echo $score1->score;
	        }
		}else{
			echo "-";
		}
		?>
	</td>

	<td align="center">
		<?php
		$this->m_team->set_court_id($row->court_id);
		$team_id = array();
		$team = $this->m_team->get_team_by_court_id();
		$i = 1;
		foreach($team->result() as $rows) {
           	$team_id[$i] = $rows->team_id;
	        $i++;
        }
        
        $this->m_stage->set_team_id($team_id[1]);
        $this->m_stage->set_stage_number(3);
		$score = $this->m_stage->stage_check();
		if (count($score->result())>0) {
			foreach($score->result() as $score1) {
	           echo $score1->score;
	        }
		}else{
			echo "-";
		}
		?>
	</td>
	<td align="center">
		<?php
		$this->m_team->set_court_id($row->court_id);
		$team_id = array();
		$team = $this->m_team->get_team_by_court_id();
		$i = 1;
		foreach($team->result() as $rows) {
           	$team_id[$i] = $rows->team_id;
	        $i++;
        }
        
        $this->m_stage->set_team_id($team_id[2]);
        $this->m_stage->set_stage_number(3);
		$score = $this->m_stage->stage_check();
		if (count($score->result())>0) {
			foreach($score->result() as $score1) {
	           echo $score1->score;
	        }
		}else{
			echo "-";
		}
		?>
	</td>
</tr>
<?php
	$no++;
	}
?>
</table>