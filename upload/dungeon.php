<?php
require("globals.php");
$CurrentTime=time();
$PlayerCount=$db->fetch_single($db->query("SELECT COUNT(`dungeon_user`) FROM `dungeon` WHERE `dungeon_out` = {$CurrentTime}"));
echo "<h3>{$lang['DUNGINFIRM_TITLE']}</h3><hr />
<small>{$lang['DUNGINFIRM_INFO']} " . number_format($PlayerCount) . " {$lang['DUNGINFIRM_INFO1']}</small>
<hr />
<table class='table table-hover table-bordered'>
	<thead>
		<tr>
			<th>
				{$lang['DUNGINFIRM_TD1']}
			</th>
			<th>
				{$lang['DUNGINFIRM_TD2']}
			</th>
			<th>
				{$lang['DUNGINFIRM_TD3']}
			</th>
			<th>
				{$lang['DUNGINFIRM_TD4']}
			</th>
		</tr>
	</thead>
	<tbody>";
$query = $db->query("SELECT * FROM `dungeon` WHERE `dungeon_out` > {$CurrentTime} ORDER BY `dungeon_out` DESC");
while ($Infirmary=$db->fetch_row($query))
{
	$UserName=$db->fetch_single($db->query("SELECT `username` FROM `users` WHERE `userid` = {$Infirmary['dungeon_user']}"));
	echo "
		<tr>
			<td>
				<a href='profile.php?user={$Infirmary['dungeon_user']}'>{$UserName}</a> [{$Infirmary['dungeon_user']}]
			</td>
			<td>
				{$Infirmary['dungeon_reason']}
			</td>
			<td>
				" . DateTime_Parse($Infirmary['dungeon_in']) . "
			</td>
			<td>
				" . DateTime_Parse($Infirmary['dungeon_out']) . "
			</td>
		</tr>";
}
echo "</tbody></table>";
$h->endpage();