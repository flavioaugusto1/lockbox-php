<div class="bg-base-300 rounded-l-box w-56 flex flex-col divide-y divide-base-100">
    <?php foreach ($notas as $key => $nota): ?>
        <a href="/notas?id=<?= $nota->id ?>" class="w-full p-2 hover:bg-base-200 
            <?php if ($key == 0): ?> rounded-tl-box <? endif ?>
            <?php if ($nota->id == $notaSelecionada->id): ?> bg-base-200 <? endif; ?>">
            <?= $nota->titulo ?>
        </a>
    <?php endforeach; ?>
</div>

<div class="bg-base-200 rounded-r-box w-full p-10 flex flex-col space-y-6">
    <fieldset class="fieldset">
        <legend class="fieldset-legend">Título</legend>
        <input type="text" class="input w-full" placeholder="Type here" name="titulo" value="<?= $notaSelecionada->titulo ?>" />
    </fieldset>

    <fieldset class="fieldset">
        <legend class="fieldset-legend">Sua nota</legend>
        <textarea class="textarea h-24 w-full" placeholder="Bio" name="nota"> <?= $notaSelecionada->nota ?> </textarea>
    </fieldset>

    <div class="flex justify-between items-center">
        <button class="btn btn-error">Deletar</button>
        <button class="btn btn-primary">Atualizar</button>
    </div>
</div>