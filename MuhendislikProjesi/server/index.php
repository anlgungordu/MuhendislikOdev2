<?php 
	$type = $_POST["type"];

	require "db.php"; // veritabani bağlantısı
	require "rehber.php"; // rehber sınıfı

	$result = [ 'result' => false ,"error" => "Bir sorun oluştu!"]; // Sonuçların döndüğü dizi

	switch($type){

		case "add": // Ekleme 
			$rehber = new Rehber();

			$name = $_POST["name"];
			$no = $_POST["no"];
			$adres = $_POST["adres"];

			// Gelen parametreleri alıp boş mu diye kontrol ediyoz

			if($name && $adres && $no){
				$result["result"] = $rehber->add($name,$no,$adres); // Rehber sınıfında ekleme kısmına gönderiyoruz
			}else $result["error"] = "Lütfen boş alan bırakmayınız!";

		break;

		case "list":
			$rehber = new Rehber();
			$result["list"] = $rehber->liste(); // Veritabanından çekiyor

			$result["result"] = true;
		break;

		case "delete":
			$rehber = new Rehber();
			$id = $_POST["id"];
			$result["result"] = $rehber->del($id); // Rehber sınıfında silme işlemi yapıyor
		break;

		case "get":
			$rehber = new Rehber();
			$id = $_POST["id"];
			$list = $rehber->get($id); // Gelen id ye göre veriyi çekiyor


			$result["get"] = $list; // Formu doldurmak üzere result a gönderiyoruz
			$result["result"] = $list ? true:false; // Veri varsa sonucu true yapıyoruz hata basmamak için
			if(!$list)
				$result["error"] = "Kayıt bulunamadı";
		break;

		case "update":
			$rehber = new Rehber();

			$name = $_POST["name"];
			$no = $_POST["no"];
			$adres = $_POST["adres"];
			$id = $_POST["id"];

			// Gelen verileri kontrol ediyoruz boş mu diye
			if($name && $adres && $no && $id){
				$result["result"] = $rehber->update($name,$no,$adres,$id); // Düzenleme için rehber sınıfına gönderiyoruz.
			}else $result["error"] = "Lütfen boş alan bırakmayınız!";
		break;
	}

	echo json_encode($result); // Sonucları json a çevirerek ekrana basar