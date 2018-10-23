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
				echo "<tr><td>$contact['firstname']</td><td>$contact['lastname']</td><td>$contact['address']</td><td>$contact['phoneNumber']</td></tr>";
			}
			?>
		</table>
	</body>
</htmL>