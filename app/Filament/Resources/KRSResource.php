<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KRSResource\Pages;
use App\Filament\Resources\KRSResource\RelationManagers;
use App\Models\KRS;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KRSResource extends Resource
{
    protected static ?string $model = KRS::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'KRS';
    protected static ?string $slug = 'krs';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make()
                ->label('KRS Baru'),
            ])
            ->emptyStateHeading('Belum ada KRS')
            ->emptyStateDescription('Silakan membuat KRS baru');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKRS::route('/'),
            'create' => Pages\CreateKRS::route('/create'),
            'edit' => Pages\EditKRS::route('/{record}/edit'),
        ];
    }

    public function getHeading(): string
    {
        return __('KRS');
    }

    public function getTitle(): string
    {
        return __('MyKRS - KRS');
    }
}
