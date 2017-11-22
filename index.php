<?php
	include('includes/connexion.inc.php');
	include('includes/haut.inc.php');
	?>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-text">
                        <span class="name">Le fil</span>
                        <hr class="star-light">
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- About Section -->
    <section>
        <div class="container">
            <div class="row">              
                <form method="POST" action="message.php">
                    <div class="col-sm-10">  
                        <div class="form-group">
                            <textarea id="message" name="message" class="form-control" placeholder="Message"></textarea>
							<input type="hidden" name="id" value="id"/>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <button type="submit" class="btn btn-success btn-lg">Envoyer</button>
                    </div>                        
                </form>
            </div>
			
	<?php
		$sql="SELECT * FROM messages ORDER BY date DESC";
		$stmt=$pdo->query($sql);
		while($data=$stmt->fetch()){
	?>
		<blockquote>
		<p>
	<?php echo $data['contenu']; ?>
		</p>
		<footer>
	<?php echo date('d/m/y à H:i:s',$data['date']);?>
		</footer>
		<a href="message.php?a=sup&id=<?=$data['id']?>" class="btn btn-danger">Supprimer</a>
		<a href="index.php?b=mod&id=<?=$data['id']?>" class="btn btn-primary">Modifier</a>
		</blockquote>
	<?php } ?>

            <div class="row">
                <div class="col-md-12">
                    <blockquote>
                      <p>Lorem ipsum dolor sit amet, consectetur <a href="#">#adipiscing</a> elit. Integer posuere erat a ante.</p>
                      <footer>Foo</footer>
                    </blockquote>

                    <blockquote>
                      <p>Sed eu tellus vel lectus <a href="#">@rhoncus</a> maximus. Nam eu turpis ac eros pellentesque tincidunt. Maecenas pellentesque consequat libero</p>
                      <footer>Mauris arcu</footer>
                    </blockquote>

                    <blockquote>
                      <p>Nunc volutpat vel nibh vitae blandit</p>
                      <footer>blandit</footer>
                    </blockquote>
                </div>
            </div>
        </div>
    </section>

<?php
	include('includes/bas.inc.php');
?>
