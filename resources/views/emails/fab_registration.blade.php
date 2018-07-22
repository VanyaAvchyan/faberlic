<h1>Registration data</h1>
<table border='1' style='text-align:center'>
    <tr>
        <th>First name</th>
        <th>Second name</th>
        <th>Middle name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Birth date</th>
        <th>Gender</th>
    </tr>
    <tr>
        <td><?php echo $fab_data['fab_first_name']; ?></td>
        <td><?php echo $fab_data['fab_last_name']; ?></td>
        <td><?php echo $fab_data['fab_middle_name']; ?></td>
        <td><?php echo $fab_data['fab_email']; ?></td>
        <td><?php echo $fab_data['fab_phone']; ?></td>
        <td><?php echo $fab_data['fab_address']; ?></td>
        <td><?php echo $fab_data['fab_birth_date']; ?></td>
        <td><?php echo $fab_data['fab_gender']; ?></td>
    </tr>
</table>