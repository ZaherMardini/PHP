
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Display Data</title>
    <link rel="stylesheet" href="style.css?va=1" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    />
  </head>
  <body>

  <th>Email</th>
  <th>Mobile</th>
  <th>Place</th>
  <th>Action</th>
</tr>
</thead>
<tbody><tr>
  <td>$i</td>
  <td>$username</td>
  <td>$email</td>
  <td>$phone</td>
  <td>$place</td>
  <td>
    <a href='update.php?update_id=$id'
      ><i class='fa-solid fa-pen-to-square'></i
    ></a>
    <a href='delete.php?delete_id=$id'><i class='fa-solid fa-trash'></i></a>
  </td>
</tr>
        </tbody>
      </table>
    </div>
   
  </body>
</html>
