<?php 
class Connection{

		public PDO $pdo;

		public function __construct()
		{
				$this->pdo = new PDO("mysql:server=localhost;dbname=notes","root","");
				$this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		}

		public function getNotes(){

			$query = $this->pdo->prepare("SELECT * FROM notes ORDER BY create_date DESC");
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);

		}

		public function addNote($note)
		{

			$query =  $this->pdo->prepare("INSERT INTO notes (title,discription,create_date) VALUES(:title,:discription,:date)");
			$query->bindValue(':title',$note['title']);
			$query->bindValue(':discription',$note['description']);
			$query->bindValue(':date', date('Y-m-d H:i:s'));
			return $query->execute();


		}

		public function getNoteById($id){
			$query = $this->pdo->prepare("SELECT * FROM notes WHERE id=:id");
			$query->bindValue('id',$id);
			$query->execute();
			return $query->fetch(PDO::FETCH_ASSOC);
		}

		public function UpdateNote($id, $note)
		{
    		$query = $this->pdo->prepare("UPDATE notes SET title = :title, discription = :discription WHERE id = :id");
    		$query->bindValue(':id', $id);
    		$query->bindValue(':title', $note['title']);
    		$query->bindValue(':discription', $note['description']);
    		return $query->execute();
		}


		public function RemoveNote($id)
		{

		 $query = $this->pdo->prepare("DELETE FROM notes WHERE id= :id");
		 $query->bindValue('id',$id);
		 $query->execute();

		}
   

}
    return  new connection();























 ?>