<h2>Users</h2>
<table>
    <tr>
        <th>User ID</th>
        <th>First Name</th>
        <th>Surname</th>
        <th>Date</th>
    </tr>

    <?php foreach($users as $user): ?>
    <tr>
        <td><?php echo $user['user_id']; ?></td>
        <td><?php echo $user['first_name']; ?></td>
        <td><?php echo $user['surname']; ?></td>
        <td><?php echo $user['date']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>