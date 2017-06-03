<!DOCTYPE html>
<html>
<head>
	<title>Listagem de quartos</title>
	<meta charset="utf-8">
</head>
<body>
	<h1>Listagem de quartos</h1>

	<table>
		<?php foreach($rooms as $r): ?>
			<tr>
				<td><?= $r->name ?></td>
				<td><?= $r->simple_description ?></td>
				<td><a href="/rooms/mostra">Visualizar</a></td>
			</tr>
		<?php endforeach ?>
	</table>
</body>
</html>