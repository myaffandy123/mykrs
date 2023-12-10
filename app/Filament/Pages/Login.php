<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Forms\Form;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\Layout\Panel;
use Filament\Pages\Auth\Login as BaseLogin;

class Login extends BaseLogin
{

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                $this->getEmailFormComponent(),
                $this->getPasswordFormComponent(),
                $this->getRememberFormComponent(),
            ])
            ->statePath('data');
    }

    public function getHeading(): string
    {
        return __('Login');
    }

    public function getTitle(): string
    {
        return __('MyKRS - Login');
    }
}
