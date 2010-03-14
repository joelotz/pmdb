<?

/**
  * This is the central Model class. Use its static methods
  * To retrieve a book, author, borrower by ID
  * Or all the books, authors and borrowers
  */
class Model
{

   /**
     * This is the connection object returned by
     * Model::getConn()
     * @var PDO
     */
	private static $conn = null;

	/**
	  * This method returns the connection object.
      * If it has not been yet created, this method
      * instantiates it based on the $connStr, $user and $pass
      * global variables defined in common.inc.php
      * @return PDO the connection object
      */
	static function getConn()
    {
		if(!self::$conn) {
        global $connStr, $user, $pass;
        try
        {
			self::$conn = new PDO($connStr, $user, $pass);
            self::$conn->setAttribute(PDO::ATTR_ERRMODE,
				PDO::ERRMODE_EXCEPTION);
		}
			catch(PDOException $e)
			{
				showHeader('Error');
				showError("Sorry, an error has occurred. Please
					try your request later\n" . $e->getMessage());
			}
		}
        return self::$conn;
	}

    /**
      * This method returns the list of all books
      * @return PDOStatement
      */
	static function getBooks()
    {
		$sql = "SELECT * FROM books ORDER BY title";
        $q = self::getConn()->query($sql);
        $q->setFetchMode(PDO::FETCH_CLASS, 'Book', array());
        return $q;
	}

    /**
      * This method returns the number of books in the database
      * @return int
      */
	static function getBookCount()
    {
		$sql = "SELECT COUNT(*) FROM books";
        $q = self::getConn()->query($sql);
        $rv = $q->fetchColumn();
		$q->closeCursor();
		return $rv;
	}

	/**
	  *This method returns a book with given ID
      * @param int $id
      * @return Book
      */
	static function getBook($id)
	{
		$id = (int)$id;
		$sql = "SELECT * FROM books WHERE id=$id";
		$q = self::getConn()->query($sql);
		$rv = $q->fetchObject('Book');
		$q->closeCursor();
		return $rv;
	}

	/**
	  * This method returns the list of all authors
      * @return PDOStatement
      */
	static function getAuthors()
	{
		$sql = "SELECT * FROM authors ORDER BY lastName, firstName";
		$q = self::getConn()->query($sql);
		$q->setFetchMode(PDO::FETCH_CLASS, 'Author', array());
		return $q;
	}
	
	/**
	  * This method returns the number of authors in the database
	  * @return int
	  *
	  */
	static function getAuthorCount()
	{
		$sql = "SELECT COUNT(*) FROM authors";
		$q = self::getConn()->query($sql);
		$rv = $q->fetchColumn();
		$q->closeCursor();
		return $rv;
	}

	/**
	  * This method returns an author with given ID
      * @param int $id
      * @return Author
      */
	static function getAuthor($id)
	{
		$id = (int)$id;
        $sql = "SELECT * FROM authors WHERE id=$id";
        $q = Model::getConn()->query($sql);
        $rv = $q->fetchObject('Author');
        $q->closeCursor();
        return $rv;
	}
     
	/**
      * This method returns the list of all borrowers
      * @return PDOStatement
      */
	static function getBorrowers()
    {
		$sql = "SELECT * FROM borrowers ORDER BY dt";
        $q = self::getConn()->query($sql);
        $q->setFetchMode(PDO::FETCH_CLASS, 'Borrower', array());
        return $q;
	}
    
    /**
      * This method returns the number of borrowers in the database
      * @return int
      */
	static function getBorrowerCount()
    {
		$sql = "SELECT COUNT(*) FROM borrowers";
        $q = self::getConn()->query($sql);
        $rv = $q->fetchColumn();
        $q->closeCursor();
        return $rv;
	}
    
    /**
      *This method returns a borrower with given ID
      * @param int $id
      * @return BorrowedBook
      */
    static function getBorrower($id)
    {
        $id = (int)$id;
		$sql = "SELECT * FROM borrowers WHERE id=$id";
		$q = Model::getConn()->query($sql);
		$rv = $q->fetchObject('Borrower');
		$q->closeCursor();
		return $rv;
	}
}

?>
