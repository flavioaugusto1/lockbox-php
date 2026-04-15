<?php

$validacoes = flash()->get('validacoes'); ?>

<div class="grid grid-cols-2">
    <div class="hero min-h-screen flex ml-40">
        <div class="hero-content -mt-20">
            <div>
                <p class="py-2 text-xl">
                    Bem vindo ao
                </p>
                <h1 class="text-6xl font-bold">Lockbox</h1>
                <p class="py-4 text-xl pt-2 pb-4">
                    Onde você guarda <span class="italic">tudo</span> com segurança.
                </p>
            </div>
        </div>
    </div>

    <div class="bg-white hero mr-40 min-h-screen text-black">
        <div class="hero-content -mt-20">
            <form action="/registrar" method="POST">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Crie sua conta</div>

                        <fieldset class="fieldset">
                            <legend class="fieldset-legend text-black">Nome</legend>
                            <input type="text" name="nome" class="input bg-white" placeholder="Escreva seu nome" value="<?= old('nome'); ?>"/>
                        </fieldset>
                        <?php if(isset($validacoes['nome'])): ?>
                                <div class="label text-xs text-error"><?= $validacoes['nome'][0] ?></div>
                        <? endif; ?>

                        <fieldset class="fieldset">
                            <legend class="fieldset-legend text-black">E-mail</legend>
                            <input type="email" name="email" class="input bg-white" placeholder="Escreva seu e-mail" value="<?= old('email'); ?>" />
                        </fieldset>
                        <?php if(isset($validacoes['email'])): ?>
                                <div class="label text-xs text-error"><?= $validacoes['email'][0] ?></div>
                        <? endif; ?>

                        <fieldset class="fieldset">
                            <legend class="fieldset-legend text-black">Confirme seu e-mail</legend>
                            <input type="email" name='email_confirmacao' class="input bg-white" placeholder="Confirme seu e-mail" />
                        </fieldset>

                        <fieldset class="fieldset">
                            <legend class="fieldset-legend text-black">Password</legend>
                            <input type="password" name="senha" class="input bg-white" placeholder="Escreva sua senha" value="<?= old('senha'); ?>"/>
                        </fieldset>
                        <?php if(isset($validacoes['senha'])): ?>
                                <div class="label text-xs text-error"><?= $validacoes['senha'][0] ?></div>
                        <? endif; ?>

                        <div class="card-actions justify-end">
                            <button class="btn btn-primary btn-block">Registrar</button>
                            <a href="/login" class="btn btn-link">Já tenho uma conta</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>