<!DOCTYPE html>
<html lang="pt-br" data-theme="dracula">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5/themes.css" rel="stylesheet" type="text/css" />

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>LockBox</title>
</head>

<body>
    <div class="mx-auto max-w-screen-lg h-screen flex flex-col space-y-4">
        <?php require base_path('views/partials/_navbar.view.php'); ?>
        <?php require base_path('views/partials/_search.view.php'); ?>

        <?php if ($mensagem = flash()->get('mensagem')): ?>
            <div role="alert" class="alert alert-info">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="h-6 w-6 shrink-0 stroke-current">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span><?= $mensagem ?></span>
            </div>
        <?php endif; ?>

        <div class="flex flex-grow py-6">
            <?php require base_path("views/{$view}.view.php"); ?>
        </div>
    </div>
</body>

</html>