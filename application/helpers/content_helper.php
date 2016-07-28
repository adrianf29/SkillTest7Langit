<?php
		
function showDate($content){
    if($content){
        $angka = substr($content,5,2);
        switch ($angka) {
            case '01': $bln = 'Januari';break;
            case '02': $bln = 'Februari';break;
            case '03': $bln = 'Maret';break;
            case '04': $bln = 'April';break;
            case '05': $bln = 'Mei';break;
            case '06': $bln = 'Juni';break;
            case '07': $bln = 'Juli';break;
            case '08': $bln = 'Agustus';break;
            case '09': $bln = 'September';break;
            case '10': $bln = 'Oktober';break;
            case '11': $bln = 'November';break;
            case '12': $bln = 'Desember';break;
            default:break;
        }
        $tgl = substr($content,8,2);
        $tahun = substr($content,0,4);
        $jam = substr($content,11,5);
        return $tgl.'-'.$bln.'-'.$tahun.' '.$jam;
    }
}

function showDate2($content){
    if($content){
        $angka = substr($content,5,2);
        switch ($angka) {
            case '01': $bln = 'Januari';break;
            case '02': $bln = 'Februari';break;
            case '03': $bln = 'Maret';break;
            case '04': $bln = 'April';break;
            case '05': $bln = 'Mei';break;
            case '06': $bln = 'Juni';break;
            case '07': $bln = 'Juli';break;
            case '08': $bln = 'Agustus';break;
            case '09': $bln = 'September';break;
            case '10': $bln = 'Oktober';break;
            case '11': $bln = 'November';break;
            case '12': $bln = 'Desember';break;
            default:break;
        }
        $tgl = substr($content,8,2);
        $tahun = substr($content,0,4);
        $jam = substr($content,11,5);
        return $bln.'-'.$tahun.' '.$jam;
    }
}

function showBulan($content){
	$bln=0;
    switch ($content) {
        case '01': $bln = 'Januari';break;
        case '02': $bln = 'Februari';break;
        case '03': $bln = 'Maret';break;
        case '04': $bln = 'April';break;
        case '05': $bln = 'Mei';break;
        case '06': $bln = 'Juni';break;
        case '07': $bln = 'Juli';break;
        case '08': $bln = 'Agustus';break;
        case '09': $bln = 'September';break;
        case '10': $bln = 'Oktober';break;
        case '11': $bln = 'November';break;
        case '12': $bln = 'Desember';break;
        default:break;
    }
    return $bln;
}

function showDatePicker($content){
    $tgl = substr($content,8,2);
    $bln = substr($content,5,2);
    $thn = substr($content,0,4);
    return $bln.'/'.$tgl.'/'.$thn;
}

function getField($select,$field,$where,$tabel){
    $ci = &get_instance();
    $sql = $ci->db->where($where,$field)->get($tabel)->result();
    foreach($sql as $row){
        return $row->$select;
    }
}

function getStatusPraRegistrasi($select,$field,$where,$tabel){
	 $ci = &get_instance();
    $sql = $ci->db->where($where,$field)->get($tabel)->result();
    foreach($sql as $row){
        return $row->$select;
    }
}

function getStatusTarikTunai($select,$field,$where,$tabel){
	 $ci = &get_instance();
    $sql = $ci->db->where($where,$field)->get($tabel)->result();
    foreach($sql as $row){
        return $row->$select;
    }
}

function getStatusPayment($user_id,$no_cicilan,$tahun,$tgl_aktif,$bln){
    $ci = &get_instance();
    $d1 = new DateTime($tgl_aktif);
    $d1->add(new DateInterval('P1M'));
    $tgl = substr($d1->format('Y-m-d'),8,2);
    $bln1 = substr($d1->format('Y-m-d'),5,2);
    $bln_jth_tempo = $bln + $bln1 - 1;
//    if($bln_jth_tempo == 13){
//        #$tahun = $tahun + 1;
//        $no_cicilan = $no_cicilan - 12;
//    }
    if($bln_jth_tempo > 12){
        $bln_jth_tempo = $bln_jth_tempo - 12;
        $no_cicilan = $no_cicilan - 12;
    }
    if($tahun==1){
        $no_urut = $no_cicilan;
    } elseif($tahun==2) {
        $no_urut = $no_cicilan + 12;
    } elseif($tahun==3) {
        $no_urut = $no_cicilan + 24;
    } elseif($tahun==4) {
        $no_urut = $no_cicilan + 36;
    } else {
        $no_urut = $no_cicilan + 48;
    }
    $tgl_jatuh_tempo = (substr($tgl_aktif,0,4)+$tahun-1).'-'.str_pad($bln_jth_tempo, 2, '0', STR_PAD_LEFT).'-'.$tgl;
    $cek = $ci->db->where('user_id',$user_id)->where('payment_no',$no_urut)->get('user_payment')->row();
	
	
    //$a=$cek->user_payment_id;
			//print_r($tgl_jatuh_tempo);
			
            //$kode = $sql->user_payment_id;
	if($cek){
        if($cek->payment_status=='Done'){
            return '<span style="color:green">Lunas </span>'.showDate($cek->payment_postdate);
        } else {
            return '<span style="color:purple">Menunggu approval Admin</span>';
        }
    } else {
		//echo date('Y-m-d');
				//$ci = &get_instance();
        $ci->load->library('parser');
        $config['protocol'] = 'sendmail';
        $config['smtp_host'] = "mail.klpind.co.id";
        $config['smtp_user'] = "noreply@klpind.co.id";
        $config['smtp_pass'] = "test123";
        $config['smtp_port'] = "26";
        $config['charset'] = 'utf-8';
        $config['wordwrap'] = TRUE;
        $config['mailtype'] = 'html';
        $config['mailpath'] = '/usr/sbin/sendmail';
        $ci->load->library('email',$config);
		
		$test3 =  date('Y-m-d', strtotime($tgl_jatuh_tempo . ' -3 day'));
		$test4 =  date('Y-m-d', strtotime($tgl_jatuh_tempo . ' +15 day'));
			//print_r($test4);
		$sql = $ci->db->where('user.user_id',$user_id)->from('user_profile')->join('user','user.user_id=user_profile.user_id')->get()->row();
					//print_r($tgl.'<br>'.$test3);die;
					if($test3==date('Y-m-d')){
						
						//print_r($test3);
						//$ci = &get_instance();
							
					$ci->email->set_mailtype("html");
					$ci->email->from("noreply@enorme-premiera.com", 'KLPI');
					$ci->email->to('adrian.ferisandi@gmail.com');
					//$this->email->to($sql->username);
					$ci->email->cc('info@klpi.co.id'); 
					$ci->email->subject("Reminder Jatuh Tempo");
					$isi_email = array(
						'user_fullname' => getField('user_fullname', $sql->user_id, 'user_id', 'user_profile'),
						'periode'   => $no_urut,
						'no_invoice'=> 'INV/'.$user_id.'/'.$no_urut,
						'tanggal_jatuh_tempo'   => $tgl_jatuh_tempo
					);
					$body = $ci->parser->parse('email/email-H-3.php',$isi_email,TRUE);
					$ci->email->message($body);
					$ci->email->send();
					}
					
					if($test4>=date('Y-m-d')){
						
					
						//$ci = &get_instance();
							
					$ci->email->set_mailtype("html");
					$ci->email->from("noreply@enorme-premiera.com", 'KLPI');
					$ci->email->to('adrian.ferisandi@gmail.com');
					//$this->email->to($sql->username);
					$ci->email->cc('info@klpi.co.id'); 
					$ci->email->subject("Premi Lapsed");
					$isi_email = array(
						'user_fullname' => getField('user_fullname', $sql->user_id, 'user_id', 'user_profile'),
						'periode'   => $no_urut,
						'tanggal_jatuh_tempo'   => $tgl_jatuh_tempo,
						'no_invoice'=> 'INV/'.$user_id.'/'.$no_urut
					);
					$body = $ci->parser->parse('email/email-lapsed.php',$isi_email,TRUE);
					$ci->email->message($body);
					$ci->email->send();
					
					$update = array(
					'status' => '0' 
					);
					$ci->db->where('user_id',$user_id)->update('user',$update);
					}
		//$test= date('Y-m-d', strtotime($tgl_jatuh_tempo . ' +1 day'));
		//print_r($tgl_jatuh_tempo.'<br>'.date('Y-m-d'));
        if($tgl_jatuh_tempo <= date('Y-m-d')){
					
					
					
			//print_r($no_urut);
			//print_r($no_urut);
			/*$insert = array(
                'payment_no'   => $no_urut,
                'payment_jatuh_tempo'   => $tgl_jatuh_tempo,
                'user_id'   => $user_id,
				'payment_confirm_date'  => ''
            );
            $ci->db->on_duplicate('user_lapsed', array('payment_no' => $no_urut, 'payment_jatuh_tempo' => $tgl_jatuh_tempo , 'user_id' => $user_id ))->insert('user_lapsed',$insert);
			*/
			$cek = $ci->db->where('user_id',$user_id)->where('payment_no',$no_urut)->where('payment_jatuh_tempo',$tgl_jatuh_tempo)->get('user_lapsed')->row();
			//$s = $cek->test;
			//print_r($s);
			if($cek){
				
			}else{
			$ci->db->query("INSERT INTO user_lapsed (payment_no, payment_jatuh_tempo, user_id,payment_confirm_date,payment_status,user_payment_id,payment_approved_by) VALUES ('".$no_urut."', '".$tgl_jatuh_tempo."', '".$user_id."','','Lapsed','0','0')");
			}
			//$sql = $ci->db->where('user_id',$user_id)->where('payment_no',$no_urut)->get('user_payment')->row();
			//print_r($result);
			//$kode = $sql->user_payment_id;
            //return $kode;
			return '<span style="color:red">Tagihan Jatuh Tempo</span><br><a href="'.site_url('invoice/bayar/'.$user_id.'/'.$no_urut).'">Bayar</a>';
        } else {
//            return '<span><a href="'.site_url('invoice/index/'.$user_id.'/'.$no_urut).'" target="_blank">Download Invoice</a><br>Batas Bayar '.showDate($tgl_jatuh_tempo).'</span>';
            return '<a href="'.site_url('invoice/bayar/'.$user_id.'/'.$no_urut).'"><span class="label label-success">Bayar</span></a><br>Batas Bayar '.showDate($tgl_jatuh_tempo).'';
        }
    }
}


function getStatusPaymentt($user_id,$no_cicilan,$tahun,$tgl_aktif,$bln){
    $ci = &get_instance();
    $d1 = new DateTime($tgl_aktif);
    $d1->add(new DateInterval('P1M'));
    $tgl = substr($d1->format('Y-m-d'),8,2);
    $bln1 = substr($d1->format('Y-m-d'),5,2);
    $bln_jth_tempo = $bln + $bln1 - 1;
//    if($bln_jth_tempo == 13){
//        #$tahun = $tahun + 1;
//        $no_cicilan = $no_cicilan - 12;
//    }
    if($bln_jth_tempo > 12){
        $bln_jth_tempo = $bln_jth_tempo - 12;
        $no_cicilan = $no_cicilan - 12;
    }
    if($tahun==1){
        $no_urut = $no_cicilan;
    } elseif($tahun==2) {
        $no_urut = $no_cicilan + 12;
    } elseif($tahun==3) {
        $no_urut = $no_cicilan + 24;
    } elseif($tahun==4) {
        $no_urut = $no_cicilan + 36;
    } else {
        $no_urut = $no_cicilan + 48;
    }
    $tgl_jatuh_tempo = (substr($tgl_aktif,0,4)+$tahun-1).'-'.str_pad($bln_jth_tempo, 2, '0', STR_PAD_LEFT).'-'.$tgl;
    $cek = $ci->db->where('user_id',$user_id)->where('payment_no',$no_urut)->get('user_payment')->row();
	
	
    //$a=$cek->user_payment_id;
			//print_r($tgl_jatuh_tempo);
			
            //$kode = $sql->user_payment_id;
	if($cek){
        if($cek->payment_status=='Done'){
            return '<span style="color:green">Lunas </span>'.showDate($cek->payment_postdate);
        } else {
            return '<span style="color:purple">Menunggu approval Admin</span>';
        }
    } else {
		//echo date('Y-m-d');
				//$ci = &get_instance();
        /*$ci->load->library('parser');
        $config['protocol'] = 'sendmail';
        $config['smtp_host'] = "mail.klpind.co.id";
        $config['smtp_user'] = "noreply@klpind.co.id";
        $config['smtp_pass'] = "test123";
        $config['smtp_port'] = "26";
        $config['charset'] = 'utf-8';
        $config['wordwrap'] = TRUE;
        $config['mailtype'] = 'html';
        $config['mailpath'] = '/usr/sbin/sendmail';
        $ci->load->library('email',$config);
		
		$test3 =  date('Y-m-d', strtotime($tgl_jatuh_tempo . ' -3 day'));
			
					//print_r($tgl.'<br>'.$test3);die;
					if($test3<=date('Y-m-d')){
						
						print_r($test3);
						//$ci = &get_instance();
							
					$ci->email->set_mailtype("html");
					$ci->email->from("noreply@enorme-premiera.com", 'KLPI');
					$ci->email->to('adrian.ferisandi@gmail.com');
					//$this->email->to($sql->username);
					$ci->email->cc('info@klpi.co.id'); 
					$ci->email->subject("Konfirmasi Pembayaran KLPI");
					$isi_email = array(
						'user_fullname' => 'test',
						'periode'   => '123',
						'no_invoice'=> 'INV'
					);
					$body = $ci->parser->parse('email/email-pembayaran.php',$isi_email,TRUE);
					$ci->email->message($body);
					$ci->email->send();
					}*/
		//$test= date('Y-m-d', strtotime($tgl_jatuh_tempo . ' +1 day'));
		//print_r($tgl_jatuh_tempo.'<br>'.date('Y-m-d'));
        if($tgl_jatuh_tempo <= date('Y-m-d')){
					
					
					
			//print_r($no_urut);
			//print_r($no_urut);
			/*$insert = array(
                'payment_no'   => $no_urut,
                'payment_jatuh_tempo'   => $tgl_jatuh_tempo,
                'user_id'   => $user_id,
				'payment_confirm_date'  => ''
            );
            $ci->db->on_duplicate('user_lapsed', array('payment_no' => $no_urut, 'payment_jatuh_tempo' => $tgl_jatuh_tempo , 'user_id' => $user_id ))->insert('user_lapsed',$insert);
			*/
			$cek = $ci->db->where('user_id',$user_id)->where('payment_no',$no_urut)->where('payment_jatuh_tempo',$tgl_jatuh_tempo)->get('user_lapsed')->row();
			//$s = $cek->test;
			//print_r($s);
			if($cek){
				
			}else{
			$ci->db->query("INSERT INTO user_lapsed (payment_no, payment_jatuh_tempo, user_id,payment_confirm_date,payment_status,user_payment_id,payment_approved_by) VALUES ('".$no_urut."', '".$tgl_jatuh_tempo."', '".$user_id."','','Lapsed','0','0')");
			}
			//$sql = $ci->db->where('user_id',$user_id)->where('payment_no',$no_urut)->get('user_payment')->row();
			//print_r($result);
			//$kode = $sql->user_payment_id;
            //return $kode;
			return '<span style="color:red">Tagihan Jatuh Tempo</span><br><a href="'.site_url('invoice/bayar/'.$user_id.'/'.$no_urut).'">Bayar</a>';
        } else {
//            return '<span><a href="'.site_url('invoice/index/'.$user_id.'/'.$no_urut).'" target="_blank">Download Invoice</a><br>Batas Bayar '.showDate($tgl_jatuh_tempo).'</span>';
            return '<a href="'.site_url('invoice/bayar/'.$user_id.'/'.$no_urut).'"><span class="label label-success">Bayar</span></a><br>Batas Bayar '.showDate($tgl_jatuh_tempo).'';
        }
    }
}



function getStatusPayment2($user_id,$no_cicilan,$tahun,$tgl_aktif,$bln){
$ci = &get_instance();
    $d1 = new DateTime($tgl_aktif);
    $d1->add(new DateInterval('P1M'));
    $tgl = substr($d1->format('Y-m-d'),8,2);
    $bln1 = substr($d1->format('Y-m-d'),5,2);
    $bln_jth_tempo = $bln + $bln1 - 1;
//    if($bln_jth_tempo == 13){
//        #$tahun = $tahun + 1;
//        $no_cicilan = $no_cicilan - 12;
//    }
    if($bln_jth_tempo > 12){
        $bln_jth_tempo = $bln_jth_tempo - 12;
        $no_cicilan = $no_cicilan - 12;
    }
    if($tahun==1){
        $no_urut = $no_cicilan;
    } elseif($tahun==2) {
        $no_urut = $no_cicilan + 12;
    } elseif($tahun==3) {
        $no_urut = $no_cicilan + 24;
    } elseif($tahun==4) {
        $no_urut = $no_cicilan + 36;
    } else {
        $no_urut = $no_cicilan + 48;
    }
    $tgl_jatuh_tempo = (substr($tgl_aktif,0,4)+$tahun-1).'-'.str_pad($bln_jth_tempo, 2, '0', STR_PAD_LEFT).'-'.$tgl;
    $cek = $ci->db->where('user_id',$user_id)->where('payment_no',$no_urut)->get('user_payment')->row();
    if($cek){
       
    } else {
        if($tgl_jatuh_tempo <= date('Y-m-d')){
            return $tgl_jatuh_tempo;
        } 
    }   
}


function getLastPremi($user_id,$status){
    $ci = &get_instance();
    $sql = $ci->db->where('user_id',$user_id)->get('user_profile')->row();
    $tipe_periode = $sql->user_type_payment;
    $now = new DateTime(date('Y-m-d H:i:s'));
    $active_date = new DateTime($sql->user_activedate);
    $diff = $now->diff($active_date);
    if($tipe_periode=='Bulanan'){
        $lastperiodepremi = $diff->m;
    } else if($tipe_periode=='Tahunan'){
        $lastperiodepremi = $diff->y;
    } else {
        $lastperiodepremi = 1;
    }
    if($lastperiodepremi == 0){ $lastperiodepremi = 1; }
    $payment = $ci->db->where('user_id',$user_id)->where('payment_status','Done')->get('user_payment')->result();
    $jml_payment = count($payment);
    if($jml_payment > $lastperiodepremi){
        $lastperiodepremi = $jml_payment;
        $cek_payment = $ci->db->where('user_id',$user_id)->where('payment_no',$jml_payment)->get('user_payment')->row();
    } else {
        $cek_payment = $ci->db->where('user_id',$user_id)->where('payment_no',$lastperiodepremi)->get('user_payment')->row();
    }
    if($status=='payment'){
        if($cek_payment){

           return 'LUNAS tanggal '.substr(showDate($cek_payment->payment_postdate),0,-5);
        } else {
            return 'BELUM LUNAS';
        }
    }
    if($status=='periode'){
        return $lastperiodepremi+1; 
    }
	
	 if($status=='last'){
        return $jml_payment;
    }
}

function getLastPremii($user_id,$status){
    $ci = &get_instance();
    $sql = $ci->db->where('user_id',$user_id)->get('user_profile')->row();
    $tipe_periode = $sql->user_type_payment;
    $now = new DateTime(date('Y-m-d H:i:s'));
    $active_date = new DateTime($sql->user_activedate);
    $diff = $now->diff($active_date);
    if($tipe_periode=='Bulanan'){
        $lastperiodepremi = $diff->m;
		 $lastperiodepremii = $diff->m;
    } else if($tipe_periode=='Tahunan'){
        $lastperiodepremi = $diff->y;
		$lastperiodepremii = $diff->y;
	} else {
        $lastperiodepremi = 1;
		$lastperiodepremii = 1;
    }
    if($lastperiodepremi == 0 && $lastperiodepremii == 0){ $lastperiodepremi = 1; $lastperiodepremii = 1; }
    $payment = $ci->db->where('user_id',$user_id)->where('payment_status','Done')->get('user_payment')->result();
    $jml_payment = count($payment);
	$payment_lapsed = $ci->db->where('user_id',$user_id)->where('payment_status','Lapsed')->get('user_lapsed')->result();
    $jml_payment_lapsed = count($payment_lapsed);
	//print_r($jml_payment_lapsed);
	$cek_lapsed = $ci->db->where('user_id',$user_id)->where('payment_no',$jml_payment_lapsed)->get('user_lapsed')->row();
	//print_r($lastperiodepremii);die;
    if($jml_payment > $lastperiodepremi || $jml_payment_lapsed > $lastperiodepremii ){
        $lastperiodepremi = $jml_payment;
		$lastperiodepremii = $jml_payment_lapsed;
        $cek_payment = $ci->db->where('user_id',$user_id)->where('payment_no',$jml_payment)->get('user_payment')->row();
		//$cek_payment_lapsed = $ci->db->where('user_id',$user_id)->get('user_lapsed')->row();
	} else {
        $cek_payment = $ci->db->where('user_id',$user_id)->where('payment_no',$lastperiodepremi)->get('user_payment')->row();
		//$cek_payment_lapsed = $ci->db->where('user_id',$user_id)->get('user_lapsed')->row();
    }
	
		$cek_payment_lapsed = $ci->db->where('user_id',$user_id)->where('payment_confirm_date','0000-00-00 00:00:00')->get('user_lapsed');
	//$a = $cek_payment_lapsed->payment_status;
	//print_r($cek_payment_lapsed);
	
	
		
	if($status=='payment'){
		
		//$result= $this->db->get('pulsa');
		$cek_payment_lapsed2 = $ci->db->where('user_id',$user_id)->where('payment_confirm_date','0000-00-00 00:00:00')->from('user_lapsed')->get()->result();
		if($cek_payment_lapsed->num_rows() > 0){
			//return '<font color="green">Masih ada</font>';
			foreach($cek_payment_lapsed2 as $row){
			$exist = $ci->db->select("EXISTS(SELECT * FROM user_lapsed where user_id='".$user_id."') as test")->get()->result();
			//$query = $ci->db->query("SELECT EXISTS(SELECT * FROM user_lapsed WHERE user_id='".$user_id."')");
			//$a = $query->row();
			$a=$row->payment_confirm_date;
				$b2 =$row->payment_status;
				//print_r($a.'<br>'.$b2);
				if($a=='0000-00-00 00:00:00'){
						if($b2=='Lapsed'){
						if($cek_payment_lapsed){
							
							$tgl=$row->payment_jatuh_tempo;
							$test= date('Y-m-d H:i:s', strtotime($tgl . ' +1 day'));
							$test2= date('Y-m-d H:i:s', strtotime($tgl . ' +15 day'));
							//print_r($tgl.'<br>'.$test2);
							//print_r($tgl.''.$test);
							if($test < date('Y-m-d')){
								 if($test2 < date('Y-m-d')){
									 /*$update = array(
									 'status' => '0' 
									 );
									 $ci->db->where('user_id',$user_id)->update('user',$update);
									*/
									return '<font color="red">LAPSED</font>';
								}
								else{
								 return '<font color="red">TAGIHAN JATUH TEMPO</font>';
								}
							}
							
					 
						} 
					}
				}
		}
		}
		
		else
		{
			 return '<font color="green">Login first/No lapsed</font>';
		}
		
		
				//else{
								
					//		}
			//$b = $exist[0]->test;
			/*if($b!=0){
				$exist2 = $ci->db->select("payment_status as status,payment_confirm_date as datee FROM user_lapsed where user_id='".$user_id."'")->get()->result();
		
				//$b2 = $exist2[0]->status;
				
				if($a=='0000-00-00 00:00:00'){
						if($b2=='Lapsed'){
						if($cek_payment_lapsed){
							
							$tgl=$row->payment_jatuh_tempo;
							$test= date('Y-m-d H:i:s', strtotime($tgl . ' +1 day'));
							$test2= date('Y-m-d H:i:s', strtotime($tgl . ' +15 day'));
							
							//print_r($tgl.''.$test);
							if($test < date('Y-m-d')){
								 if($test2 < date('Y-m-d')){
									return '<font color="red">LAPSED</font>';
								}
								else{
								 return '<font color="red">TAGIHAN JATUH TEMPO</font>';
								}
							}
							
					 
						} 
					}
				}
				else{
					return 'LUNAS tanggal '.substr(showDate($row->payment_confirm_date),0,-5);	
				}
				
			}
			else{
			 return '<font color="green">Login first/No lapsed</font>';

			}
			*/
		
		
		//$exist = $ci->db->select("EXISTS(SELECT * FROM user_lapsed where user_id='".$user_id."') as test")->get()->result();
		//$query = $ci->db->query("SELECT EXISTS(SELECT * FROM user_lapsed WHERE user_id='".$user_id."')");
		//$a = $query->row();
		//$b = $exist[0]->test;
		
		
		
		//$a->
		//print_r($b);die;
		/*if($b!=0){
			
			$exist2 = $ci->db->select("payment_status as status,payment_confirm_date as datee FROM user_lapsed where user_id='".$user_id."'")->get()->result();
		
			$b2 = $exist2[0]->status;
			//$b3 = $exist2[1]->datee;
			//print_r($b3);
			if($b2=='Lapsed'){
				if($cek_payment_lapsed){
					
					$tgl=$cek_payment_lapsed->payment_jatuh_tempo;
					$test= date('Y-m-d H:i:s', strtotime($tgl . ' +1 day'));
					$test2= date('Y-m-d H:i:s', strtotime($tgl . ' +15 day'));
					
					//print_r($tgl.''.$test);
					if($test < date('Y-m-d')){
						 if($test2 < date('Y-m-d')){
							return '<font color="red">LAPSED</font>';
						}
						else{
						 return '<font color="red">TAGIHAN JATUH TEMPO</font>';
						}
					}
					
			 
				} 
			}
			else{
				
				return 'LUNAS tanggal '.substr(showDate($cek_payment_lapsed->payment_confirm_date),0,-5);
			}
			/*if($a!='Lunas'){
				
				if($cek_payment_lapsed){
				
				$tgl=$cek_payment_lapsed->payment_jatuh_tempo;
				$test= date('Y-m-d H:i:s', strtotime($tgl . ' +1 day'));
				$test2= date('Y-m-d H:i:s', strtotime($tgl . ' +15 day'));
				//print_r($tgl.''.$test);
				if($test < date('Y-m-d')){
					 if($test2 < date('Y-m-d')){
						return '<font color="red">LAPSED</font>';
					}
					else{
					 return '<font color="red">TAGIHAN JATUH TEMPO</font>';
					}
				}
			 
			} 
			}else{
				return 'LUNAS tanggal '.substr(showDate($cek_payment->payment_postdate),0,-5);
			}*/
			/*if($cek_payment_lapsed){
				
				$tgl=$cek_payment_lapsed->payment_jatuh_tempo;
				$test= date('Y-m-d H:i:s', strtotime($tgl . ' +1 day'));
				$test2= date('Y-m-d H:i:s', strtotime($tgl . ' +15 day'));
				//print_r($tgl.''.$test);
				if($test < date('Y-m-d')){
					 if($test2 < date('Y-m-d')){
						return '<font color="red">LAPSED</font>';
					}
					else{
					 return '<font color="red">TAGIHAN JATUH TEMPO</font>';
					}
				}
			 
			} else{
				 return 'LUNAS tanggal '.substr(showDate($cek_payment->payment_postdate),0,-5);
				
			}
		}
		else{
			 return '<font color="green">Login first/No lapsed</font>';

		}*/
    }
	
    /*if($status=='payment'){
        if($cek_payment){

           return 'LUNAS tanggal '.substr(showDate($cek_payment->payment_postdate),0,-5);
        } else if($cek_payment_lapsed){
            return 'TAGIHAN JATUH TEMPO';
        }
    }*/
    if($status=='periode'){
        return $lastperiodepremi+1; 
    }
	
	 if($status=='last'){
        return $jml_payment;
    }
}

function getLastPremi3($user_id,$status,$bulan,$tahun){
    $ci = &get_instance();
    $sql = $ci->db->where('user_id',$user_id)->get('user_profile')->row();
    
	$tipe_periode = $sql->user_type_payment;
    $now = new DateTime(date('Y-m-d H:i:s'));
    $active_date = new DateTime($sql->user_activedate);
    $diff = $now->diff($active_date);
    if($tipe_periode=='Bulanan'){
        $lastperiodepremi = $diff->m;
    } else if($tipe_periode=='Tahunan'){
        $lastperiodepremi = $diff->y;
    } else {
        $lastperiodepremi = 1;
    }
    if($lastperiodepremi == 0){ $lastperiodepremi = 1; }
    $payment = $ci->db->where('user_id',$user_id)->where('payment_status','Done')->get('user_payment')->result();
    $jml_payment = count($payment);
    if($jml_payment > $lastperiodepremi){
        $lastperiodepremi = $jml_payment;
        $cek_payment = $ci->db->where('user_id',$user_id)->where('payment_no',$jml_payment)->get('user_payment')->row();
    } else {
        $cek_payment = $ci->db->where('user_id',$user_id)->where('payment_no',$lastperiodepremi)->get('user_payment')->row();
    }
    if($status=='payment'){
        if($cek_payment){
			$hasil = array();
			$sql = $ci->db->where('user_id',$user_id)->get('user_profile')->row();
            $kode = $sql->user_kode;
			$user = $sql->user_id;
			//print_r($user);
			$hasil = $ci->db->where('Year(payment_postdate)',$tahun)->where('Month(payment_postdate)',$bulan)->where('user_id',$user)->get('user_payment')->result();
			foreach($hasil as $row){
				
           return 'LUNAS tanggal '.substr(showDate($row->payment_postdate),0,-5);
			}
           //return 'LUNAS tanggal '.substr(showDate($hasil[8]->payment_postdate),0,-5);
        } else {
            return 'BELUM LUNAS';
        }
    }
    if($status=='periode'){
        return $lastperiodepremi+1;
    }
}

function getLastPremi2($user_id,$status){
    $ci = &get_instance();
    $sql = $ci->db->where('user_id',$user_id)->get('user_profile')->row();
    $tipe_periode = $sql->user_type_payment;
    $now = new DateTime(date('Y-m-d H:i:s'));
    $active_date = new DateTime($sql->user_activedate);
    $diff = $now->diff($active_date);
    if($tipe_periode=='Bulanan'){
        $lastperiodepremi = $diff->m;
    } else if($tipe_periode=='Tahunan'){
        $lastperiodepremi = $diff->y;
    } else {
        $lastperiodepremi = 1;
    }
    if($lastperiodepremi == 0){ $lastperiodepremi = 1; }
    $payment = $ci->db->where('user_id',$user_id)->where('payment_status','Done')->get('user_payment')->result();
    $jml_payment = count($payment);
    if($jml_payment > $lastperiodepremi){
        $lastperiodepremi = $jml_payment;
        $cek_payment = $ci->db->where('user_id',$user_id)->where('payment_no',$jml_payment)->get('user_payment')->row();
    } else {
        $cek_payment = $ci->db->where('user_id',$user_id)->where('payment_no',$lastperiodepremi)->get('user_payment')->row();
    }
    if($status=='payment'){
       
			

			$a = $ci->db->select('*')->where('user_id',$user_id)->order_by('user_payment_id','desc')->limit(1)->get('user_payment')->row('payment_postdate');
			$b = $ci->db->select('*')->where('user_id',$user_id)->order_by('user_id','desc')->limit(1)->get('user_profile')->row('user_activedate');
			$e = substr($b,8,3);
			//$date = strtotime(date('Y-m-d H:i:s', strtotime($a)) . "+1 months");
			//$myDate = date("Y-m-$e", strtotime( date( "Y-m-d", strtotime($a ) ) . "+1 month" ));
			//$myDate = date("Y-m-d", strtotime( date( "Y-m-d", strtotime( date("Y-m-d") ) ) . "+1 month" ));
			//print_r($myDate);die;

           return showDate($a);
        
    }
    if($status=='periode'){
        return $lastperiodepremi+1;
    }
	if($status=='month'){
			$a = $ci->db->select('*')->where('user_id',$user_id)->order_by('user_payment_id','desc')->limit(1)->get('user_payment')->row('payment_postdate');
			$b = $ci->db->select('*')->where('user_id',$user_id)->order_by('user_id','desc')->limit(1)->get('user_profile')->row('user_activedate');
			$e = substr($b,8,3);
			
			//$myDate = date("Y-m-$e", strtotime( date( "Y-m-d", strtotime($a ) ) . "+1 month" ));
			//$date = strtotime(date('Y-m-d H:i:s', strtotime($a)) . "+1 months");
       $angka = substr($a,5,2);
	   return showBulan($angka);
    }
	if($status=='year'){
			$a = $ci->db->select('*')->where('user_id',$user_id)->order_by('user_payment_id','desc')->limit(1)->get('user_payment')->row('payment_postdate');
			$b = $ci->db->select('*')->where('user_id',$user_id)->order_by('user_id','desc')->limit(1)->get('user_profile')->row('user_activedate');
			$e = substr($b,8,3);
			
			//$myDate = date("Y-m-$e", strtotime( date( "Y-m-d", strtotime($a ) ) . "+1 month" ));
			//$date = strtotime(date('Y-m-d H:i:s', strtotime($a)) . "+1 months");
       $angka = substr($a,0,4);
	   return $angka;
    }
	if($status=='status'){
        if($cek_payment){

           return 'LUNAS tanggal '.substr(showDate($cek_payment->payment_postdate),0,-5);
        } else {
            return '<font color="red">BELUM LUNAS</font>';
        }
    }
	
	 if($status=='jatuh_tempo'){
        return $lastperiodepremi;
    }
	
}

function getLevelPrivilege($user_id,$menu){
    $ci = &get_instance();
    $cek = $ci->db->where('user_id',$user_id)->get('user')->row();
    if($cek->level=='User'){
        return FALSE;
    } else {
        $sql = $ci->db->where('user_id',$user_id)->get('user_privileges')->row();
        return $sql->$menu=='1' ? TRUE : FALSE;
    }
}

function countBonus($user_id,$from,$to,$level){
    $ci = &get_instance();
	$total2=1;
    $premi = $ci->db->where('user_id',$user_id)->get('user_profile')->row();
    $bonus = $ci->db->where('user_id',$user_id)->where('payment_status','Done')->where('DATE(payment_postdate) <=',$to)->where('DATE(payment_postdate) >=',$from)->get('user_payment')->result();
    $cek = $ci->db->where('user_id',$user_id)->get('user_profile')->row();
	$a = $ci->db->where('user_id',$user_id)->where('payment_status','Done')->where('DATE(payment_postdate) <=',$to)->where('DATE(payment_postdate) >=',$from)->get('user_payment')->result();
	$b =  $cek->user_type_payment;
	$totals= count($a);
	
	if($b=='Tahunan' && $a){
		$total2=12;
	}
	
	if($b=='All Payment' && $a){
		$total2=24;
	}
	
	
	$total = count($bonus);
	//print_r($bonus);die;
	//print_r($totals);
	//$s = $premi->user_premi;
	//print_r($total);
    switch ($level) {
        case '1':$persen = 0.25;break;
        case '2':$persen = 0.025;break;
        case '3':$persen = 0.0125;break;
        case '4':$persen = 0.005;break;
        default:$persen = 0;break;
    }
    if($total > 24){
        $total = 0;
    }	
	if($totals>24){
		$total2=0;
	}
	return  $total2 * $total * $persen * $premi->user_premi;
	
    
}


function countBonus2($user_id,$tahun,$bulan,$level){
    $ci = &get_instance();
	//$hasil = $ci->db->where('Year(payment_postdate)',$tahun)->where('Month(payment_postdate)',$bulan)->where('user_id',$user)->get('user_payment')->result();
    $premi = $ci->db->where('user_id',$user_id)->get('user_profile')->row();
    $bonus = $ci->db->where('user_id',$user_id)->where('payment_status','Done')->where('Year(payment_postdate) <=',$tahun)->where('Month(payment_postdate) >=',$bulan)->get('user_payment')->result();
    $total = count($bonus);
    switch ($level) {
        case '1':$persen = 0.25;break;
        case '2':$persen = 0.025;break;
        case '3':$persen = 0.0125;break;
        case '4':$persen = 0.005;break;
        default:$persen = 0;break;
    }
    if($total > 12){
        $total = 12;
    }
     return $total * $persen * $premi->user_premi;
}

function countBonusKe($user_id,$tahun,$bulan,$level){
    $ci = &get_instance();
	//$hasil = $ci->db->where('Year(payment_postdate)',$tahun)->where('Month(payment_postdate)',$bulan)->where('user_id',$user)->get('user_payment')->result();
    $premi = $ci->db->where('user_id',$user_id)->get('user_profile')->row();
    $hasil = $ci->db->where('user_id',$user_id)->where('payment_status','Done')->where('Year(payment_postdate) <=',$tahun)->where('Month(payment_postdate) >=',$bulan)->get('user_payment')->result();
    $total = count($hasil);
    switch ($level) {
        case '1':$persen = 0.25;break;
        case '2':$persen = 0.025;break;
        case '3':$persen = 0.0125;break;
        case '4':$persen = 0.005;break;
        default:$persen = 0;break;
    }
    if($total > 12){
       // $total = 12;
    }
    return $total;
}


function countBonusKe2($user_id,$from,$to,$level){
    $ci = &get_instance();
	//$hasil = $ci->db->where('Year(payment_postdate)',$tahun)->where('Month(payment_postdate)',$bulan)->where('user_id',$user)->get('user_payment')->result();
    $premi = $ci->db->where('user_id',$user_id)->get('user_profile')->row();
    $hasil = $ci->db->where('user_id',$user_id)->where('payment_status','Done')->where('payment_postdate <=',$to)->where('payment_postdate >=',$from)->get('user_payment')->result();
    $total = count($hasil);
	//print_r($total);
    $cek = $ci->db->where('user_id',$user_id)->get('user_profile')->row();
	$a = $ci->db->where('user_id',$user_id)->where('payment_status','Done')->where('DATE(payment_postdate) <=',$to)->where('DATE(payment_postdate) >=',$from)->get('user_payment')->result();
	$b =  $cek->user_type_payment;
	$s = count($a);
	//print_r($s);
	if($b=='Tahunan' && $a){
		//$s =12;
	}
	
	if($b=='All Payment' && $a){
		$s=24;
	}
	switch ($level) {
        case '1':$persen = 0.25;break;
        case '2':$persen = 0.025;break;
        case '3':$persen = 0.0125;break;
        case '4':$persen = 0.005;break;
        default:$persen = 0;break;
    }
    if($s > 12 ){
        $s;
    }
    return $s;
}


function jumlahBonus($user_id,$from,$to,$level){
    $ci = &get_instance();
    $bonus = $ci->db->where('user_id',$user_id)->where('payment_status','Done')->where('payment_postdate <=',$to)->where('payment_postdate >=',$from)->get('user_payment')->result();
    $total = count($bonus);
    if($total > 12){
        $total = 12;
    }
    return $total;
}

function getLevel($user_leader,$user_kode){
    $ci = &get_instance();
    for ($i = 1; $i <= 10; $i++) {
        $cek = $ci->db->where('user_kode',$user_kode)->get('user_profile')->row();
        if($cek){
            if($cek->user_leader == $user_leader){
                return $i;
            } else {
                $user_kode = $cek->user_leader;
                continue;
            }
        } 
    }
}

function countTotalSaldo($id){
    $total_withdraw = 0;
    $ci = &get_instance();
    $sql = $ci->db->where('user_id',$id)->get('user_profile')->row();
    $no_req_withdraw = $ci->db->where('user_id',$id)->get('withdraw')->result();
    $jml_withdraw = $ci->db->where('withdraw_status !=','Decline')->where('user_id',$id)->get('withdraw')->result();
    foreach($jml_withdraw as $row){
        $total_withdraw += $row->withdraw_amount;
		
    }
    $premi = getLastPremi($id,'periode');

    return ($sql->user_premi*$premi)-$total_withdraw;
}

function calculateSaldo($id){
	 $ci = &get_instance();
	 if($id){
            $id = $id;
        } else {
            $id = $ci->session->userdata('login');
        }
        $list = $ci->db->where('user_id',$id)->get('saldo')->result();
        $premi = $ci->db->where('user_id',$id)->where('payment_status','Done')->get('user_payment')->result();
        $withdraw = $ci->db->where('user_id',$id)->order_by('withdraw_postdate','asc')->get('withdraw')->result();
        foreach($withdraw as $k=>$v ){
            $v->saldo_created_by = $v->user_id;
        }
        foreach($premi as $k=>$v ){
          $v->withdraw_postdate = $v->payment_postdate;
          $v->withdraw_amount = 'Premi';
          $v->withdraw_status = 'Premi';
          unset($v->payment_postdate);
        }
        foreach($list as $k=>$v ){
          $v->withdraw_postdate = $v->saldo_postdate;
          $v->withdraw_amount = $v->saldo_amount;
          $v->withdraw_status = $v->saldo_keterangan;
          unset($v->saldo_amount);
          unset($v->saldo_postdate);
          unset($v->saldo_keterangan);
        }
        $hasil = array_merge($premi,$withdraw,$list);
		//print_r($hasil);die;
        //usort($hasil, array($ci, "sortWithdrawDate"));
        
		//print_r($hasil);die;
		return $hasil;
}

function calculateSaldoTabungan($id){
	 $ci = &get_instance();
	 if($id){
            $id = $id;
        } else {
            $id = $ci->session->userdata('login');
        }
          $list = $ci->db->where('user_id',$id)->get('saldo_tabungan')->result();
        //$premi = $this->db->where('user_id',$id)->where('payment_status','Done')->get('user_payment')->result();
        $withdraw = $ci->db->where('user_id',$id)->order_by('withdraw_postdate','asc')->get('withdraw_tabungan')->result();
         foreach($withdraw as $k=>$v ){
            $v->saldo_created_by = $v->user_id;
        }
        /*foreach($premi as $k=>$v ){
          $v->withdraw_postdate = $v->payment_postdate;
          $v->withdraw_amount = 'Premi';
          $v->withdraw_status = 'Premi';
          unset($v->payment_postdate);
        }*/
        foreach($list as $k=>$v ){
          $v->withdraw_postdate = $v->saldo_postdate;
          $v->withdraw_amount = $v->saldo_amount;
          $v->withdraw_status = $v->saldo_keterangan;
          unset($v->saldo_amount);
          unset($v->saldo_postdate);
          unset($v->saldo_keterangan);
        }
		$hasil = array_merge($withdraw,$list);
        //$hasil = $list;
		//print_r($hasil);die;
        //usort($hasil, array($ci, "sortWithdrawDate"));
        
		//print_r($hasil);die;
		return $hasil;
}

function countTotalSaldoTabungan($field){
    $ci = &get_instance();
	$total_withdraw = 0;
	/*select user_id, GREATEST( SUM(saldo_amount),0) from saldo_tabungan  where user_id=73
	$jml_withdraw = $ci->db->where('withdraw_status !=','Decline')->where('user_id',$id)->get('withdraw')->result();
    foreach($jml_withdraw as $row){
        $total_withdraw += $row->withdraw_amount;
		
    }*/
	//$query = $ci->db->select("(select GREATEST( SUM(saldo_amount),0) from saldo_tabungan where user_id='".$field."'", FALSE); 
	//print_r($query);die;
	//$query = $ci->db->get('saldo_tabungan');
	//$b = $ci->db->where('user_id',$field)->where('saldo_amount','GREATEST( SUM(saldo_amount),0)')->get('saldo_tabungan')->result();
	
	//$a=$b['saldo_amount'];
	//$b = $ci->db->select('*','GREATEST( SUM(saldo_amount),0)')->where('user_id',$field)->get('saldo_tabungan')->result();
	
	$query = $ci->db->query("select user_id, GREATEST( SUM(saldo_amount),0) As saldo from saldo_tabungan  where user_id='".$field."'");

	$a = $query->result();
	//print_r($a);die;
    //$sql = $ci->db->where($where,$field)->order_by('saldo_id','ASC')->get($tabel)->result();
	//$jml_withdraw = $ci->db->where('saldo_amount','saldo_amount,GREATEST( SUM(saldo_amount),0)')->where('user_id',$field)->get('saldo_tabungan')->result();
    //foreach($jml_withdraw as $row){
      //  $total_withdraw += $row->saldo_amount;
		
    //}
	
	//$query = $this->db->select_sum('amount', 'Amount');
	//$query = $this->db->where(...)
	//$query = $this->db->get('payment');
	//$result = $query->result();

	//return $result[0]->Amount;
	 
	return $a[0]->saldo;
   
}


function countTotalSaldoTabungan2($field){
    $ci = &get_instance();
	$total_withdraw = 0;
	/*select user_id, GREATEST( SUM(saldo_amount),0) from saldo_tabungan  where user_id=73
	$jml_withdraw = $ci->db->where('withdraw_status !=','Decline')->where('user_id',$id)->get('withdraw')->result();
    foreach($jml_withdraw as $row){
        $total_withdraw += $row->withdraw_amount;
		
    }*/
	//$query = $ci->db->select("(select GREATEST( SUM(saldo_amount),0) from saldo_tabungan where user_id='".$field."'", FALSE); 
	//print_r($query);die;
	//$query = $ci->db->get('saldo_tabungan');
	//$b = $ci->db->where('user_id',$field)->where('saldo_amount','GREATEST( SUM(saldo_amount),0)')->get('saldo_tabungan')->result();
	
	//$a=$b['saldo_amount'];
	//$b = $ci->db->select('*','GREATEST( SUM(saldo_amount),0)')->where('user_id',$field)->get('saldo_tabungan')->result();
	
	$query = $ci->db->query("select user_id, GREATEST( SUM(saldo_amount),0) As saldo from saldo_tabungan  where user_id='".$field."'");

	$a = $query->result();
	//print_r($a);die;
    //$sql = $ci->db->where($where,$field)->order_by('saldo_id','ASC')->get($tabel)->result();
	//$jml_withdraw = $ci->db->where('saldo_amount','saldo_amount,GREATEST( SUM(saldo_amount),0)')->where('user_id',$field)->get('saldo_tabungan')->result();
    //foreach($jml_withdraw as $row){
      //  $total_withdraw += $row->saldo_amount;
		
    //}
	
	//$query = $this->db->select_sum('amount', 'Amount');
	//$query = $this->db->where(...)
	//$query = $this->db->get('payment');
	//$result = $query->result();

	//return $result[0]->Amount;
	 
	return $a[0]->saldo;
   
}


function countTotalSaldoTabungann($field,$id){
    $ci = &get_instance();
	$total_withdraw = 0;
	/*select user_id, GREATEST( SUM(saldo_amount),0) from saldo_tabungan  where user_id=73
	$jml_withdraw = $ci->db->where('withdraw_status !=','Decline')->where('user_id',$id)->get('withdraw')->result();
    foreach($jml_withdraw as $row){
        $total_withdraw += $row->withdraw_amount;
		
    }*/
	//$query = $ci->db->select("(select GREATEST( SUM(saldo_amount),0) from saldo_tabungan where user_id='".$field."'", FALSE); 
	//print_r($query);die;
	//$query = $ci->db->get('saldo_tabungan');
	//$b = $ci->db->where('user_id',$field)->where('saldo_amount','GREATEST( SUM(saldo_amount),0)')->get('saldo_tabungan')->result();
	
	//$a=$b['saldo_amount'];
	//$b = $ci->db->select('*','GREATEST( SUM(saldo_amount),0)')->where('user_id',$field)->get('saldo_tabungan')->result();
	
	$query = $ci->db->query("select saldo_akhir As saldo from withdraw_tabungan  where user_id='".$field."' and withdraw_id='".$id."'");

	$a = $query->result();
	//print_r($a);die;
    //$sql = $ci->db->where($where,$field)->order_by('saldo_id','ASC')->get($tabel)->result();
	//$jml_withdraw = $ci->db->where('saldo_amount','saldo_amount,GREATEST( SUM(saldo_amount),0)')->where('user_id',$field)->get('saldo_tabungan')->result();
    //foreach($jml_withdraw as $row){
      //  $total_withdraw += $row->saldo_amount;
		
    //}
	
	//$query = $this->db->select_sum('amount', 'Amount');
	//$query = $this->db->where(...)
	//$query = $this->db->get('payment');
	//$result = $query->result();

	//return $result[0]->Amount;
	 
	return $a[0]->saldo;
   
}