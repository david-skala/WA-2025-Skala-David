<?php
require_once '../../models/Database.php';
require_once '../../models/User.php';

$db = (new Database())->getConnection();
$userModel = new User($db);
$users = $userModel->getAll();

$editMode = false;
$bookToEdit = null;

if (isset($_GET['edit'])) {
    $editId = (int)$_GET['edit'];
    $bookToEdit = $userModel->getById($editId);
    if ($bookToEdit) {
        $editMode = true;
    }
}
?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Přidat knihu</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <link rel="stylesheet" href="/public/css/styles.css">
</head>
<body class="bg-light">

    <div class="container mt-5">

    <h2>Výpis vytvořených uživatelů</h2>
    <?php if (!empty($users)): ?>
        <table class="table table-bordered table-hover">
            <thead class="table-secondary text-center">
                <tr>
                    <th>ID</th>
                    <th>Uživatelské jméno</th>
                    <th>Email</th>
                    <th>Jméno</th>
                    <th>Příjmení</th>
                    <th>Heslo</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($users as $user): ?>
                <tr class="text-center">
                    <td><?= htmlspecialchars($user['id']) ?></td>
                    <td><?= htmlspecialchars($user['username']) ?></td>
                    <td><?= htmlspecialchars($user['email']) ?></td>
                    <td><?= htmlspecialchars($user['name']) ?></td>
                    <td><?= htmlspecialchars($user['surname']) ?></td>
                    <td><?= htmlspecialchars($user['password_hash']) ?></td>
                    <td>
                        <a href="?edit=<?= $user['id'] ?>" class="btn btn-sm btn-outline-secondary">Upravit</a>
                        <a href="../../controllers/book_delete.php?id=<?= $user['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Opravdu chcete smazat tohoto uživatele?');">Smazat</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    
        <?php else: ?>
        <div class="alert alert-info">Žádný uživatel nebyl nalezen.</div>
    <?php endif; ?>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <?php if ($editMode): ?>
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">
                    <h2>Upravit knihu: <?= htmlspecialchars($bookToEdit['title']) ?></h2>
                    </div>
                    <div class="card-body">
                        <form action="../../controllers/book_update.php" method="post">
                            <input type="hidden" name="id" value="<?= $bookToEdit['id'] ?>">
                            <div class="mb-3">
                                <label class="form-label">ID knihy:</label>
                                <input type="text" class="form-control" value="<?= $bookToEdit['id'] ?>" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">Název knihy:</label>
                                <input type="text" id="title" name="title" class="form-control" required value="<?= htmlspecialchars($bookToEdit['title']) ?>">
                            </div>

                            <div class="mb-3">
                                <label for="author" class="form-label">Autor:</label>
                                <input type="text" id="author" name="author" class="form-control" required value="<?= htmlspecialchars($bookToEdit['author']) ?>">
                            </div>

                            <div class="mb-3">
                                <label for="category" class="form-label">Kategorie:</label>
                                <input type="text" id="category" name="category" class="form-control" value="<?= htmlspecialchars($bookToEdit['category']) ?>">
                            </div>

                            <div class="mb-3">
                                <label for="subcategory" class="form-label">Podkategorie:</label>
                                <input type="text" id="subcategory" name="subcategory" class="form-control" value="<?= htmlspecialchars($bookToEdit['subcategory']) ?>">
                            </div>

                            <div class="mb-3">
                                <label for="year" class="form-label">Rok vydání:</label>
                                <input type="number" id="year" name="year" class="form-control" required value="<?= htmlspecialchars($bookToEdit['year']) ?>">
                            </div>

                            <div class="mb-3">
                                <label for="price" class="form-label">Cena:</label>
                                <input type="number" id="price" name="price" class="form-control" step="0.01" required value="<?= htmlspecialchars($bookToEdit['price']) ?>">
                            </div>

                            <div class="mb-3">
                                <label for="isbn" class="form-label">ISBN:</label>
                                <input type="text" id="isbn" name="isbn" class="form-control" required value="<?= htmlspecialchars($bookToEdit['isbn']) ?>">
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Popis:</label>
                                <textarea id="description" name="description" class="form-control" rows="3"><?= htmlspecialchars($bookToEdit['description']) ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="link" class="form-label">Odkaz:</label>
                                <input type="url" id="link" name="link" class="form-control" value="<?= htmlspecialchars($bookToEdit['link']) ?>">
                            </div>

                            <button type="submit" class="btn btn-success w-100">Uložit změny</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>



</body>
</html>