<htmL>
	<head>
	</head>
	<body>
		<table>
			<tr>
				<td>Имя</td>
				<td>Фамилия</td>
				<td>Город</td>
				<td>Адрес</td>
				<td>Почтовый индекс</td>
				<td>Телефон</td>
			</tr>

			<?php
			$json = file_get_contents('contacts.json');
			$contacts = json_decode($json, true);
			//print_r($contacts);
			foreach ($contacts as $contact) {
				if(is_array($contact['phoneNumber'])){
					$phone = implode(", ", $contact['phoneNumber']);
				}
				else
					$phone = $contact['phoneNumber'];
				echo "<tr><td>".$contact['firstName']."</td><td>".$contact['lastName']."</td><td>".$contact['address']['city']."</td><td>".$contact['address']['streetAddress']."</td><td>".$contact['address']['postalCode']."</td><td>".$phone."</td></tr>";
			}
			?>
		</table>
	</body>
</htmL>