<?php 
// Imports the social links library of composer
use SocialLinks\Page;

//Create a Page instance with the url information
$socialLinks = new Page([
    'url' => 'http://project-toto.dev',
    'title' => 'Project Toto',
    'text' => 'Management of the webforce3 functions',
    'image' => 'https://s-media-cache-ak0.pinimg.com/736x/b5/2f/4c/b52f4c7081d0f14ecb8ba1ac079119dc.jpg',
    'twitterUser' => '@twitterUser'
]);
?>

	<footer>
		<p>&copy; <?php echo date("M d, Y (D)"); ?> - ALL RIGHTS RESERVED</p>
		<a href="https://www.facebook.com/sharer/sharer.php?display=popup&redirect_uri=http%3A%2F%2Fwww.facebook.com&u=http%3A%2F%2Fproject-toto.dev&t=Project+Toto">Facebook</a> |
		<a href="https://twitter.com/intent/tweet?text=Project+Toto+via+%40twitterUser&url=http%3A%2F%2Fproject-toto.dev">Twitter</a> |
		<a href="https://www.linkedin.com/shareArticle?mini=1&url=http%3A%2F%2Fproject-toto.dev&title=Project+Toto&summary=Management+of+the+webforce3+functions">LinkedIn</a>
	</footer>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>