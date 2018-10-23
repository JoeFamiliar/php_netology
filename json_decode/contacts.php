<htmL>
	<head>
	</head>
	<body>
		<table>
			<tr>
				<td>Имя</td>
				<td>Фамилия</td>
				<td>Адрес</td>
				<td>Телефон</td>
			</tr>

			<?php
			$json = file_get_contents('contacts.json');
			$contacts = json_decode($json, true);
			//print_r($contacts);
			foreach ($contacts as $contact) {
				echo "<tr><td>".$contact['firstName']."</td><td>".$contact['lastName']."</td><td>".$contact['address']."</td><td>".$contact['phoneNumber']."</td></tr>";
			}
			?>
		</table>
	</body>
</htmL>