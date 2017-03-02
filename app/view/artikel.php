<h1>List Artikel</h1>

<?php foreach ($data_artikel as $row) { ?>
	<a href="artikel/detail/<?php echo $row['id']; ?>"><h3><?php echo $row['judul'] ?></h3></a>
	<p><?php echo $row['isi'] ?></p>
	<a href="artikel/detail/<?php echo $row['id']; ?>">baca selengkapnya &raquo;</a>
	<hr>
<?php } ?>