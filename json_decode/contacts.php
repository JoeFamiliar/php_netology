<htmL>
	<head>
	</head>
	<body>
		<table>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>

			<?php
			$content = file_get_contents("./contacts.json");
			$contacts = json_decode($content, true);
			foreach ($contacts as $contact) {
				echo "<tr><td>$contact['firstName']</td><td>$contact['lastName']</td><td>$contact['address']</td><td>$contact['phoneNumber']</td></tr>";
			}
			?>
		</table>
	</body>
</htmL>
