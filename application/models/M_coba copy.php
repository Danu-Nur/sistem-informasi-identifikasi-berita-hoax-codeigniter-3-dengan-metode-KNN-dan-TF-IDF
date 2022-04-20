<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Metode extends CI_Model {
// proses preprocessing data teks
	public function preProcessing($teks){

		//mengubah tanda baca menjadi spasi 
		$filterr = array("'","`","–","_","-",")","(","\"","/","=","+",".",",",":",";","!","?","\n");
		$teks = str_replace($filterr," ",$teks);

		//mengubah huruf besar ke huruf kecil
		$teks = strtolower(trim($teks));
		
		//menghapus kata yang tidak penting (stopword removing dan steming)
		$astoplist = array(
			' di',' ke',' se','ada ','adalah','adanya','adapun','agak ','agaknya','agar ',' akan ','akankah','akhir','lah','kah',
			'akhiri','akhirnya',' aku ','akulah','amat','amatlah','anda','andalah','antar','antara',
			'antaranya','apa','apaan','apabila','apakah','apalagi','apatah','arti','artinya','asal',
			'asalkan','atas','atau','ataukah','ataupun','awal','awalnya','bagai','bagaikan',
			'bagaimana','bagaimanakah','bagaimanapun','bagainamakah','bagi','bagian','bahkan','bahwa',
			'bahwasannya','bahwasanya',' baik ','belas','baiklah','bakal','bakalan','balik','banyak','bapak',
			'beberapa','begini','beginian','beginikah','beginilah','begitu','begitukah','begitulah',
			'begitupun','belakangan','belumlah','benarkah','benarlah','berada','berakhir','berakhirlah',
			'berakhirnya','berapa','berapakah','berapalah','berapapun','berarti','berawal','berbagai',
			'berdatangan','berikan','berikut','berikutnya','berjumlah','berkali-kali','berkata',
			'berkehendak','berkeinginan','berkenaan','berlainan','berlalu','berlangsung','berlebihan',
			'bermacam','bermacam-macam','bermaksud','bermula','bersama','bersama-sama','bersiap',
			'bersiap-siap','bertanya','bertanya-tanya','berturut','berturut-turut','bertutur','berujar',
			'berupa','besar','betul','betulkah','biasa','biasanya','bila','bilakah','bisa','bisakah','boleh',
			'bolehkah','bolehlah','buat','bukan','bukankah','bukanlah','bukannya','bulan','bung',
			'caranya','cukup','cukupkah','cukuplah','cuma','dahulu','dalam',' dan ','dapat','dari',
			'daripada','datang',' dekat ',' demi ','demikian','demikianlah','dengan','depan','dia',
			'diakhiri','diakhirinya','dialah','diantara','diantaranya','diberi','diberikan','diberikannya',
			'dibuat','dibuatnya','didapat','didatangkan','digunakan','diibaratkan','diibaratkannya',
			'diingat','diingatkan','diinginkan','dijawab','dijelaskan','dijelaskannya','dikarenakan',
			'dikatakan','dikatakannya','dikerjakan','diketahui','diketahuinya','dikira','dilakukan',
			'dilalui','dilihat','dimaksud','dimaksudkan','dimaksudkannya','dimaksudnya','diminta',
			'dimintai','dimisalkan','dimulai','dimulailah','dimulainya','dimungkinkan','dini','dipastikan',
			'diperbuat','diperbuatnya','dipergunakan','diperkirakan','diperlihatkan','diperlukan',
			'diperlukannya','dipersoalkan','dipertanyakan','dipunyai','diri','dirinya','disampaikan',
			'disebut','disebutkan','disebutkannya','disini','disinilah','ditambahkan','ditandaskan',
			'ditanya','ditanyai','ditanyakan','ditegaskan','ditujukan','ditunjuk','ditunjuki','ditunjukkan',
			'ditunjukkannya','ditunjuknya','dituturkan','dituturkannya','diucapkan','diucapkannya',
			'diungkapkan','dong','dua','dulu','empat','enak','enggak','enggaknya','entah','entahlah',
			'guna','gunakan','hadap','hai','hal','halo','hallo','hampir','hanya','hanyalah',
			'hari','harus','haruslah','harusnya','helo','hello','hendak','hendaklah','hendaknya','hingga',
			' ia ','ialah','ibarat','ibaratkan','ibaratnya','ibu','ikut','ingat','ingat-ingat','ingin',
			'inginkah','inginkan',' ini ','inikah','inilah','itu','itukah','itulah',' jadi ','jadilah',
			'jadinya','jangan','jangankan','janganlah','jauh','jawab','jawaban','jawabnya','jelas',
			'jelaskan','jelaslah','jelasnya','jika','jikalau','juga','jumlah','jumlahnya','justru',
			'kadar','kala','kalau','kalaulah','kalaupun','kali','kalian','kami','kamilah','kamu',
			'kamulah','kapan','kapankah','kapanpun','karena','karenanya','kasus','kata','katakan',
			'katakanlah','katanya','keadaan','kebetulan','kecil','kedua','keduanya','keinginan',
			'kelamaan','kelihatan','kelihatannya','kelima','keluar','kembali','kemudian','kemungkinan',
			'kemungkinannya','kena','kenapa','kepada','kepadanya','kerja','kesampaian','keseluruhan',
			'keseluruhannya','keterlaluan','ketika','khusus','khususnya','kini','kinilah','kira',
			'kira-kira','kiranya','kita','kitalah','kok','kurang','lagi','lagian','lain',
			'lainnya','laku','lalu','lama','lamanya','langsung','lanjut','lanjutnya','lebih','lewat',
			'lihat','lima','luar','macam','maka ','makanya','makin ','maksud','malah','malahan',
			'mampu','mampukah','mana','manakala','manalagi','masa','masalah','masalahnya','masih',
			'masihkah','masing','masing-masing','masuk','mata','mau','maupun','melainkan','melakukan',
			'melalui','melihat','melihatnya','memang','memastikan','memberi','memberikan','membuat',
			'memerlukan','memihak','meminta','memintakan','memisalkan','memperbuat','mempergunakan',
			'memperkirakan','memperlihatkan','mempersiapkan','mempersoalkan','mempertanyakan','mempunyai',
			'memulai','memungkinkan','menaiki','menambahkan','menandaskan','menanti','menanti-nanti',
			'menantikan','menanya','menanyai','menanyakan','mendapat','mendapatkan','mendatang','mendatangi',
			'mendatangkan','menegaskan','mengakhiri','mengapa','mengatakan','mengatakannya','mengenai',
			'mengerjakan','mengetahui','menggunakan','menghendaki','mengibaratkan','mengibaratkannya',
			'mengingat','mengingatkan','menginginkan','mengira','mengucapkan','mengucapkannya','mengungkapkan',
			'menjadi','menjawab','menjelaskan','menuju','menunjuk','menunjuki','menunjukkan','menunjuknya',
			'menurut','menuturkan','menyampaikan','menyangkut','menyatakan','menyebutkan','menyeluruh',
			'menyiapkan','merasa','mereka','merekalah','merupakan','meski','meskipun','meyakini','meyakinkan',
			'minta','mirip','misal','misalkan','misalnya','mohon',' mula ',' muat ','mulai','mulailah','mulanya','mungkin',
			'mungkinkah','naik','namun','nanti','nantinya','nya','nyaris','nyata','nyatanya',
			'oleh','olehnya','orang','pada','padahal','padanya',' pak ','paling','panjang','pantas',
			'para','pasti','pastilah','penting','pentingnya','per','percuma','perlu','perlukah','perlunya',
			'pernah','persoalan','pertama','pertama-tama','pertanyaan','pertanyakan','pihak','pihaknya',
			'pukul',' pula ','pun','punya','rasa','rasanya','rupa','rupanya','saat','saatnya','saja',
			'sajalah','salam','saling','sama','sama-sama','sambil','sampai','sampai-sampai','sampaikan','sana',
			'sangat','sangatlah','sangkut','satu','saya ','sayalah','sebab','sebabnya','sebagai',
			'sebagaimana','sebagainya','sebagian','sebaik','sebaik-baiknya','sebaiknya','sebaliknya',
			'sebanyak','sebegini','sebegitu','sebelum','sebelumnya','sebenarnya','seberapa','sebesar',
			'sebetulnya','sebisanya','sebuah','sebut','sebutlah','sebutnya','secara','secukupnya','sedang',
			'sedangkan','sedemikian','sedikit','sedikitnya','seenaknya','segala','segalanya','segera',
			'seharusnya','sehingga','seingat','sejak','sejauh','sejenak','sejumlah','sekadar','sekadarnya',
			'sekali','sekali-kali','sekalian','sekaligus','sekalipun','sekarang','sekaranglah','sekecil',
			'seketika','sekiranya','sekitar','sekitarnya','sekurang-kurangnya','sekurangnya','sela','selain',
			'selaku','selalu','selama','selama-lamanya','selamanya','selanjutnya','seluruh','seluruhnya',
			'semacam','semakin','semampu','semampunya','semasa','semasih','semata','semata-mata','semaunya',
			'sementara','semisal','semisalnya','sempat','semua','semuanya','semula','sendiri','sendirian',
			'sendirinya','seolah','seolah-olah','seorang','sepanjang','sepantasnya','sepantasnyalah',
			'seperlunya','seperti','sepertinya','sepihak','sering','seringnya','serta','serupa','sesaat',
			'sesama','sesampai','sesegera','sesekali','seseorang','sesuatu','sesuatunya','sesudah',
			'sesudahnya','setelah','setempat','setengah','seterusnya','setiap','setiba','setibanya',
			'setidak-tidaknya','setidaknya','setinggi','seusai','sewaktu','siap','siapa','siapakah',
			'siapapun','sini','sinilah','soal','soalnya','suatu','sudah','sudahkah','sudahlah','supaya',
			'tadi','tadinya','tahu','tak','tambah','tambahnya','tampak','tampaknya','tandas','tandasnya',
			'tanpa','tanya','tanyakan','tanyanya',' tapi ','tegas','tegasnya','telah','tempat','tentang','tentu',
			'tentulah','tentunya','tepat','terakhir','terasa','terbanyak','terdahulu','terdapat','terdiri',
			'terhadap','terhadapnya','teringat','teringat-ingat','terjadi','terjadilah','terjadinya','terkira',
			'terlalu','terlebih','terlihat','termasuk','ternyata','tersampaikan','tersebut','tersebutlah',
			'tertentu','tertuju','terus','terutama','tetap','tetapi','tiap','tiba','tiba-tiba','tidak',
			'tidakkah','tidaklah','tiga','toh','tuju','tunjuk','turut','tutur','tuturnya','ucap','ucapnya',
			'ujar','ujarnya','umumnya','ungkap','ungkapnya','untuk','usah','usai','waduh','wah','wahai',
			'waktunya','walau','walaupun','wong',' ya ','yaitu','yakin','yakni',' ng ',' sa ',' a ',
			' b ',' c ',' d ',' e ',' f ',' g ',' h ',' i ',' j ',' k ',' l ',' m ',' n ',' o ',' p ',' q ',
			' r ',' s ',' t ',' u ',' v ',' w ',' x ',' y ',' z ',' ja ',' jak ',' ta ',' jum ',' meng ',
			' kan ',' no ',' si ',' mua ',' nah ',' nal ',' airan ',' kel ',' gala ',' kou ',' san ',' ber ',
			' hu ',' dr ',' spb ',' onk ',' him ',' ti ',' apkli ',' gkiri ',' te ',' kg ',' bps ',' menc ',
			' kkp ',' yang ',' mesti ',' pilih ',' bersungut ',' pudar ',' ndalikan ',' dradjat ','informasi',
			'benar','jenis','kota','produksi','badan',' mi ',' but ',' tara ',' me ',' angg ',' rta ',' but ',
			' ter ',' trnas ',' pe ',' ring ',' kit ',' wasp ',' la ',' pisu ',' tiong ',' br ',' lu ',' mem ',
			' â€ ',' nin ',' inst ',' ipb ',' ms ',' â€œberita ',' ma ',' tika ',' gkas ',' an ',' tr ',' nners ',
			' su ',' luk ',' nali ','1','2','3','4','5','6','7','8','9','0'
		);

		foreach ($astoplist as $i => $arr) {
		$teks = str_replace($astoplist[$i], " ", $teks);
		}
		//mengubah huruf besar ke huruf kecil
		$teks = strtolower(trim($teks));
		return $teks;
	}
// end proses preprocessing

// proses TF (Trem Frekuensi) data Training / Dataset
	public function buatIndexDatase()
	{
	// menghapus index sebelumnya
	$awal = microtime(true);
	$this->M_Kata_Dataset->del_data();
	// ambil semua data tranining / dataset
	$berita = $this->M_Dataset->getAll();
	
	foreach($berita as $b){
		$idDoc = $b['ID_BERITA'];
		$isiBerita = $b['BERITA'];
		// menerapkan preprocessing teks
		$teksBerita = $this->M_Metode->preProcessing($isiBerita);
		// memecah string menjadi array
		$arberita = explode(" ", trim($teksBerita));
		for($i=0;$i<count($arberita);$i++){
			// jika trem tidak kosong
			if($arberita[$i] != ""){
				// ambil baris yang mengandung id dan array
				$row = $this->M_Kata_Dataset->getAnd($idDoc,$arberita[$i]);
				$row_arr = $row->row_array();
				// menghitung jumlah baris sesuai id dan trem
				$row_count = count($row->result_array());
				// jika baris lebih dari 0
				if($row_count > 0){
					// ambil baris FREK_TREM
					$count = $row_arr['FREK_DATASET'];
					// menambah 1
					$count++;

					$data = array(
						'ID_BERITA' => $idDoc,
						'TREM_DATASET' => $arberita[$i],
						'FREK_DATASET' => $count
					);
					// update frek trem simpan ke tb_bobot_kata_dataset
					$this->M_Kata_Dataset->updateData($data);
				}else{
					// jika baris 0
					$data = array(
						'ID_BERITA' => $idDoc,
						'TREM_DATASET' => $arberita[$i],
						'FREK_DATASET' => 1
					);
					// membuat data baru dan simpan ke tb_bobot_kata_dataset
					$this->M_Kata_Dataset->add($data);
				}
			}
		}
		
	}$akhir = microtime(true);
$hsl = $akhir - $awal;
return $hsl;
}
// end proses TF data Training / Dataset

// proses TF.IDF Kata data Training / Dataset
	public function hitungBobotDataset()
	{
		$awal = microtime(true);
		// ambil semua data dari tb_bobot_kata_dataset
		$bobot = $this->M_Kata_Dataset->getAll();
		foreach($bobot as $b){

			$idKata = $b['ID_KATA_DATASET'];
			$tremData = $b['TREM_DATASET'];
			$TF = $b['FREK_DATASET'];
			// menghitung jumlah dokumen / data dalam dataset
			$D = $this->M_Kata_Dataset->getNDoc();

			// menghitung jumlah dokumen yg memiliki trem sama
			$df = $this->M_Kata_Dataset->getDF($tremData);
			// menghitung rumus TF.IDF = TF x log10(jumlah dokumen/jumlah dokumen yg memiliki trem sama)
			$W = $TF * log10($D/$df);

			$data2 = array(
				'ID_KATA_DATASET' => $idKata,
				'BOBOT_KATA_DATASET' => $W
			);
			// update tb_bobot_kata_dataset
			$this->M_Kata_Dataset->updateBobot($data2);
		}
		$akhir = microtime(true);
		$hsl = $akhir - $awal;
		return $hsl;
	}
// end proses TF.IDF Kata data Training / Dataset

// proses TF (Trem Frekuensi) data Testing
	public function buatIndexKataUji($id)
	{
		$this->M_Kata_Uji->del_data();
		// jika id null
		if($id == null){
			// ambil id dari distinct bobot testing
				$berita = $this->M_Uji->getAll();
			}else{
			//  ambil id dari kondisi bobot testing
				$berita = $this->M_Uji->getById($id);
			}
		foreach($berita as $b){
			$idDoc = $b['ID_DATA_UJI'];
			$isiBerita = $b['DATA_UJI'];

			$teksBerita = $this->M_Metode->preProcessing($isiBerita);

			$arberita = explode(" ", trim($teksBerita));
			
			foreach($arberita as $arr){
				if($arr != ""){
					$row =  $this->M_Kata_Uji->getAnd($idDoc,$arr);
					$row_arr = $row->row_array();
					$row_count = count($row->result_array());
					
					if($row_count > 0){
						$count = $row_arr['FREK_UJI'];
						$count++;

						$data = array(
							'ID_DATA_UJI' => $idDoc,
							'TREM_UJI' => $arr,
							'FREK_UJI' => $count
						);
						$this->M_Kata_Uji->updateData($data);
					}else{
						$data = array(
							'ID_DATA_UJI' => $idDoc,
							'TREM_UJI' => $arr,
							'FREK_UJI' => 1
						);
						$this->M_Kata_Uji->add($data);
					}
				}
			}
		}
	}
// end proses TF data Testing

// proses TF.IDF Kata data Testing
	public function hitungBobotUji($id)
	{
		if($id == null){
			// ambil id dari distinct bobot testing
				$kata = $this->M_Kata_Uji->getAll();
			}else{
			//  ambil id dari kondisi bobot testing
				$kata = $this->M_Kata_Uji->getById($id);
			}
		foreach($kata as $bo){
			$idKata = $bo['ID_KATA_UJI'];
			$tremData = $bo['TREM_UJI'];
			$TF = $bo['FREK_UJI'];

				$D = $this->M_Kata_Dataset->getNDoc();
				// jumlah doc training dengan trem yg sama
				$df = $this->M_Kata_Dataset->getDF($tremData);

				if($df != 0){
					$W = $TF * log10($D/$df);

					$data2 = array(
						'ID_KATA_UJI' => $idKata,
						'BOBOT_KATA_UJI' => $W
				);

				$this->M_Kata_Uji->updateBobot($data2);
				}
			}
		}
// end proses TF.IDF Kata data Testing

// proses hitung KNN Jarak Euclidean
	public function hitungKNN($id)
	{
		// hapus data tb_cache
		$this->M_Chace->del_data();
		// jika id null
		if($id == null){
			// ambil id dari distinct bobot testing
				$docUji = $this->M_Bobot_Uji->getDistinct();
			}else{
			//  ambil id dari kondisi bobot testing
				$docUji = $this->M_Bobot_Uji->getID($id);
			}
			// ambil id dari distinct bobot dataset
		$docDistinct = $this->M_Chace->getDistinct();
		// cetak data testing
		foreach($docUji as $dUji){
			$idD = $dUji['ID_DATA_UJI'];
			// cetak dataset
			foreach($docDistinct as $DD){
				
				$docID = $DD['ID_BERITA'];
				// ambil dari bobot uji menurut id uji
				$tremUji = $this->M_Chace->getAnd($idD);
				$wUji = 0;
				$wDataset = 0;
				// cetak bobot uji sebanyak jumlah trem nya
				foreach($tremUji as $t){
					$arTrem = $t['TREM_UJI'];
					// hitung bobot total dokumen untuk atribut dokumen uji
					$uji = $t['BOBOT_KATA_UJI'];
					$wUji = $wUji + $uji;

					$data = array(
						'ID_BERITA' => $docID,
						'TREM_UJI' => $arTrem
					);
					// ambil data dari bobot dataset menurut ad dan trem yg sama dgn trem uji
					$tremData = $this->M_Chace->getBobotTrem($data);
					// hitung bobot total dokumen untuk atribut dokumen dataset
					$set = $tremData['BOBOT_KATA_DATASET'];
					$wDataset = $wDataset + $set;
				}
				// hitung KNN = √(dataset - data training)^2
				// dataset - data training hasil di simpan ke $temp
				$temp = $wDataset - $wUji;
				// $temp dipangkat 2
				$pangkat = pow($temp,2);
				// √$pangkat (hasilnya di akar)
				$p_vektor = sqrt($pangkat);

				$data2 = array(
				'ID_DATA_UJI' => $idD,
				'ID_BERITA' => $docID,
				'JARAK_EUCLIDEAN' => $p_vektor
				);
				// simpan ke tb cache
				$this->M_Chace->add($data2);
				
			}
		}
		$this->M_Metode->lanjutKNN($id);
	}
// end proses hitung KNN Jarak Euclidean

// proses mengurutkan data dari yang terkecil sampai ke besar dan di ambil jumlah K=5
	public function lanjutKNN($id)
	{
		$this->M_Identifikasi_detail->del_data();
		if($id == null){
			// ambil id dari distinct bobot testing
				$idTest = $this->M_Bobot_Uji->getDistinct();
			}else{
			//  ambil id dari kondisi bobot testing
				$idTest = $this->M_Bobot_Uji->getID($id);
			}
		foreach($idTest as $t){
			$idDocUji = $t['ID_DATA_UJI'];
			$cache = $this->M_Chace->getLimit($idDocUji);
			foreach($cache as $c){
				$data = array(
					'ID_DATA_UJI' => $idDocUji,
					'ID_BERITA' => $c['ID_BERITA'],
					'JARAK_EUCLIDEAN' => $c['JARAK_EUCLIDEAN']
				);

				$cek = $this->M_Identifikasi_detail->cekData($data);
				if($cek > 0){
					$this->M_Identifikasi_detail->updateData($data);
				}else{
					$this->M_Identifikasi_detail->add($data);
				}
			}
		}
		// $this->M_Chace->del_data();
		$this->M_Metode->knnClass();
	}

	public function knnClass()
	{
		$detail = $this->M_Identifikasi_detail->getDistinct();
		foreach ($detail as $det) {
			$id = $det['ID_DATA_UJI'];
			$lab1 = 'HOAX';
			$lab2 = 'VALID';

			$labH = $this->M_Identifikasi_detail->getById($id,$lab1);
			$labV = $this->M_Identifikasi_detail->getById($id,$lab2);

			if($labH > $labV){
				$label = 'HOAX';
			}else{
				$label = 'VALID';
			}
			$data = array(
				'ID_DATA_UJI' => $id,
				'LABEL_IDENTIFIKASI' => $label
			);

			$cek = $this->M_Identifikasi->cekData($data);
			if($cek > 0){
				$this->M_Identifikasi->updateData($data);
			}else{
				$this->M_Identifikasi->add($data);
			}
		}
	}
}


/* End of file M_Library.php */

?>
