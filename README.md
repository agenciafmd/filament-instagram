# Filament Instagram

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg)](LICENSE)

Este pacote permite exibir os posts do Instagram no seu site através da integração com o Instagram no painel Filament.

A integração com o Instagram é feita através do
pacote [justbetter/laravel-instagram-feed](https://github.com/justbetter/laravel-instagram-feed).

---

## Instalação

Você pode instalar o pacote via composer:

```bash
sail composer require agenciafmd/filament-instagram:dev-master
```

---

## Gerando as chaves

Com uma conta facebook, vá em:

https://developers.facebook.com/apps/creation/

![01.png](docs/01.png)

![02.png](docs/02.png)

![03.png](docs/03.png)

Depois do App Criado, na lateral, vá em 

Casos de uso > Gerenciar mensagens e conteúdo no Instagram > Personalizar 

![04.png](docs/04.png)

Aqui conseguimos o **Client ID** e **Client Secret**

![05.png](docs/05.png)

//-- TODO Continuar

## Configuração

Adicione as variáveis de ambiente ao seu arquivo `.env`:

```env
INSTAGRAM_CLIENT_ID=
INSTAGRAM_CLIENT_SECRET=
```

Publique as configurações do pacote:

```bash
sail artisan vendor:publish --provider="JustBetter\InstagramFeed\InstagramFeedServiceProvider"
```

No arquivo `config/instagram-feed.php`, configure os valores de `client_id` e `client_secret` para buscarem do arquivo
`.env`:

```php
    'client_id' => env('INSTAGRAM_CLIENT_ID'),
```

e

```php
    'client_secret' => env('INSTAGRAM_CLIENT_SECRET'),
```

Em seguida, execute as migrações:

```bash
sail artisan migrate
```

Crie o perfil do Instagram:

```bash
sail artisan instagram-feed:profile YourProfile
```

---

## Registro no Filament

Para habilitar o recurso no painel administrativo, adicione o plugin ao seu painel:

```php
use Agenciafmd\Instagram\InstagramPlugin;

return [
    'plugins' => [
        InstagramPlugin::class,
    ],
];
```