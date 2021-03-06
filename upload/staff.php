<?php
require("globals.php");
$staff = array();
$q = $db->query("SELECT `userid`, `laston`, `username`, `user_level`
 				 FROM `users`
 				 WHERE `user_level` IN('Admin', 'Forum Moderator', 'Assistant')
 				 ORDER BY `userid` ASC");
while ($r = $db->fetch_row($q))
{
    $staff[$r['userid']] = $r;
}
$db->free_result($q);
echo "<h3>{$lang['STAFFLIST_ADMIN']}</h3>
<table class='table table-bordered table-hober'>
	<thead>
		<th>
			{$lang['USERLIST_ORDER2']} [{$lang['USERLIST_ORDER1']}]
		</th>
		<th>
			{$lang['STAFFLIST_LS']}
		</th>
		<th>
			{$lang['STAFFLIST_CONTACT']}
		</th>
	</thead>
<tbody>";
foreach ($staff as $r)
{
    if ($r['user_level'] == 'Admin')
    {
		echo "<tr>
				<td>
					<a href='profile.php?user={$r['userid']}'>{$r['username']}</a> [{$r['userid']}]
				</td>
				<td>
					" . DateTime_Parse($r['laston']) . "
				</td>
				<td>
					<a href='inbox.php?action=compose&user={$r['userid']}'>{$lang['MAIL_SENDMSG']} {$lang['MAIL_SENDTO']} {$r['username']}</a>
				</td>";
    }
}
echo '</table>';
echo "<h3>{$lang['STAFFLIST_ASSIST']}</h3>
<table class='table table-bordered table-hober'>
	<thead>
		<th>
			{$lang['USERLIST_ORDER2']} [{$lang['USERLIST_ORDER1']}]
		</th>
		<th>
			{$lang['STAFFLIST_LS']}
		</th>
		<th>
			{$lang['STAFFLIST_CONTACT']}
		</th>
	</thead>
<tbody>";
foreach ($staff as $r)
{
    if ($r['user_level'] == 'Assistant')
    {
        echo "<tr>
				<td>
					<a href='profile.php?user={$r['userid']}'>{$r['username']}</a> [{$r['userid']}]
				</td>
				<td>
					" . DateTime_Parse($r['laston']) . "
				</td>
				<td>
					<a href='inbox.php?action=compose&user={$r['userid']}'>{$lang['MAIL_SENDMSG']} {$lang['MAIL_SENDTO']} {$r['username']}</a>
				</td>";
    }
}
echo '</table>';
echo "<h3>{$lang['STAFFLIST_MOD']}</h3>
<table class='table table-bordered table-hober'>
	<thead>
		<th>
			{$lang['USERLIST_ORDER2']} [{$lang['USERLIST_ORDER1']}]
		</th>
		<th>
			{$lang['STAFFLIST_LS']}
		</th>
		<th>
			{$lang['STAFFLIST_CONTACT']}
		</th>
	</thead>
<tbody>";
foreach ($staff as $r)
{
    if ($r['user_level'] == 'Forum Moderator')
    {
        echo "<tr>
				<td>
					<a href='profile.php?user={$r['userid']}'>{$r['username']}</a> [{$r['userid']}]
				</td>
				<td>
					" . DateTime_Parse($r['laston']) . "
				</td>
				<td>
					<a href='inbox.php?action=compose&user={$r['userid']}'>{$lang['MAIL_SENDMSG']} {$lang['MAIL_SENDTO']} {$r['username']}</a>
				</td>";
    }
}
echo '</table>';
$h->endpage();