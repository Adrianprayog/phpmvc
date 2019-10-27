<?php 

class Mahasiswa_model {
	
	private $table = 'mahasiswa';
	private $db;


	public function __construct()
	{
		$this->db = new Database;
	}


	public function getAllMahasiswa()
	{
		$this->db->query('SELECT * FROM ' . $this->table);
		return $this->db->resultSet();
	}

	public function getMahasiswaById($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id', $id);
		return $this->db->single();
	}

	public function tambahDataMahasiswa($data)
	{
		$query = "INSERT INTO mahasiswa
						VALUES
					('', :nama, :nrp, :email, :jurusan)";

		$this->db->query($query);
		$this->db->bind('nama', $data['Nama']);
		$this->db->bind('nrp', $data['Nrp']);
		$this->db->bind('email', $data['Email']);
		$this->db->bind('jurusan', $data['Jurusan']);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function hapusDataMahasiswa($id)
		{
				$query = "DELETE FROM mahasiswa WHERE id = :id";
				$this->db->query($query);
				$this->db->bind('id', $id);

				$this->db->execute();

				return $this->db->rowCount();
		}


		public function ubahDataMahasiswa($data)
	{

		$query = "UPDATE mahasiswa SET
					Nama = :nama,
					Nrp = :nrp,
					Email = :email,
					Jurusan = :jurusan
					WHERE Id = :id";


		$this->db->query($query);
		$this->db->bind('nama', $data['Nama']);
		$this->db->bind('nrp', $data['Nrp']);
		$this->db->bind('email', $data['Email']);
		$this->db->bind('jurusan', $data['Jurusan']);
		$this->db->bind('id', $data['Id']);

		// var_dump($data['id']);die;

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function cariDataMahasiswa()
	{
		$keyword = $_POST['keyword'];
		$query = "SELECT * FROM mahasiswa WHERE nama LIKE :keyword";
		$this->db->query($query);
		$this->db->bind('keyword', "%$keyword%");

		return $this->db->resultSet();
	}
}


 ?>