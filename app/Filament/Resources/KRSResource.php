<?php

namespace App\Filament\Resources;

use App\Models\KRS;
use App\Models\MatkulKRS;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\KRSResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\KRSResource\RelationManagers;

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
                Card::make()
                    ->schema([
                        TextInput::make('nama')
                            ->required()
                            ->label('Nama KRS')
                            ->placeholder('Nama')
                            ->columnSpanFull(),
                        TextInput::make('deskripsi')
                            ->label('Deskripsi')
                            ->placeholder('Deskripsi'),
                        ])
                    ->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')
                    ->sortable(),
                TextColumn::make('deskripsi'),
                TextColumn::make('matkul_krs_count')
                    ->counts('matkul_krs')
                    ->label('Jumlah'),
            ])
            ->modifyQueryUsing(fn(Builder $query) => $query->where('user_id', auth()->user()->id))
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->label('Lihat')
                    ->modalHeading('Lihat KRS'),
                    // ->modal(),
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make()
                        ->label('Edit'),
                    Tables\Actions\DeleteAction::make()
                        ->label('Hapus'),
                ])
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

    public static function getNavigationBadge(): ?string {
        return static::getModel()::where('user_id', auth()->user()->id)->count();
    }
}
