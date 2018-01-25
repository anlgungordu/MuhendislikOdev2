<?php 
	class Rehber extends DB{
		function add($name,$no,$adres){ // Ekleme yapıyor.

			$this->db->insert("rehber",[
				'ad' => $name,
				'adres' => $adres,
				'numara' => $no
			]);

			return ($this->db->id() > 0 ? true:false); // Ekleme doğrumu yanlış mı onu gösteriyor geriye id dönüyorsa ekleme dogru demek
		}

		function update($name,$no,$adres,$id){
			$this->db->update("rehber",[
				'ad' => $name,
				'adres' => $adres,
				'numara' => $no
			],[
				"id"=>$id
			]);

			return ($this->db->error()[2] == null ? true:false); // PDO error dizisinde 2. indisde hata mesajı var eğer null ise hata yok demektir.
		}

		function liste(){
			return $this->db->select("rehber","*");
		}

		function del($id){
			$this->db->delete("rehber",["id"=>$id]);
			return ($this->db->error()[2]==null?true:false); // PDO error dizisinde 2. indisde hata mesajı var eğer null ise hata yok demektir.
		}

		function get($id){
			return $this->db->get("rehber","*",["id"=>$id]); // id vererek tekli çekme işlemi
		}

		function error(){
			return $this->db->error(); // Son hatayı gösterme
		}
	}