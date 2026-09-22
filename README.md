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

Com uma conta Facebook, vá em:

https://developers.facebook.com/apps/creation/

![01.png](docs/01.png)

![02.png](docs/02.png)

![03.png](docs/03.png)

Depois do App Criado, na lateral, vá em 

Casos de uso > Gerenciar mensagens e conteúdo no Instagram > Personalizar 

![04.png](docs/04.png)

Aqui conseguimos o **Client ID** e **Client Secret**

![05.png](docs/05.png)

Desça até **Configurar o login da empresa no Instagram**

Clique em Configurar e adicione o callback de login.

Ela será https://{url-de-produção}/instagram/auth/callback

![06.png](docs/06.png)

Uma vez adicionado o callback, volte no **Configurações do login da empresa** e adicione as urls dos outros ambientes.

![07.png](docs/07.png)

Vá agora em **Permissões e recursos** e ative as permissões:

- instagram_business_basic
- public_profile

![08.png](docs/08.png)

Em Configuração do app > Básico, preencha os campos obrigatórios.

> Atenção para Domínios do aplicativo, preencha com o ambiente local, homologação e produção.

![09.png](docs/09.png)

Ainda em básico, vá em **Adicionar plataforma** > Website

Adicione a url de produção.

![10.png](docs/10.png)

Na lateral esquerda, vá em Funções do app > Funções

Vamos em **Adicionar pessoas**

Escolhemos **Testador do Instagram** e enviamos o convite para a conta que iremos consumir.

![11.png](docs/11.png)

Agora no Instagram, vamos na conta que acabamos de enviar o convite.

Clicamos em Mais > Configurações (https://www.instagram.com/accounts/edit/)

![12.png](docs/12.png)

Vamos em **Seu app e suas mídias** > Permissões do site > Apps e sites

Aceite em **Convites do testador**.

![13.png](docs/13.png)

## Configuração

Adicione as variáveis de ambiente ao seu arquivo `.env`:

```env
INSTAGRAM_CLIENT_ID=
INSTAGRAM_CLIENT_SECRET=
```

Execute as migrações:

```bash
sail artisan migrate
```

Crie o perfil do Instagram:

> YourProfile é o @ do Instagram que enviamos o convite.

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