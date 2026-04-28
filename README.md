# Filament Instagram

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg)](LICENSE)

Este pacote permite exibir os posts do Instagram no seu site através da integração com o Instagram no painel Filament.

---

## Instalação

Você pode instalar o pacote via composer:

```bash
sail composer require agenciafmd/filament-instagram
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