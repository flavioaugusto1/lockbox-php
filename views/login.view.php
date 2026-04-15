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
            <form action="/login" method="POST">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Faça seu login</div>
                        <?php if($mensagem = flash()->get('mensagem')): ?>
                            <div role="alert" class="alert alert-info">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="h-6 w-6 shrink-0 stroke-current">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span><?= $mensagem ?></span>
                            </div>
                        <?php endif; ?>
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend text-black">E-mail</legend>
                            <input 
                                type="email"
                                name="email"
                                class="input bg-white"
                                placeholder="Escreva seu e-mail"
                                value="<?= old('email'); ?>"
                            />
                            <?php if(isset($validacoes['email'])): ?>
                                <div class="label text-xs text-error"><?= $validacoes['email'][0] ?></div>
                            <? endif; ?>
                        </fieldset>

                        <fieldset class="fieldset">
                            <legend class="fieldset-legend text-black">Password</legend>
                            <input type="password" name="senha" class="input bg-white" placeholder="Escreva sua senha" />
                            <?php if(isset($validacoes['senha'])): ?>
                                <div class="label text-xs text-error"><?= $validacoes['senha'][0] ?></div>
                            <? endif; ?>
                        </fieldset>

                        <div class="card-actions justify-end">
                            <button class="btn btn-primary btn-block">Logar</button>
                            <a href="/registrar" class="btn btn-link">Quero me registrar</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>