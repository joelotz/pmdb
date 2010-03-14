<?php
/**
 * This page lists all the equipment
 * @author Joe Lotz
 */
   // Don't forget the include
   include('common.inc.php');
   // Display the header
   showHeader('Books');
   // Get the count of books and issue the query
   $sql = "SELECT authors.id AS authorId, firstName, lastName, books.*
               FROM authors, books WHERE author=authors.id ORDER BY title";
   $totalBooks = getRowCount($sql);
   $q = $conn->query($sql);
   $q->setFetchMode(PDO::FETCH_ASSOC);
   // now create the table
   ?>
   Total books: <?=$totalBooks?>
   <table width="100%" border="1" cellpadding="3">
   <tr style="font-weight: bold">
       <td>Cover</td>
       <td>Author and Title</td>
       <td>ISBN</td>
       <td>Publisher</td>
       <td>Year</td>
       <td>Summary</td>
       <td>Edit</td>
   </tr>
   <?php
   // Now iterate over every row and display it
   while($r = $q->fetch())
   {
       ?>
       <tr>
          <td>
            <?php if($r['coverMime']) { ?>
               <img src="showCover.php?book=<?=$r['id']?>">
            <?php } else { ?>
               n/a
            <? } ?>
          </td>
          <td>
            <a href="author.php?id=<?=$r['authorId']?>"><?=htmlspecialchars
                      ("$r[firstName] $r[lastName]")?></a><br/>
            <b><?=htmlspecialchars($r['title'])?></b>
     </td>
     <td><?=htmlspecialchars($r['isbn'])?></td>
     <td><?=htmlspecialchars($r['publisher'])?></td>
     <td><?=htmlspecialchars($r['year'])?></td>
     <td><?=htmlspecialchars($r['summary'])?></td>
     <td>
       <a href="editBook.php?book=<?=$r['id']?>">Edit</a>
     </td>
   </tr>
   <?php
}
?>
</table>
<a href="editBook.php">Add book...</a>
<?php
// Display footer
showFooter();
?>
