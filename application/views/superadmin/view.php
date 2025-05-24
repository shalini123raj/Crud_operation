<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
      </div>

            
                                <div>
                                    <?php if (!empty($students)) : ?>
                                    <p><strong>ID:</strong> <?php  echo $students['id']; ?></p>
                                    <p><strong>Name:</strong> <?php  echo $students['name']; ?></p>
                                    <p><strong>roll:</strong> <?php echo $students['roll']; ?></p>
                                  <?php else : ?>
                                 <p>No student found with this ID.</p>
                                 <?php endif; ?>
                                </div>
</body>
</html>