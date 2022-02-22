<?php use App\Core\Application; ?>

<?php if (Application::$app->session->getFlash('success')): ?>
	<div class="alert alert-success">
	    <?=Application::$app->session->getFlash('success');?>
	</div>
<?php endif; ?>

<h1>Home</h1>
<h1>Welcome: {{ $name; }}</h1>

<p>Welcome to the home page, list of colors:</p>
<ul>
    {% foreach($colors as $color): %}
    <li>{{ $color }}</li>
    {% endforeach; %}
</ul>


<?php
	var_dump($var);
	var_dump(Application::$app->session->get('user'));
?>

{% 
	var_dump($var);
%}
